<?php

namespace App\Collection;

use App\Entity\Team;

class TeamsCollection extends Collection
{
    /**
     * @return string
     */
    function getTargetClass() :string
    {
        return Team::class;
    }
}
