<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */


namespace Application\Visibility;


class Base
{

    protected $id;
    private $key = 12345;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    public function setId(): void
    {
        $this->id = $this->generateRandId();
    }

    protected function generateRandId()
    {
        return unpack('H*', random_bytes(8))[1];
    }

}