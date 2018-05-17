<?php

require 'admin/app/ConfigEnum.php';
require 'admin/app/DatabaseConfiguration.php';
require 'admin/app/DatabaseConnection.php';

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
