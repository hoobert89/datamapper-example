<?php

namespace App\DataMapper;

use App\DbProvider\Mysql;

abstract class Mapper
{
    protected $connection;

    public function __construct()
    {
        $this->connection = Mysql::getConnection();
    }

    public function find(int $id)
    {
        return $this->selectById($id);
    }

    abstract function selectById(int $id);
    abstract function createObject(array $raw);
}
