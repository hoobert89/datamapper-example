<?php

namespace App\Entity;

use App\Collection\PlayersCollection;

class Team
{
    protected $id;
    protected $name;
    protected $players;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Team
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Team
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setPlayers(PlayersCollection $players)
    {
        $this->players = $players;
        return $this;
    }

    public function getPlayers() :PlayersCollection
    {
        return $this->players;
    }
}
