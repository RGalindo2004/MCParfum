<?php

namespace Controllers\Carretilla;

use Controllers\PublicController;
use Dao\Cart\Cart as CartDao;
use Utilities\Site;

class RemoveProducto extends PublicController
{
    public function run(): void
    {
        $usercod = $_GET['usercod'] ?? $_SERVER['REMOTE_ADDR'];
        $productId = $_GET['productId'] ?? null;

        if ($productId) {
            CartDao::removeProductoCartUser($usercod, $productId);
        }

        Site::redirectToWithMsg('Carretilla/carretilla', 'Producto eliminado del carrito.');
    }
}
