<?php

namespace Controllers\Carretilla;


use Controllers\PrivateController;
use Controllers\PublicController;
use Views\Renderer;
use Utilities\Site;
use Dao\Usuarios\Usuarios;
use Dao\Cart\Cart as CartDao;
use Utilities\Validators;

class AddProducto extends PublicController {
    private $productoId='';

    public function run(): void{
        
        $this->productoId = $_GET ["productoid"];
        /*echo("Estoy en AddPoroductos".$this->productoId);*/
        $result= CartDao:: AddProductoCartAnon($_SERVER['REMOTE_ADDR'],$this->productoId,"1","5");
        \Utilities\Site::redirectTo("index.php?page=HomeController");



    }
}