<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

namespace Application\Traits;


class Customer
{
    use CustomerTrait;
    protected $name;
    public function getName() {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

}