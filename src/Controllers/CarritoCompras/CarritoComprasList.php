<?php

namespace Controllers\CarritoCompras;

use Controllers\PrivateController;
use Controllers\PublicController;
use Dao\CarritoCompras\CarritoCompras;
use Views\Renderer;

class CarritoComprasList extends PublicController
{
    public function run(): void
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            if (CarritoCompras::eliminarItemCarrito($id)) {
                header('Location: index.php?page=CarritoCompras-CarritoComprasList');
                exit;
            } else {
                echo "Error al eliminar el artículo.";
            }
        }

        $carritoDao = CarritoCompras::obtenerCarritoCompras();
        $viewCarrito = [];

        foreach ($carritoDao as $item) {
            $viewCarrito[] = $item;
        }
        $viewData = [
            "carrito" => $viewCarrito,
        ];
        Renderer::render('carritoCompras/carritocompras_list', $viewData);
    }
}

