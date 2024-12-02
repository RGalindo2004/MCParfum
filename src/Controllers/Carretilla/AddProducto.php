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
    private $productid='';
    public $productPrice = '';

    public function run(): void{
        
        $this->productid = $_GET ["productid"];
        $this->productPrice = $_GET ["productPrice"];
        /*echo("Estoy en AddPoroductos".$this->productid);*/
        $result= CartDao:: AddProductoCartAnon($_SERVER['REMOTE_ADDR'],$this->productid,"1", $this->productPrice);
        \Utilities\Site::redirectTo("index.php?page=HomeController");
    }
}