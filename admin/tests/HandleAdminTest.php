<?php

require 'admin/app/ConfigEnum.php';
require 'admin/app/DatabaseConfiguration.php';
require 'admin/app/DatabaseConnection.php';
require 'admin/app/models/Admin.php';
require 'admin/app/dao/AdminDao.php';
require 'admin/app/handlers/HandleAdmin.php';

/**
 * Class HandleAdminTest
 * run the tests in bash: ./vendor/bin/phpunit admin/tests/HandleAdminTest.php
 */
class HandleAdminTest extends PHPUnit_Framework_TestCase
{
    public function testGetConnection()
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
        return $connection;
    }

    public function testGetAllAdmins()
    {

    }

    public function testGetAdminByUsername()
    {

    }

    public function testIsAdminUserExists()
    {

    }
}
