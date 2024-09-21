<?php

require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/NewController.php';
require_once __DIR__ . '/../app/controllers/DrinkController.php';
require_once __DIR__ . '/../app/controllers/FoodController.php';
require_once __DIR__ . '/../app/controllers/HealthBeautyController.php';
require_once __DIR__ . '/../app/controllers/HomeLifestyleController.php';


$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url)[0]; // Remove query string if any

switch ($url) {
    case '/php/src/':
        $controller = new HomeController();
        $controller->showHome();
        break;

    case '/php/src/food':
        $controller = new FoodController();
        $controller->showFood();
        break;

    case '/php/src/drink':
        $controller = new DrinkController();
        $controller->showDrink();
        break;

    case '/php/src/health-beauty':
        $controller = new HealthBeautyController();
        $controller->showHealthBeauty();
        break;

    case '/php/src/home-life-style':
        $controller = new HomeLifestyleController();
        $controller->showHomeLifestyle();
        break;

    case '/php/src/new':
        $controller = new NewController();
        $controller->showNew();
        break;

    default:
        echo "404 Not Found";
        break;
}
