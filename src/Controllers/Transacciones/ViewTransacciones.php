<?php

namespace Controllers\Transacciones;

use Controllers\PrivateController;
use Controllers\PublicController;
use Dao\Transacciones\Transacciones;
use Utilities\Security;
use Utilities\Site;
use Views\Renderer;

class ViewTransacciones extends PrivateController
{
    public function run(): void
{
    $userId = Security::getUserId();
    if ($userId == 0) {
        Site::redirectToWithMsg("index.php?page=Sec_Login", "Debe iniciar sesión para ver sus transacciones.");
    }

    $transacciones = Transacciones::obtenerPagosPorUsuario($userId);

    $sumaTotal = 0;
    foreach ($transacciones as $transaccion) {
        $sumaTotal += $transaccion['total'];
    }

    $viewData = [
        "transacciones" => $transacciones,
        "sumaTotal" => $sumaTotal,
    ];

    Renderer::render("transacciones/transacciones", $viewData);
}

}
?>