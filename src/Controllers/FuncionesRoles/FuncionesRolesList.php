<?php

namespace Controllers\FuncionesRoles;

use Controllers\PrivateController;
use Controllers\PublicController;
use Dao\FuncionesRoles\FuncionesRoles;
use Views\Renderer;

class FuncionesRolesList extends PrivateController
{
    public function run(): void
    {
        $funcionesRoles = FuncionesRoles::obtenerFuncionesRoles();
        $viewData = ["funcionesRoles" => $funcionesRoles];

        Renderer::render('funcionesroles/funcionesroles_list', $viewData);
    }
}