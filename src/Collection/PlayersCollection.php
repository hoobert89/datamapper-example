<?php

namespace App\Collection;

use App\Entity\Player;

class PlayersCollection extends Collection
{
    /**
     * @return string
     */
    function getTargetClass() :string
    {
        return Player::class;
    }
}
