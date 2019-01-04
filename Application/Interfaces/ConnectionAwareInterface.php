<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */


namespace Application\Interfaces;


use Application\Database\Connection;

interface ConnectionAwareInterface
{

    public function setConnection(Connection $connection);

}