<?php

namespace Controllers\PagosTransacciones;

use Controllers\PrivateController;
use Controllers\PublicController;
use Dao\PagosTransacciones\PagosTransacciones as PagosTransaccionesDao;
use Views\Renderer;

class ViewPagosTransacciones extends PrivateController
{
    public function run(): void
{
    $pagosTransacciones = PagosTransaccionesDao::obtenerTodosLosPagos();

    $sumaTotal = 0;
    foreach ($pagosTransacciones as $pago) {
        $sumaTotal += $pago['total'];
    }

    $viewData = [
        "pagosTransacciones" => $pagosTransacciones,
        "sumaTotal" => $sumaTotal,
    ];

    Renderer::render("pagostransacciones/pagostransacciones", $viewData);
}

}
?>