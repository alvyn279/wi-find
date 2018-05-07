<?php
ob_start();
session_start();

require '../ConfigEnum.php';
require '../DatabaseConfiguration.php';
require '../DatabaseConnection.php';
require '../models/Admin.php';
require '../dao/AdminDao.php';
require '../handlers/HandleAdmin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = null;
    if (!filter_var($_POST["loginEmail"], FILTER_VALIDATE_EMAIL)) {
        $errors .= "Please enter a valid email. <br>";
    }
    if (empty($_POST["loginPassword"])) {
        $errors .= "Password cannot be empty.";
    }
    if (!empty($errors)) {
        echo $errors;
    } else {
        $config = new DatabaseConfiguration(
            ConfigEnum::DB_HOST,
            ConfigEnum::DB_PORT,
            ConfigEnum::DB_NAME,
            ConfigEnum::DB_USER,
            ConfigEnum::DB_PASSWORD
        );
        $connection = new DatabaseConnection($config);
        $h = new HandleAdmin($connection);

        $username = $h->getAdminUsernameByEmail($_POST["loginEmail"]);
        $passwordInDb = $h->getPasswordByUsername($username);
        if ($_POST["loginPassword"] != $passwordInDb) {
            echo "Password not match!";
        } else {
            echo "Matched!";
            // TODO set the session variables here
            // and redirect to index
        }
    }
}
