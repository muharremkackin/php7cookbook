<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

namespace Application\Interfaces;


use Application\Database\Connection;
use PDO;

class CountryList implements ConnectionAwareInterface
{

    protected $connection;

    public function setConnection(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function list() {
        $list = [];
        $stmt = $this->connection->pdo->query('SELECT iso3, name FROM iso_country_codes');
        while ($country = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $list[$country['iso3']] = $country['name'];
        }
        return $list;
    }
}