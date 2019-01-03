<?php

namespace Application\Web;


class Deep
{

    protected $domain;

    public function scan($url, $tag) {
        $vac = new Hoover();
        $scan = $vac->getAttribute($url, 'href', $this->getDomain($url));
        $result = array();
        foreach ($scan as $subSite) {
            yield from $vac->getTags($subSite, $tag);
        }
        return count($scan);
    }

    public function getDomain($url) {
        if (!$this->domain) {
            $this->domain = parse_url($url, PHP_URL_HOST);
        }
        return $this->domain;
    }


}