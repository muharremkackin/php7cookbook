<?php
/**
 * Created by PhpStorm.
 * User: ALKU
 * Date: 4.01.2019
 * Time: 00:41
 */

namespace Application\Cli;


class CommandLine
{

    protected $handle;
    protected $line;

    public function stdin() {
        $this->handle = fopen("php://stdin", "r");
        return $this->line = fgets($this->handle);
    }

}