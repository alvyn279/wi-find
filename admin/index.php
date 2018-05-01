<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">

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
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>

            <div class="form-inline mt-2 mt-md-0">
                <a class="nav-link" href="#">Logout</a>
            </div>
        </div>
    </nav>
</header>

<main role="main" class="container">
    <div class="mt-3">
        <h2>List of entries</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Spot Name</th>
                <th>Address</th>
                <th>View Details</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>1</th>
                <td>Citizen Kane</td>
                <td>1941</td>
                <td><a href="">1941</a></td>
                <td>
                    <button class="fas fa-pencil-alt"></button>
                </td>
                <td>
                    <button class="fas fa-trash-alt"></button>
                </td>
            </tr>
            <tr>
                <th>2</th>
                <td>Casablanca</td>
                <td>1942</td>
                <td><a href="http://en.wikipedia.org/wiki/Citizen_Kane" data-rel="external">Citizen Kane</a></td>
                <td>
                    <button class="fas fa-pencil-alt"></button>
                </td>
                <td>
                    <button class="fas fa-trash-alt"></button>
                </td>
            </tr>
            </tbody>
        </table>
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
</body>
</html>