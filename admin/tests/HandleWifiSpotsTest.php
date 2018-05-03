<?php

require 'admin/app/ConfigEnum.php';
require 'admin/app/DatabaseConfiguration.php';
require 'admin/app/DatabaseConnection.php';
require 'admin/app/dao/WifiSpotsDao.php';
require 'admin/app/HandleWifiSpots.php';

class HandleWifiSpotsTest extends PHPUnit_Framework_TestCase
{
    public function testGetConnection()
    {
        // this test MUST WORK for all the other tests to work
        $config = new DatabaseConfiguration(
            ConfigEnum::DB_HOST,
            ConfigEnum::DB_PORT,
            ConfigEnum::DB_NAME,
            ConfigEnum::DB_USER,
            ConfigEnum::DB_PASSWORD
        );
        $connection = new DatabaseConnection($config);
        $this->assertNotNull($connection->getInstance());
        return $connection;
    }

    public function testGetAllItems()
    {
        $h = new HandleWifiSpots($this->testGetConnection());
        $this->assertNotEmpty($h->getAllItems());
        $this->assertNotNull($h->getAllItems());
    }

    public function testGetItemById()
    {
        $id = 1; // this record must exist
        $h = new HandleWifiSpots($this->testGetConnection());
        $this->assertNotNull($h->getItemById($id));
    }

    public function testIsItemExists()
    {
        $id = 1;
        $h = new HandleWifiSpots($this->testGetConnection());
        $this->assertTrue($h->isItemExists($id));
    }
}
