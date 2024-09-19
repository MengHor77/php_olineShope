<?php
$url = $_SERVER['REQUEST_URI'];

// Define the mapping of URLs to files
$routes = [
    '/php/src/home' => 'Page/publicSite/home/home.php',
    '/php/src/food' => 'Page/publicSite/food/food.php',
    '/php/src/drink' => 'Page/publicSite/drink/drink.php',
    '/php/src/health-beauty' => 'Page/publicSite/healthAndBeauty/healthAndBeauty.php',
    '/php/src/home-life-style' => 'Page/publicSite/homeAndLifeStyle/homeAndLifeStyle.php',
    '/php/src/new' => 'Page/publicSite/new/new.php',

];

// Remove query string if it exists
$url = explode('?', $url)[0];

// Include the appropriate file based on the URL
if (array_key_exists($url, $routes)) {
    include $routes[$url];
} else {
    // Handle 404 error
    echo "404 Not Found";
}