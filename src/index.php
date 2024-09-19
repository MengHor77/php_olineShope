<?php
// Include the HomeController class
require __DIR__ . '/../app/controllers/HomeController.php'; // Adjusted path to HomeController.php

// Create an instance of HomeController
$controller = new HomeController();

// Get the URL parameter, default to 'home'
$url = $_GET['url'] ?? 'home';

// Route based on URL
switch ($url) {
    case 'home':
        $controller->showHome();
        break;
    case 'food':
        $controller->showFood();
        break;
    case 'drink':
        $controller->showDrink();
        break;
    case 'healthbeauty':
        $controller->showHealthBeauty();
        break;
    case 'homelifestyle':
        $controller->showHomeLifestyle();
        break;
    default:
        // Handle 404 or redirect to home
        $controller->showHome(); // Default to home
        break;
}
