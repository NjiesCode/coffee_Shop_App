<?php
// src/Controllers/OrderController.php

namespace App\Controllers;

use App\Services\OrderService;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function handleRequest()
    {
        $url = isset($_GET['url']) ? explode('/', filter_var($_GET['url'], FILTER_SANITIZE_STRING)) : [];

        switch ($url[0] ?? '') {
            case '':
                $this->showOrderForm();
                break;
            case 'submit':
                $this->submitOrder();
                break;
            case 'success':
                $this->showSuccessPage();
                break;
            case 'orders':
                $this->showOrderList();
                break;
            default:
                $this->showOrderForm();
                break;
        }
    }

    private function showOrderForm()
    {
        try {
            // Get coffee items from the service
            $coffeeItems = $this->orderService->getAllCoffeeItems();

            // Prepare data for the view
            $data = ['coffeeItems' => $coffeeItems];

            // Include the view file
            require __DIR__ . '/../views/orderForm.php';
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    private function submitOrder()
    {
        try {
            // Example logic for submitting an order

            // Placeholder customer ID
            $customerId = 1;

            // Current order date
            $orderDate = date('Y-m-d H:i:s');

            // Total price from the form input
            $totalPrice = filter_input(INPUT_POST, 'total_price', FILTER_VALIDATE_FLOAT);

            if ($totalPrice === false) {
                throw new \Exception("Invalid total price.");
            }

            // Create an Order object
            $order = new Order($customerId, $orderDate, $totalPrice);

            // Prepare order items from the form data
            $orderItems = [];
            $items = filter_input(INPUT_POST, 'coffee_items', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            if ($items) {
                foreach ($items as $item) {
                    $coffeeId = filter_var($item['coffee_id'], FILTER_VALIDATE_INT);
                    $quantity = filter_var($item['quantity'], FILTER_VALIDATE_INT);
                    $price = filter_var($item['price'], FILTER_VALIDATE_FLOAT);

                    if ($coffeeId && $quantity && $price) {
                        // Create an OrderItem object and add to the list
                        $orderItems[] = new OrderItem(null, $coffeeId, $quantity, $price);
                    } else {
                        throw new \Exception("Invalid order item data.");
                    }
                }
            } else {
                throw new \Exception("No items found.");
            }

            // Save the order using the OrderService
            $this->orderService->saveOrder($order, $orderItems);

            // Redirect to the success page after successful submission
            header('Location: /coffee_shop/public/index.php/success');
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    private function showSuccessPage()
    {
        // Example success page logic
        require __DIR__ . '/../views/orderSuccess.php';
    }

    private function showOrderList()
    {
        try {
            // Example logic to retrieve and display order list
            $orders = $this->orderService->getOrders();
            require __DIR__ . '/../views/orderList.php';
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
