<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

namespace Application\Traits;


class IdName
{

    use IdTrait, NameTrait {
        NameTrait::setKey insteadof IdTrait;
        IdTrait::setKey as setKeyDate;
    }

}