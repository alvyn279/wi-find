<?php

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

    protected function getData()
    {
        $this->fetchAllData();
        return $this->data;
    }
}
