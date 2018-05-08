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
    if (empty($_POST["username"])) {
        $errors .= "Please enter the username. <br>";
    }
    if (empty($_POST["password"])) {
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

        $username = $_POST["username"];
        if ($h->isAdminUserExists($username)) {
            $passwordInDb = $h->getPasswordByUsername($username);
            if ($_POST["password"] != $passwordInDb) {
                echo "Password not match!";
            } else {
                echo "Matched!";
                // TODO set the session variables here
                // and redirect to index
            }
        } else {
            echo "This user does not exists.";
        }
    }
}
