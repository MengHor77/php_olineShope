
<?php

class HomeController
{
    // Method to render the home page
    public function showHome()
    {
        include __DIR__ . '/../../src/Page/publicSite/home/home.php'; // Adjust path as necessary
    }

    // Method to render the food page
    public function showFood()
    {
        include __DIR__ . '/../../src/Page/publicSite/food/food.php'; // Adjust path as necessary
    }

    // Method to render the drink page
    public function showDrink()
    {
        include __DIR__ . '/../../src/Page/publicSite/drink/drink.php'; // Adjust path as necessary
    }

    // Method to render the health and beauty page
    public function showHealthBeauty()
    {
        include __DIR__ . '/../../src/Page/publicSite/healthbeauty/healthbeauty.php'; // Adjust path as necessary
    }

    // Method to render the home and lifestyle page
    public function showHomeLifestyle()
    {
        include __DIR__ . '/../../src/Page/publicSite/homelifestyle/homelifestyle.php'; // Adjust path as necessary
    }
}

