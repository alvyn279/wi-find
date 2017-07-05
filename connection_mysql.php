<?php
$servername = "localhost";
$username = "root";
$password = "";


// PDO class usage for opening a connection to MySQL with the use of PHP
try {
    $conn = new PDO("mysql:host=$servername;wifi_database=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully. Transmitting"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>






<!-- CLOSE CONNECTION $conn = null; -->