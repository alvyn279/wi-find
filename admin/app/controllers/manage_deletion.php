<?php

require '../ConfigEnum.php';
require '../DatabaseConfiguration.php';
require '../DatabaseConnection.php';
require '../dao/WifiSpotsDao.php';
require '../handlers/HandleWifiSpots.php';

$config = new DatabaseConfiguration(
    ConfigEnum::DB_HOST,
    ConfigEnum::DB_PORT,
    ConfigEnum::DB_NAME,
    ConfigEnum::DB_USER,
    ConfigEnum::DB_PASSWORD
);
$connection = new DatabaseConnection($config);
$hws = new HandleWifiSpots($connection);

// see the AJAX request that's calling this script
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deletion"])) {
    $itemIds = $_POST["items"];
    $hws->deleteItems($itemIds);
    echo $hws->getExecutionFeedback();
}
