<?php

class HandleWifiSpots extends WifiSpotsDao
{
    private $executionFeedback;

    public function __construct(DatabaseConnection $connection)
    {
        parent::__construct($connection);
    }

    public function getExecutionFeedback()
    {
        return $this->executionFeedback;
    }

    public function setExecutionFeedback($executionFeedback)
    {
        $this->executionFeedback = $executionFeedback;
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

    public function deleteItems($items)
    {
        $outSuccess = "You have successfully deleted the(se) item(s).";
        $outFailure = "Error occurred in the server. Please try again later.";
        for ($i = 0; $i < count($items); $i++) {
            if ($this->delete($items[$i])) {
                $this->setExecutionFeedback($outSuccess);
            } else {
                $this->setExecutionFeedback($outFailure);
            }
        }
    }

    public function updateWifiSpot(WifiSpots $w)
    {
        if ($this->update($w)) {
            $this->setExecutionFeedback("You have successfully updated this item.");
        } else {
            $this->setExecutionFeedback("Server error. Please try again later");
        }
    }
}
