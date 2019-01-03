<?php

namespace Application\Web;

use Exception;
use SplFileObject;
use Application\Web\Security;

class Access
{
    const ERROR_UNABLE = 'ERROR: unable to open file';
    protected $log;
    public $frequency = array();

    public function __construct($filename)
    {
        if (!file_exists($filename)) {
            $security = new Security();
            $message = __METHOD__ . ' : ' . self::ERROR_UNABLE . PHP_EOL;
            $message .= $security->filterStripTags($filename) . PHP_EOL;
            throw new Exception($message);
        }
        $this->log = new SplFileObject($filename, 'r');
    }

    public function fileIteratorByLine() {
        $count = 0;
        while (!$this->log->eof()) {
            yield $this->log->fgets();
            $count++;
        }
        return $count;
    }

    public function getIp($line) {
        preg_match('/(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})/', $line, $match);
        return $match[1] ?? '';
    }

}