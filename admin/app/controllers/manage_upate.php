<?php

require '../ConfigEnum.php';
require '../DatabaseConfiguration.php';
require '../DatabaseConnection.php';
require '../dao/WifiSpotsDao.php';
require '../HandleWifiSpots.php';
require '../WifiSpots.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST["updateSubmitBtn"]) && $_POST["updateSubmitBtn"] == "submit")
    {
        echo "<pre>";
        print_r($_POST);
        // TODO
        // use the update function of HandleWifiSpots to update an item
        // see HandleWifiSpotsTest.php testUpdateWifiSpots for reference
        // for feedback use getExecutionFeedback to see if succeed/failed
    }
}