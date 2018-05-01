<?php

namespace admin\tests;

use admin\app\ConfigEnum;
use admin\app\DatabaseConfiguration;
use admin\app\DatabaseConnection;
use PHPUnit_Framework_TestCase;

class DatabaseConnectionTest extends PHPUnit_Framework_TestCase
{

    public function testConnection()
    {
        $config = new DatabaseConfiguration(
            ConfigEnum::DB_HOST,
            ConfigEnum::DB_PORT,
            ConfigEnum::DB_NAME,
            ConfigEnum::DB_USER,
            ConfigEnum::DB_PASSWORD
        );
        $connection = new DatabaseConnection($config);
        $this->assertNotNull($connection->getInstance());
    }
}
