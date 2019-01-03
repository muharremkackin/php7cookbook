<?php

namespace Application\Iterator;

use Exception;
use RecursiveIteratorIterator;
use RecursiveArrayIterator;
use RecursiveRegexIterator;
use RegexIterator;
use Throwable;
use Application\Web\Security;
use RecursiveDirectoryIterator;

class Directory
{

    const ERROR_UNABLE = 'ERROR: Unable to read directory';
    protected $path;
    protected $rdi;

    public function __construct($path)
    {
        try {
            $this->rdi = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($path),
                RecursiveIteratorIterator::SELF_FIRST
            );
        } catch (Throwable $exception) {
            $message = __METHOD__ . ' : ' . self::ERROR_UNABLE . PHP_EOL;
            $message .= (new Security())->filterStripTags($path) . PHP_EOL;
            echo $message . PHP_EOL;
            echo $exception->getMessage();
            exit;
        }
    }

    public function ls($pattern = null) {
        $outerIterator = ($pattern)
            ? $this->regex($this->rdi, $pattern)
            : $this->rdi;
        foreach ($outerIterator as $object) {
            if ($object->isDir()) {
                if ($object->getFileName() == '..') {
                    continue;
                }
                $line = $object->getPath() . PHP_EOL;
            } else {
                $line = sprintf('%4s %1d %4s %4s %10d %12s %-40s' . PHP_EOL,
                    substr(sprintf('%o', $object->getPerms()), -4),
                    ($object->getType() == 'file') ? 1 : 2,
                    $object->getOwner(),
                    $object->getGroup(),
                    $object->getSize(),
                    date('M d Y H:i', $object->getATime()),
                    $object->getFileName());
            }
            yield $line;
        }
    }

    protected function regex($iterator, $pattern) {
        $pattern = '!^.' . str_replace('.', '\\.', $pattern) . '$!';
        return new RegexIterator($iterator, $pattern);
    }

    public function dir($pattern = null) {
        $outerIterator = ($pattern)
            ? $this->regex($this->rdi, $pattern)
            : $this->rdi;
        foreach ($outerIterator as $name => $object) {
            yield $name . PHP_EOL;
        }
    }


}