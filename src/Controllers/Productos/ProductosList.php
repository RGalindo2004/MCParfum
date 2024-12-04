<?php

namespace Controllers\Productos;

use Controllers\PublicController;
use Dao\Productos\Productos;
use Views\Renderer;

class ProductosList extends PublicController
{
    public function run(): void
    {
        $productosDao = Productos::obtenerProductos();
        $viewProductos = [];
        $estadosDscArr = [
            "ACT" => "Disponible",
            "INA" => "Vendido"
        ];
        foreach ($productosDao as $producto) {
            $producto["estadoDsc"] = $estadosDscArr[$producto["productStatus"]];
            $viewProductos[] = $producto;
        }
        $viewData = [
            "productos" => $viewProductos
        ];

        Renderer::render('productos/productos_list', $viewData);
    }
}