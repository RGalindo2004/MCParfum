<?php

namespace Controllers\Carretilla;

use Controllers\PublicController;
use Dao\Cart\Cart as CartDao;
use Utilities\Site;
use Utilities\Security;

class RemoveProducto extends PublicController
{
    public function run(): void
    {
        $userId = Security::getUserId();
        $productId = $_GET['productId'] ?? null;

        if ($productId) {
            CartDao::removeProductoCartUser($userId, $productId);
        }

        Site::redirectToWithMsg('index.php?page=Carretilla-ViewCarretilla', 'Producto eliminado del carrito.');
    }
}
