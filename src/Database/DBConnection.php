<?php

namespace Database;


class DBConnection
{
    private static $configuration;

    private static $connection;

    public static function  getConnection ()
    {
        if (self::$connection)
        {
            return self::$connection;
        }

        self::$connection = new \PDO (
            sprintf(
                '%s:host=%s;dbname=%s;port=%s',
                self::$configuration['driver'],
                self::$configuration['host'],
                self::$configuration['dbname'],
                self::$configuration['port']
            ),

            self::$configuration['user'],
            self::$configuration ['password']
        );

        return self::$connection;

    }

    public static function setConfig (array $configuration)
    {
        self::$configuration = $configuration;
    }
}