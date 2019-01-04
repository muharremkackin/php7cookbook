<?php

namespace Application\OOP;


class Orphan
{
    protected $id;

    public function getId() :int {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
        return $this;
    }

}