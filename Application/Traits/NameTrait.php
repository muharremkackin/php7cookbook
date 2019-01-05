<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

namespace Application\Traits;


trait NameTrait
{

    protected $name;
    public $key;
    public function setName($name) {
        $this->name = $name;
    }
    public function setKey() {
        $this->key = unpack('H*', random_bytes(18))[1];
    }

}