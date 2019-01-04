<?php


namespace Application\OOP;


class Name
{
    protected $name = '';

    /**
     * This method returns $name value
     * @return string
     */
    public function getName() :string {
        return $this->name;
    }

    /**
     * This method set value to $name and returns updated class
     * @param string $name
     * @return $this
     */
    public function setName(string $name) {
        $this->name = $name;
        return $this;
    }

}

class Address {

    protected $address = '';

    /**
     * This method returns $address value
     * @return string
     */
    public function getAddress() :string {
        return $this->address;
    }

    /**
     * This method set value to $address and returns updated class
     * @param string $address
     * @return $this
     */
    public function setAddress(string $address) {
        $this->address = $address;
        return $this;
    }

}