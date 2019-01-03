<?php
/**
 * Created by PhpStorm.
 * User: ALKU
 * Date: 25.12.2018
 * Time: 20:26
 */

namespace Application\Web;


class Hoover
{

    private $content;

    public function getContent($url) {

        if (!$this->content) {
            if (stripos($url, 'https') !== 0) {
                $url = 'https://' . $url;
            }
            $this->content = new \DOMDocument('1.0', 'utf-8');
            $this->content->preserveWhiteSpace = false;
            @$this->content->loadHTMLFile($url);
        }
        return $this->content;
    }

    public function getTags($url, $tag) {

        $count = 0;
        $result = array();
        $elements = $this->getContent($url)->getElementsByTagName($tag);

        foreach ($elements as $node) {
            $result[$count]['value'] = trim(
                preg_replace('/\s+/', ' ', $node->nodeValue)
            );
            if ($node->hasAttributes()) {
                foreach ($node->attributes as $name => $attribute) {
                    $result[$count]['attributes'][$name] = $attribute->value;
                }
            }
            $count++;
        }
        return $result;
    }

    public function getAttribute($url, $attribute, $domain = null) {
        $result = array();
        $elements = $this->getContent($url)->getElementsByTagName('*');
        foreach ($elements as $node) {
            if ($node->hasAttribute($attribute)) {
                $value = $node->getAttribute($attribute);
                if ($domain) {
                    if (stripos($value, $domain) !== false) {
                        $result[] = trim($value);
                    }
                } else {
                    $result[] = trim($value);
                }
            }
        }
        return $result;
    }

}