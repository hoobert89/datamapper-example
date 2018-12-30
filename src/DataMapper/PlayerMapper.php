<?php

namespace App\DataMapper;

use App\Entity\Player;

class PlayerMapper extends Mapper
{
    protected $selectStmt = 'SELECT * from players where id = ?';
    protected $teamStmt = 'SELECT * from players where team_id = ?';

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
     * @param int $teamId
     * @return mixed
     */
    public function selectByTeamId(int $teamId)
    {
        $stmt = $this->connection->prepare($this->teamStmt);
        $stmt->execute([$teamId]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createObject(array $raw)
    {
        $player = new Player();
        $teamMapper = new TeamMapper();

        $player
            ->setPlayer($raw['player'])
            ->setTeam($teamMapper->createObject($teamMapper->selectById($raw['team_id'])))
        ;

        return $player;
    }
}
