<?php

namespace App\Models;

class OrderItem
{
    private $id;
    private $orderId;
    private $coffeeId;
    private $quantity;
    private $price;

    public function __construct($orderId, $coffeeId, $quantity, $price)
    {
        $this->orderId = $orderId;
        $this->coffeeId = $coffeeId;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    public function getCoffeeId()
    {
        return $this->coffeeId;
    }

    public function setCoffeeId($coffeeId)
    {
        $this->coffeeId = $coffeeId;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}
