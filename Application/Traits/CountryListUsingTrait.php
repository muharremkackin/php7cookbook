<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

namespace Application\Traits;


use Application\Database\Connection;
use Application\Interfaces\ConnectionAwareInterface;

class CountryListUsingTrait implements ConnectionAwareInterface
{

    use ListTrait;

    protected $connection;

    protected $key = 'iso3';
    protected $value = 'name';
    protected $table = 'iso_country_codes';

    public function setConnection(Connection $connection)
    {
        $this->connection = $connection;
    }
}