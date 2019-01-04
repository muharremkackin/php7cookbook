<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */


namespace Application\Interfaces;

use PDO;
use Application\Database\Connection;


class CustomerList implements ConnectionAwareInterface
{
    protected $connection;

    public function setConnection(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function list() {
        $list = [];
        $stmt = $this->connection->pdo->query('SELECT id, name FROM customer');
        while ($customer = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $list[$customer['id']] = $customer['name'];
        }
        return $list;
    }

}