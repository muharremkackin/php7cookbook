<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

namespace Application\Entity;

/**
 * Class Profile
 * @package Application\Entity
 */
class Profile
{

    protected $profile = '';

    /**
     * @return string
     */
    public function getProfile(): string
    {
        return $this->profile;
    }

    /**
     * @param string $profile
     * @return $this
     */
    public function setProfile(string $profile): object
    {
        $this->profile = $profile;
        return $this;
    }


}