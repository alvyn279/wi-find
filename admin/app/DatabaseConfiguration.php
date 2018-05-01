<?php

namespace admin\app;

class DatabaseConfiguration
{
    private $host;
    private $port;
    private $name;
    private $username;
    private $password;

    public function __construct($host, $port, $name, $username, $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUsername()
    {
        return $this->username;
    }
}
