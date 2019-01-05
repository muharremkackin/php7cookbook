<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

namespace Application\Traits;

use stdClass;

trait CustomerTrait
{

    protected $id;
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $obj = new stdClass();
        $obj->name = $name;
        $this->name = $obj;
    }

}

