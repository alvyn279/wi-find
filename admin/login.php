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
        <a class="navbar-brand" href="index.php">Wi-Find Administrator</a>
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
        </div>
    </nav>
</header>

<main role="main" class="container text-center">
    <div class="row">
        <div class="col-4"></div>
        <div class="col">
            <form class="form-signin" id="login-form">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="inputPassword" class="form-control"
                       placeholder="Password">
                <button class="btn btn-lg btn-default btn-block" type="submit">Sign in</button>
            </form>
        </div>
        <div class="col-4"></div>
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