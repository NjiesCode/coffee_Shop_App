<?php
// src/Services/OrderService.php

namespace App\Services;

use App\Database\Database;
use App\Models\Order;
use App\Models\OrderItem;

class OrderService
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db->getConnection();
    }

    public function getAllCoffeeItems()
    {
        // Implement logic to fetch all coffee items
        // Example implementation:
        $coffeeItems = [
            ['id' => 1, 'name' => 'Espresso', 'price' => 2.5],
            ['id' => 2, 'name' => 'Latte', 'price' => 3.0],
            ['id' => 3, 'name' => 'Cappuccino', 'price' => 3.5],
        ];

        return $coffeeItems;
    }

    public function saveOrder(Order $order, array $orderItems)
    {
        // Implement logic to save order and order items to the database
        // Example implementation:
        $orderQuery = "INSERT INTO orders (customer_id, order_date, total_price) VALUES (?, ?, ?)";
        $orderStmt = $this->db->prepare($orderQuery);
        $orderStmt->execute([$order->getCustomerId(), $order->getOrderDate(), $order->getTotalPrice()]);

        $orderId = $this->db->lastInsertId();

        foreach ($orderItems as $orderItem) {
            $itemQuery = "INSERT INTO order_items (order_id, coffee_id, quantity, price) VALUES (?, ?, ?, ?)";
            $itemStmt = $this->db->prepare($itemQuery);
            $itemStmt->execute([$orderId, $orderItem->getCoffeeId(), $orderItem->getQuantity(), $orderItem->getPrice()]);
        }
    }

    public function getOrders()
    {
        // Implement logic to fetch orders from the database
        // Example implementation:
        $stmt = $this->db->query("SELECT * FROM orders");
        $orders = [];

        while ($row = $stmt->fetch()) {
            $order = new Order(
                $row['id'],
                $row['customer_id'],
                $row['order_date'],
                $row['total_price']
            );
            $orders[] = $order;
        }

        return $orders;
    }

    // Other methods of OrderService
}

