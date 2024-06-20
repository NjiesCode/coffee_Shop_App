<?php
// Include Composer's autoloader
require __DIR__ . '/../vendor/autoload.php';

// Use statements to import necessary classes
use App\Controllers\OrderController;
use App\Services\OrderService;
use App\Database\Database;

// Instantiate the necessary classes
$db = new Database();
$orderService = new OrderService($db);
$orderController = new OrderController($orderService);

// Handle the request
$orderController->handleRequest();

