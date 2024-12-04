<?php

namespace Controllers\Carretilla;

use Controllers\PublicController;
use Utilities\Site;
use Dao\Cart\Cart as CartDao;

class AddProducto extends PublicController
{
    private $productid = '';
    public $productPrice = '';
    public $productName = '';

    public function run(): void
    {
        $usercod = $_GET['usercod'] ?? null;

        if ($usercod === null) {
            Site::redirectToWithMsg("index.php?page=Sec_Login", "Debes iniciar sesión para agregar productos.");
            return;
        }

        $productId = $_POST['productid'] ?? $_GET['productid'];
        $productPrice = $_POST['productPrice'] ?? $_GET['productPrice'];
        $productName = $_POST['productName'] ?? $_GET['productName'];

        $result = CartDao::AddProductoCartUser(
            $usercod,
            $productId,
            $productName,
            1,
            $productPrice
        );

        Site::redirectToWithMsg("Carretilla/carretilla", "Producto agregado exitosamente");
    }
}
