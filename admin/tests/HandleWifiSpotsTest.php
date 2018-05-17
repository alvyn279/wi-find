<?php

require 'admin/app/ConfigEnum.php';
require 'admin/app/DatabaseConfiguration.php';
require 'admin/app/DatabaseConnection.php';
require 'admin/app/models/WifiSpots.php';
require 'admin/app/dao/WifiSpotsDao.php';
require 'admin/app/handlers/HandleWifiSpots.php';

/**
 * Class HandleWifiSpotsTest
 * run the tests in bash: ./vendor/bin/phpunit admin/tests/HandleWifiSpotsTest.php
 */
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

    public function testDeleteItems()
    {
        $ids = array(4, 5); // 4 and 5 must exist to simulate a successful deletion
        $h = new HandleWifiSpots($this->testGetConnection());
        if ($h->isItemExists($ids[0]) && $h->isItemExists($ids[1]))
        {
            // delete the items then assert that they no longer exist
            // isItemExists returns true if an item exists
            $h->deleteItems($ids);
            $this->assertFalse($h->isItemExists($ids[0]));
            $this->assertFalse($h->isItemExists($ids[1]));
        }
    }

    public function testUpdateWifiSpots()
    {
        $h = new HandleWifiSpots($this->testGetConnection());
        $w = new WifiSpots();
        // to simulate a successful test,
        // choose an arbitrary id that exist
        $id = 999;
        if ($h->isItemExists($id))
        {
            $oldHash = hash("md5", json_encode($h->getItemById($id)));

            $w->setId(4);
            $w->setWifiName("test");
            $w->setStrength(5);
            $w->setPaid("test");
            $w->setUserPerDay("2222");
            $w->setLatitude("43.33");
            $w->setLongitude("43.334");
            $w->setAddress("test");
            $w->setDateRegistered(date("Y-m-d"));
            $h->updateWifiSpot($w);

            $newHash = hash("md5", json_encode($h->getItemById($id)));
            $this->assertNotEquals($oldHash, $newHash);
        }
    }
}
