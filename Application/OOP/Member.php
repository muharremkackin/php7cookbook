<?php

namespace Application\OOP;


class Member extends Customer
{

    protected $membership;

    /**
     * @return string
     */
    public function getMembership() :string {
        return $this->membership;
    }

    /**
     * @param string $membership
     */
    public function setMembership(string $membership) {
        $this->membership = $membership;
    }

}