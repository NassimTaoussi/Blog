<?php

namespace NTaoussi\Lib\Model;

use PDO;

class Database
{
    private static $instance = null;
    
    /**
     * @return PDO
     */
    public static function getPdo(): PDO
    {
        if(self::$instance === null) 
        {
            self::$instance = new PDO("mysql:host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_NAME"] . ';charset=utf8', $_ENV["DB_USER"], $_ENV["DB_PASS"], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
        return self::$instance;
    }
}

?>