<?php

namespace App\DbProvider;

use PDO;

class Mysql
{
    /**
     * @return PDO
     */
    public static function getConnection() :PDO
    {
        return new PDO(getenv('DATABASE_URL'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'));
    }
}
