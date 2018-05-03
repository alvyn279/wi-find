<?php

class HandleWifiSpots extends WifiSpotsDao
{

    public function __construct(DatabaseConnection $connection)
    {
        parent::__construct($connection);
    }

    public function isItemExists($id)
    {
        return $this->getItemById($id) != null;
    }

    public function getItemById($id)
    {
        $item = null;
        foreach ($this->getData() as $v) {
            if ($v["idWiFiSpots"] == $id) {
                $item = $v;
                break;
            }
        }
        return $item;
    }

    public function getAllItems()
    {
        return $this->getData();
    }
}
