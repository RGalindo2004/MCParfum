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
        $viewData =
        [
            "funcionesRoles" => $funcionesRoles,

            "INS_enable" => $this->isFeatureAutorized('funcionesroles_INS_enable'),
            "UPD_enable" => $this->isFeatureAutorized('funcionesroles_UPD_enable'),
            "DEL_enable" => $this->isFeatureAutorized('funcionesroles_DEL_enable')
        
        ];

        Renderer::render('funcionesroles/funcionesroles_list', $viewData);
    }
}