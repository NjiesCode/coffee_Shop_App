<?php
namespace App\Models;

class Customer
{
    private $id;
    private $name;
    private $address;
    private $email;
    private $phone;

    public function __construct($name, $address, $email, $phone, $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }
}
