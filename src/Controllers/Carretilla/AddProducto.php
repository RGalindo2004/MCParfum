<?php

namespace Controllers\Carretilla;

use Controllers\PublicController;
use Utilities\Site;
use Utilities\Security;
use Dao\Cart\Cart as CartDao;

class AddProducto extends PublicController
{
    public function run(): void
    {
        $userId = Security::getUserId();
        if ($userId == 0) {
            Site::redirectToWithMsg("index.php?page=Sec_Login", "Necesita iniciar sesión para comprar");
        }

        $productId = $_POST['productid'] ?? $_GET['productid'];
        $productName = $_POST['productName'] ?? $_GET['productName'];
        $productPrice = $_POST['productPrice'] ?? $_GET['productPrice'];
        $crrctd = $_POST['quantity'] ?? 1;

        CartDao::AddProductoCartUser($userId, $productId, $productName, $productPrice, $crrctd);

        $_SESSION['cart_items'][$productId] = [
            'productName' => $productName,
            'productPrice' => $productPrice,
            'quantity' => $crrctd
        ];

        Site::redirectToCartorBack("index.php?page=HomeController", "Producto agregado exitosamente.");
    }
}