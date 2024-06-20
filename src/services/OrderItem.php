<?php
namespace App\Models;

class OrderItem
{
    private $id;
    private $orderId;
    private $coffeeId;
    private $quantity;
    private $price;

    public function __construct($orderId, $coffeeId, $quantity, $price, $id = null)
    {
        $this->id = $id;
        $this->orderId = $orderId;
        $this->coffeeId = $coffeeId;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function getCoffeeId()
    {
        return $this->coffeeId;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getPrice()
    {
        return $this->price;
    }
}
