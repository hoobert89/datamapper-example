<?php

namespace App\Entity;

class Player
{
    protected $id;
    protected $team;
    protected $player;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Player
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTeam() :?Team
    {
        return $this->team;
    }

    /**
     * @param Team|null $team
     * @return $this
     */
    public function setTeam(?Team $team)
    {
        $this->team = $team;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param mixed $player
     * @return Player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
        return $this;
    }
}
