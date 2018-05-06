<?php

class WifiSpots
{
    private $id;
    private $wifiName;
    private $strength;
    private $paid;
    private $userPerDay;
    private $latitude;
    private $longitude;
    private $address;
    private $dateRegistered;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getWifiName()
    {
        return $this->wifiName;
    }

    public function setWifiName($wifiName)
    {
        $this->wifiName = $wifiName;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    public function getPaid()
    {
        return $this->paid;
    }

    public function setPaid($paid)
    {
        $this->paid = $paid;
    }

    public function getUserPerDay()
    {
        return $this->userPerDay;
    }

    public function setUserPerDay($userPerDay)
    {
        $this->userPerDay = $userPerDay;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getDateRegistered()
    {
        return $this->dateRegistered;
    }

    public function setDateRegistered($dateRegistered)
    {
        $this->dateRegistered = $dateRegistered;
    }
}
