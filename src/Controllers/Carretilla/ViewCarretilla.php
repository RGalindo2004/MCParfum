<?php

namespace Controllers\Carretilla;

use Controllers\PublicController;
use Dao\Cart\Cart as CartDao;
use Views\Renderer;

class ViewCarretilla extends PublicController
{
    public function run(): void
    {
        $usercod = $_GET['usercod'] ?? $_SERVER['REMOTE_ADDR'];
        
        $cartItems = CartDao::getProductosCarretillaUser($usercod);

        $total = array_reduce($cartItems, function ($carry, $item) {
            return $carry + ($item["crrctd"] * $item["productPrice"]);
        }, 0);

        $viewData = [
            'cartItems' => $cartItems,
            'total' => $total
        ];

        Renderer::render('Carretilla/carretilla', $viewData);
    }
}
