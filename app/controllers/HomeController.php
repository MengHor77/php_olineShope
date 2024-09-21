<?php

class HomeController
{
    
    public function showHome()
    {
        include __DIR__ . '/../../src/Page/publicSite/home/home.php'; 
    }

    public function showFood()
    {
        include __DIR__ . '/../../src/Page/publicSite/food/food.php'; 
    }
  
    public function showDrink()
    {
        include __DIR__ .'/../../src/Page/publicSite/drink/drink.php'; 
    }
   
    public function showHealthBeauty()
    {
        include __DIR__ . '/../../src/Page/publicSite/healthAndBeauty/healthAndBeauty.php'; 
    }
    
    public function showHomeLifestyle()
    {
        include __DIR__ . '/../../src/Page/publicSite/homeAndLifestyle/homeAndLifestyle.php'; 
    }
    public function showNew()
    {
        include __DIR__ . '/../../src/Page/publicSite/new/new.php';
    }
}