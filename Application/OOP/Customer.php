<?php

namespace Application\OOP;


class Customer extends Base
{

    protected $name;

    /**
     * @return string
     */
    public function getName() :string {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    public function validate()
    {
        $valid = 0;
        $count = count(get_object_vars($this));
        if (!empty($this->id) && is_int($this->id)) $valid++;
        if (!empty($this->name) && preg_match('/[a-z0-9 ]/i', $this->name)) $valid++;
        return ($valid == $count);
    }

}