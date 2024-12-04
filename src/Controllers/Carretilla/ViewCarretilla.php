<?php

namespace Controllers\Carretilla;

use Controllers\PublicController;
use Dao\Cart\Cart as CartDao;
use Views\Renderer;
use Utilities\Security;
use Utilities\Site;

class ViewCarretilla extends PublicController
{
    public function run(): void
    {
        $userId = Security::getUserId();
        if ($userId == 0) {
            Site::redirectToWithMsg("index.php?page=Sec_Login", "Necesita iniciar sesión para ver el carrito");
        }

        $userId = Security::getUserId();
        $cartItems = CartDao::getProductosCarretillaUser($userId);

        $total = 0;
        foreach ($cartItems as &$item) {
            $productId = $item['productId'];
            if (isset($_SESSION['cart_items'][$productId])) {
                $item['productName'] = $_SESSION['cart_items'][$productId]['productName'];
            }
            $total += $item["crrctd"] * $item["crrprc"];
        }

        $viewData = [
            'cartItems' => $cartItems,
            'total' => $total
        ];

        Renderer::render('Carretilla/carretilla', $viewData);
    }
}