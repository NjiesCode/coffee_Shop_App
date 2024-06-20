<?php

namespace App\Models;

class Order
{
    private $id;
    private $customerId;
    private $orderDate;
    private $totalPrice;

    public function __construct($customerId, $orderDate, $totalPrice)
    {
        $this->customerId = $customerId;
        $this->orderDate = $orderDate;
        $this->totalPrice = $totalPrice;
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

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    public function getOrderDate()
    {
        return $this->orderDate;
    }

    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }
}
