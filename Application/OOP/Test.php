<?php
declare(strict_types=1);

namespace Application\OOP;


/**
 * Class Test
 * @package Application\Test
 * This is a demonstration class
 *
 * The purpose of this class is to get and set
 * a protected property $test
 */
class Test
{
    protected $test = 'TEST';

    /**
     * This method returns the current value of $test
     *
     * @return string $test
     */
    public function getTest():string {
        return $this->test;
    }

    /**
     * This method sets value of $test and returns class
     *
     * @param string $test
     * @return $this
     */
    public function setTest(string $test)
    {
        $this->test = $test;
        return $this;
    }



}