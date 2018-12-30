<?php

namespace App\DataMapper;

use App\Collection\PlayersCollection;
use App\Entity\Team;

class TeamMapper extends Mapper
{
    protected $selectStmt = 'SELECT * from teams where id = ?';
    protected $playersStmt = 'SELECT * from players where team_id = ?';

    /**
     * @param int $id
     * @return mixed
     */
    public function selectById(int $id)
    {
        $stmt = $this->connection->prepare($this->selectStmt);
        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @param array $raw
     * @return Team
     */
    public function createObject(array $raw)
    {
        $team = new Team();
        $team
            ->setId($raw['id'])
            ->setName($raw['name'])
        ;

        $playerMapper = new PlayerMapper();
        $collection = new PlayersCollection($playerMapper->selectByTeamId($raw['id']), $playerMapper);

        $team->setPlayers($collection);

        return $team;
    }
}
