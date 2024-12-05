<?php

namespace Controllers\Productos;

use Controllers\PrivateController;
use Controllers\PublicController;
use Views\Renderer;
use Utilities\Site;
use Dao\Productos\Productos;
use Utilities\Validators;

class ProductosForm extends PrivateController
{
    private $viewData = [];
    private $modeDscArr = [
        "INS" => "Crear nuevo Producto",
        "UPD" => "Editando %s (%s)",
        "DSP" => "Detalle de %s (%s)",
        "DEL" => "Eliminando %s (%s)",
    ];
    private $mode = '';

    private $errors = [];


    private function addError($error, $context = 'global')
    {
        if (isset($this->errors[$context])) {
            $this->errors[$context][] = $error;
        } else {
            $this->errors[$context] = [$error];
        }
    }

    //Estructura del Producto
    private $producto = [
        "productId" => 0,
        "productName" => '',
        "productDescription" => '',
        "productPrice" => 0,
        "productImgUrl" => 'img/',
        "productStatus" => ''
    ];

    public function run(): void
    {
        $this->inicializarForm();
        if ($this->isPostBack()) {
            $this->cargarDatosDelFormulario();
            if ($this->validarDatos()) {
                $this->procesarAccion();
            }
        }
        $this->generarViewData();
        Renderer::render('productos/productos_form', $this->viewData);
    }

    private function inicializarForm()
    {
        if (isset($_GET["mode"]) && isset($this->modeDscArr[$_GET["mode"]])) {
            $this->mode = $_GET["mode"];
        } else {
            Site::redirectToWithMsg("index.php?page=Productos_ProductosList", "Algo Sucedio Mal. Intente de Nuevo");
            die();
        }
        if ($this->mode !== 'INS' && isset($_GET["productId"])) {
            $this->producto["productId"] = $_GET["productId"];
            $this->cargarDatosProducto();
        }
    }
    private function cargarDatosProducto()
    {
        $tmpProducto = Productos::obtenerProductoPorId($this->producto["productId"]);
        $this->producto = $tmpProducto;
    }
    private function cargarDatosDelFormulario()
    {
        $this->producto["productName"] = $_POST["productName"];
        $this->producto["productDescription"] = $_POST["productDescription"];
        $this->producto["productPrice"] = floatval($_POST["productPrice"]);
        $this->producto["productImgUrl"] = $_POST["productImgUrl"];
        $this->producto["productStatus"] = $_POST["productStatus"];
    }

    private function validarDatos()
    {
        if (Validators::IsEmpty($this->producto["productName"])) {
            $this->addError("El nombre del producto no puede venir vacio!", "productName");
        }
        if (Validators::IsEmpty($this->producto["productDescription"])) {
            $this->addError("La descripción no puede venir vacio!", "productDescription");
        }
        if ($this->producto["productPrice"] <= 0) {
            $this->addError("El precio no puede ser 0");
        }
        if (Validators::IsEmpty($this->producto["productImgUrl"])) {
            $this->addError("La URL de la imagen no puede venir vacio!", "productImgUrl");
        }
        if (Validators::IsEmpty($this->producto["productStatus"])) {
            $this->addError("El estado no puede venir vacio!", "productStatus");
        }
        return count($this->errors) === 0;
    }

    private function procesarAccion()
    {
        switch ($this->mode) {
            case 'INS':
                $result = Productos::agregarProducto($this->producto);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=Productos_ProductosList", "Producto registrado satisfactoriamente");
                }
                break;
            case 'UPD':
                $result = Productos::actualizarProducto($this->producto);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=Productos_ProductosList", "Producto actualizado satisfactoriamente");
                }
                break;
            case 'DEL':
                $result = Productos::eliminarProducto($this->producto['productId']);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=Productos_ProductosList", "Producto eliminado satisfactoriamente");
                }
                break;
        }
    }

    private function generarViewData()
    {
        $this->viewData["mode"] = $this->mode;

        $this->viewData["modes_dsc"] = sprintf(
            $this->modeDscArr[$this->mode],
            $this->producto["productName"],
            $this->producto["productId"]
        );
        $this->viewData["producto"] = $this->producto;
        $this->viewData["readonly"] =
            ($this->viewData["mode"] === 'DEL'
                || $this->viewData["mode"] === 'DSP'
            ) ? 'readonly' : '';
        foreach ($this->errors as $context => $errores) {
            $this->viewData[$context . '_error'] = $errores;
            $this->viewData[$context . '_haserror'] = count($errores) > 0;
        }
        $this->viewData["showConfirm"] = ($this->viewData["mode"] != 'DSP');
    }
}