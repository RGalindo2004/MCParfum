<?php

namespace Controllers\Carros;

use Controllers\PublicController;
use Dao\Carros\Carros;

class CarrosList extends PublicController
{
    public function run ():void
    {
        $carrosDao = Carros::obtenerCarros();
        print_r($carrosDao);
        die();
    }
}