<?php
require_once __DIR__ . '/../app/controllers/HomeController.php';

$url = $_SERVER['REQUEST_URI'];

// Define the mapping of URLs to controller methods
$routes = [
    '/php/src/' => 'home', 
    '/php/src/home' => 'home',
    '/php/src/food' => 'food',
    '/php/src/drink' => 'drink',
    '/php/src/health-beauty' => 'healthBeauty',
    '/php/src/home-life-style' => 'homeLifestyle',
    '/php/src/new' => 'new',
];

$url = explode('?', $url)[0];

// Create an instance of the HomeController
$controller = new HomeController();

// Call the appropriate method based on the URL
if (array_key_exists($url, $routes)) {
    $method = 'show' . ucfirst($routes[$url]);
    $controller->$method();
} else {
    
    echo "404 Not Found";
}