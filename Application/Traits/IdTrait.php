<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

namespace Application\Traits;


trait IdTrait
{

    protected $id;
    public $key;
    public function setId($id) {
        $this->id = $id;
    }

    public function setKey() {
        $this->key = date('YmdHis') . sprintf('%04d', rand(0,9999));
    }

}