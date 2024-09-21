<?php
session_start();

require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/NewController.php';
require_once __DIR__ . '/../app/controllers/DrinkController.php';
require_once __DIR__ . '/../app/controllers/FoodController.php';
require_once __DIR__ . '/../app/controllers/HealthBeautyController.php';
require_once __DIR__ . '/../app/controllers/HomeLifestyleController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php'; 
require_once __DIR__ . '/../app/controllers/ProductController.php';



$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url)[0]; // Remove query string if any

// Database connection
$servername = 'localhost';
$dbname = 'php_test_database'; 
$username = 'root';
$password = '';
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Create users table if it doesn't exist
$tableCreationQuery = "
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    );
";

if (!$db->query($tableCreationQuery)) {
    echo "Error creating table: " . $db->error;
    exit; // Exit if there's an error
}

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

    case '/php/src/register':
        $controller = new AuthController($db);
        $controller->register();
        break;

    case '/php/src/login':
        $controller = new AuthController($db);
        $controller->login();
        break;

    case '/php/src/logout':
        $controller = new AuthController($db);
        $controller->logout();
        break;

    case '/php/src/dashboard':
        // Redirect to login if not logged in
        if (!isset($_SESSION['user'])) {
            header('Location: /php/src/login');
            exit;
        }
        // Include the dashboard if the user is logged in
        include __DIR__ . '/../app/views/dashboard.php';
        break;

    default:
        echo "404 Not Found";
        break;
}
