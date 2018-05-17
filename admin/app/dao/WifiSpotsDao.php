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

    protected function delete($id)
    {
        $sql = "DELETE FROM " . $this->tableName . " WHERE `wifispots`.`idWiFiSpots` = ?";
        $stmt = $this->connection->getInstance()->prepare($sql);
        $stmt->execute([$id]);
        $exec = $stmt->rowCount();
        return $exec;
    }

    protected function update(WifiSpots $w)
    {
        $sql = "UPDATE ";
        $sql .= $this->tableName;
        $sql .= " SET";
        $sql .= "`WiFiName` = '" . $w->getWifiName() . "',";
        $sql .= "`Strength` = '" . $w->getStrength() . "',";
        $sql .= "`Paid` = '" . $w->getPaid() . "',";
        $sql .= "`UsersPerDay` = '" . $w->getUserPerDay() . "',";
        $sql .= "`latitude` = '" . $w->getLatitude() . "',";
        $sql .= "`longitude` = '" . $w->getLongitude() . "',";
        $sql .= "`Address` = '" . $w->getAddress() . "',";
        $sql .= "`DateRegistered` = " . date("Y-m-d");
        $sql .= " WHERE ";
        $sql .= "`wifispots`.`idWiFiSpots` = " . $w->getId();
        $stmt = $this->connection->getInstance()->prepare($sql);
        $exec = $stmt->execute();
        return $exec;
    }
}
