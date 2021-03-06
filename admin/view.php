<?php
ob_start();
session_start();

require 'app/ConfigEnum.php';
require 'app/DatabaseConfiguration.php';
require 'app/DatabaseConnection.php';
require 'app/models/WifiSpots.php';
require 'app/dao/WifiSpotsDao.php';
require 'app/handlers/HandleWifiSpots.php';

$isLoggedIn = false;
$adminUsername = null;
$v = null;
$isExist = false;
if (isset($_SESSION)) {
    if (isset($_SESSION["authenticated"]) && isset($_SESSION["adminUsername"])) {
        $isLoggedIn = true;
        $adminUsername = $_SESSION["adminUsername"];

        if (isset($_GET["itemId"])) {
            $config = new DatabaseConfiguration(
                ConfigEnum::DB_HOST,
                ConfigEnum::DB_PORT,
                ConfigEnum::DB_NAME,
                ConfigEnum::DB_USER,
                ConfigEnum::DB_PASSWORD
            );
            $connection = new DatabaseConnection($config);
            $wifiSpot = new HandleWifiSpots($connection);

            $itemId = $_GET["itemId"];
            if ($wifiSpot->isItemExists($itemId)) {
                $v = $wifiSpot->getItemById($itemId);
                $isExist = true;
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="../wifind.ico"/>
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">

    <title>Wi-Find View Entry</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Wi-Find Administrator</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <?php if ($isLoggedIn) { ?>
                <div class="form-inline mt-2 mt-md-0">
                    <h5 class="text-white pr-2"><?php echo $adminUsername; ?></h5><a class="btn btn-light" id="sign-out"><i class="fa fa-sign-out-alt"></i></a>
                </div>
            <?php } else { ?>
                <div class="form-inline mt-2 mt-md-0">
                    <h5 class="text-white pr-2">Sign in</h5><a class="btn btn-light" href="login.php"><i class="fa fa-sign-in-alt"></i></a>
                </div>
            <?php } ?>
        </div>
    </nav>
</header>

<main role="main" class="container">
    <?php if (!$isExist) { ?>
        <div class="alert alert-dark mt-4" role="alert">
            This entry <span class="alert-link">does not exist</span>.
        </div>
    <?php } ?>
    <h3 class="mt-4 mb-4">Details about this entry</h3>
    <div class="form-group">
        <label class="control-label col-sm-2" for="wifiname">Spot name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="wifiname" readonly
                   value="<?php echo $v["WiFiName"];?> ">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="address">Spot Address:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="address" name="address" readonly
            value="<?php echo $v["Address"];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="latitude">Latitude:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="latitude" name="latitude" readonly
            value="<?php echo $v["latitude"];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="longitude">Longitude:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="longitude" name="longitude" readonly
            value="<?php echo $v["longitude"];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="isPaid">Paid </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="isPaid" readonly value="<?php echo $v["Paid"];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="userPerDay">Users per day </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="userPerDay" readonly value="<?php echo $v["UsersPerDay"];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="wifiStrength">Wifi strength</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="wifiStrength" readonly value="<?php echo $v["Strength"];?>">
        </div>
    </div>
</main>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Copyrights &copy; All rights reserved to author. Restricted Usage</span>
    </div>
</footer>

<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js"
        integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l"
        crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js"
        integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c"
        crossorigin="anonymous"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="js/handle-requests.js"></script>
</body>
</html>
