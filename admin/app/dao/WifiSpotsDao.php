<?php

namespace admin\app\dao;

use admin\app\DatabaseConnection;
use PDO;

class WifiSpotsDao
{
    private $connection;
    private $data = array();
    private $tableName = "WiFiSpots";

    public function __construct(DatabaseConnection $connection)
    {
        $this->connection = $connection;
    }

    private function fetchAllData()
    {
        $sql = "SELECT * FROM " . $this->tableName;
        $stmt = $this->connection->getInstance()->prepare($sql);
        $stmt->execute();
        $this->data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData()
    {
        $this->fetchAllData();
        return $this->data;
    }
}
