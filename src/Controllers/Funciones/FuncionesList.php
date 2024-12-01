<?php

namespace Controllers\Funciones;

use Controllers\PrivateController;
use Controllers\PublicController;
use Dao\Funciones\Funciones;
use Views\Renderer;

class FuncionesList extends PrivateController
{
    public function run(): void
    {
        $funcionesDao = Funciones::obtenerFunciones();
        $viewFunciones = [];

        foreach ($funcionesDao as $funcion) {
            $viewFunciones[] = $funcion;
        }

        $viewData = [
            "funcion" => $viewFunciones,

            "INS_enable" => $this->isFeatureAutorized('funciones_INS_enable'),
            "UPD_enable" => $this->isFeatureAutorized('funciones_UPD_enable'),
            "DEL_enable" => $this->isFeatureAutorized('funciones_DEL_enable'),
        
            "fncod_enable" => $this->isFeatureAutorized('fncod_enable'),
            "fndsc_enable" => $this->isFeatureAutorized('fndsc_enable'),
            "fnest_enable" => $this->isFeatureAutorized('fnest_enable'),
            "fntyp_enable" => $this->isFeatureAutorized('fntyp_enable'),
        ];

        Renderer::render('funciones/funciones_list', $viewData);
    }
}