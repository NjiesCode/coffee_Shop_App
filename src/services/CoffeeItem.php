<?php
namespace App\Models;

class CoffeeItem
{
    private $id;
    private $name;
    private $description;
    private $price;

    public function __construct($name, $description, $price, $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }
}
