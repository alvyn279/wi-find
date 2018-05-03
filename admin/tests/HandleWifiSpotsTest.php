<?php

require 'admin/app/ConfigEnum.php';
require 'admin/app/DatabaseConfiguration.php';
require 'admin/app/DatabaseConnection.php';
require 'admin/app/dao/WifiSpotsDao.php';
require 'admin/app/HandleWifiSpots.php';

class HandleWifiSpotsTest extends PHPUnit_Framework_TestCase
{

    public function testGetAll()
    {
        $config = new DatabaseConfiguration(
            ConfigEnum::DB_HOST,
            ConfigEnum::DB_PORT,
            ConfigEnum::DB_NAME,
            ConfigEnum::DB_USER,
            ConfigEnum::DB_PASSWORD
        );
        $connection = new DatabaseConnection($config);
        $h = new HandleWifiSpots($connection);
        $this->assertNotEmpty($h->getAllItems());
        $this->assertNotNull($h->getAllItems());
    }
}
