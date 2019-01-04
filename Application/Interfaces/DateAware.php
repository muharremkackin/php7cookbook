<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

namespace Application\Interfaces;

use DateTime;

interface DateAware
{

    public function setDate($date);
    public function setBoth(DateTime $dateTime);

}