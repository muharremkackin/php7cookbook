<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

namespace Application\Entity;


class Address
{

    protected $address = '';

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return $this
     */
    public function setAddress(string $address):object
    {
        $this->address = $address;
        return $this;
    }

}