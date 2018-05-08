<?php
ob_start();
session_start();

require 'app/ConfigEnum.php';
require 'app/DatabaseConfiguration.php';
require 'app/DatabaseConnection.php';
require 'app/models/WifiSpots.php';
require 'app/dao/WifiSpotsDao.php';
require 'app/handlers/HandleWifiSpots.php';

$config = new DatabaseConfiguration(
    ConfigEnum::DB_HOST,
    ConfigEnum::DB_PORT,
    ConfigEnum::DB_NAME,
    ConfigEnum::DB_USER,
    ConfigEnum::DB_PASSWORD
);
$connection = new DatabaseConnection($config);
$wifiSpot = new HandleWifiSpots($connection);
$items = $wifiSpot->getAllItems();

$isLoggedIn = false;
$adminUsername = null;
if (isset($_SESSION)) {
    if (isset($_SESSION["authenticated"]) && isset($_SESSION["adminUsername"])) {
        $isLoggedIn = true;
        $adminUsername = $_SESSION["adminUsername"];
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">
    <link rel="stylesheet" href="css/sticky-footer-navbar.css">

    <title>Wi-Find Admin Page</title>
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
    <div class="mt-3" id="tableContainer">
        <h2>List of entries</h2>
        <table class="table" id="entryTable">
            <thead>
            <tr>
                <th>#</th>
                <th class="text-hide p-0"></th>
                <th>Spot Name</th>
                <th>Address</th>
                <th>View Details</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $k => $v) { ?>
            <tr>
                <th><?php echo ($k + 1); ?></th>
                <td class="text-hide p-0" data-id="<?php echo $v["idWiFiSpots"]; ?>"><?php echo $v["idWiFiSpots"]; ?></td>
                <td><?php echo $v["WiFiName"]; ?></td>
                <td><?php echo $v["Address"]; ?></td>
                <td>
                    <?php if ($isLoggedIn) { ?>
                    <a href="view.php?itemId=<?php echo $v["idWiFiSpots"]; ?>">
                        <button type="button" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></button>
                    </a>
                    <?php } else { ?>
                    <a href="#" data-toggle="modal" data-target=".sign-in-required-modal">
                        <button type="button" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></button>
                    </a>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($isLoggedIn) { ?>
                    <a href="edit.php?itemId=<?php echo $v["idWiFiSpots"]; ?>">
                        <button type="button" class="btn btn-sm btn-dark"><i class="fas fa-pencil-alt"></i></button>
                    </a>
                    <?php } else { ?>
                    <a href="#" data-toggle="modal" data-target=".sign-in-required-modal">
                        <button type="button" class="btn btn-sm btn-dark"><i class="fas fa-pencil-alt"></i></button>
                    </a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        <div class="my-3">
            <label class="text-secondary font-weight-bold">With selected:</label>
            <?php if ($isLoggedIn) { ?>
            <button type="button" id="confirmDeletion" class="btn btn-outline-danger btn-sm">
                <i class="fas fa-trash-alt mr-1"></i>Delete</button>
            <?php } else { ?>
            <a href="#" data-toggle="modal" data-target=".sign-in-required-modal">
                <button type="button" class="btn btn-outline-danger btn-sm">
                    <i class="fas fa-trash-alt mr-1"></i>Delete
                </button>
            </a>
            <?php } ?>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete selected item(s)? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="deleteConfirm">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="deletionSuccessModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="alert alert-success" role="alert"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="deletionSuccessClose">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal sign-in-required-modal" tabindex="-1" role="dialog" aria-labelledby="signInRequiredModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Sign in required</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Sign in required to manage entries.</h4>
                    <a href="login.php">Login</a>
                </div>
            </div>
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
<script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
<script src="js/handle-requests.js"></script>
</body>
</html>
