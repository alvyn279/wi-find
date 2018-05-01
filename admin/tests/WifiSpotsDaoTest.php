<?php

namespace admin\tests;

use admin\app\ConfigEnum;
use admin\app\DatabaseConfiguration;
use admin\app\DatabaseConnection;
use admin\app\dao\WifiSpotsDao;

use PHPUnit_Framework_TestCase;

class WifiSpotsDaoTest extends PHPUnit_Framework_TestCase
{
    public function testGetData()
    {
        $config = new DatabaseConfiguration(
            ConfigEnum::DB_HOST,
            ConfigEnum::DB_PORT,
            ConfigEnum::DB_NAME,
            ConfigEnum::DB_USER,
            ConfigEnum::DB_PASSWORD
        );
        $connection = new DatabaseConnection($config);
        $dao = new WifiSpotsDao($connection);
        print_r($dao->getData());
        $this->assertNotEmpty($dao->getData());
        $this->assertNotNull($dao->getData());
    }
}
