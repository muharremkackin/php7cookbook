<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

namespace Application\Entity;

/**
 * Class Name
 * @package Application\Entity
 */
class Name {

    protected $name = '';

    /**
     * @return string $name
     */
    public function getName() :string {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name) {
        $this->name = $name;
        return $this;
    }

}