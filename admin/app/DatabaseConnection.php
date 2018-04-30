<?php

namespace admin\app;

use PDO;
use PDOException;

class DatabaseConnection
{
    private $configuration;

    public function __construct(DatabaseConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getInstance()
    {
        try {
            $pdo = new PDO(
                "mysql:host=" . $this->configuration->getHost() .
                ';port=' . $this->configuration->getPort() .
                ';dbname=' . $this->configuration->getName(),
                $this->configuration->getUsername(),
                $this->configuration->getPassword()
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            $pdo->query('SET NAMES utf8');
            $pdo->query('SET CHARACTER SET utf8');
            return $pdo;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
        return null;
    }
}
