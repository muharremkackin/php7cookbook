<?php

namespace Application\OOP;


abstract class Base
{
    protected $id;


    /**
     * @return int
     */
    public function getId() :int {
        return $this->id;
    }

    /**
     * Set value to $id
     * @param int $id
     * @return $this;
     */
    public function setId(int $id) {
        $this->id = $id;
        return $this;
    }

    abstract public function validate();

}