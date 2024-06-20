<?php

namespace App\Controllers;

use App\Services\UserService;
use App\Models\User; // Ensure this namespace is correctly used

class UserController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = password_hash(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING), PASSWORD_BCRYPT);

            $user = new User(null, $name, $email, $password); // Ensure correct namespace
            $this->userService->register($user);

            header('Location: /login.php');
            exit;
        }

        require __DIR__ . '/../../views/register.php';
    }
}
