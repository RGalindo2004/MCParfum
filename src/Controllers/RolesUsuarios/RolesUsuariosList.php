<?php

namespace Controllers\RolesUsuarios;

use Controllers\PrivateController;
use Dao\RolesUsuarios\RolesUsuarios;
use Views\Renderer;

class RolesUsuariosList extends PrivateController
{
    public function run(): void
    {
        $rolesUsuarios = RolesUsuarios::obtenerRolesUsuarios();
        $viewData = [
            "rolesUsuarios" => $rolesUsuarios,

            "INS_enable" => $this->isFeatureAutorized('rolesusuarios_INS_enable'),
            "UPD_enable" => $this->isFeatureAutorized('rolesusuarios_UPD_enable'),
            "DEL_enable" => $this->isFeatureAutorized('rolesusuarios_DEL_enable')
        ];

        Renderer::render('rolesusuarios/rolesusuarios_list', $viewData);
    }
}