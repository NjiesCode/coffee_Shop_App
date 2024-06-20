<?php
namespace App\Models;

class Order
{
    private $id;
    private $customerId;
    private $orderDate;
    private $totalPrice;

    public function __construct($customerId, $orderDate, $totalPrice, $id = null)
    {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->orderDate = $orderDate;
        $this->totalPrice = $totalPrice;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function getOrderDate()
    {
        return $this->orderDate;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
}
