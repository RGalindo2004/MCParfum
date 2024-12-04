<?php

namespace Controllers\Carretilla;

use Controllers\PublicController;
use Dao\Cart\Cart as CartDao;
use Views\Renderer;
use Utilities\Security;

class ViewCarretilla extends PublicController
{
    public function run(): void
    {
        $productId = isset($_GET['productid']) ? $_GET['productid'] : null;
        $productPrice = isset($_GET['productPrice']) ? $_GET['productPrice'] : null;
        $productName = isset($_GET['productName']) ? $_GET['productName'] : null;

        if ($productId && $productPrice && $productName) {
            CartDao::AddProductoCartUser($productId, $productPrice, $productName, Security::getUserId());
        }

        $userId = Security::getUserId();
        $cartItems = CartDao::getProductosCarretillaUser($userId);

        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item["crrctd"] * $item["crrprc"];
        }

        $viewData = [
            'cartItems' => $cartItems,
            'total' => $total
        ];

        Renderer::render('Carretilla/carretilla', $viewData);
    }
}

