<?php

namespace Controllers\FuncionesRoles;

use Controllers\PrivateController;
use Controllers\PublicController;
use Views\Renderer;
use Dao\FuncionesRoles\FuncionesRoles;
use Utilities\Validators;
use Utilities\Site;

class FuncionesRolesForm extends PrivateController
{
    private $viewData = [];
    private $modeDscArr = [
        "INS" => "Asignar nueva función a un rol",
        "UPD" => "Editando función del rol %s y función %s",
        "DEL" => "Eliminando función del rol %s y función %s",
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

    private $funcionRol = [
        "rolescod" => '',
        "fncod" => '',
        "fnrolest" => 'ACT',
        "fnexp" => '',
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
        Renderer::render('funcionesroles/funcionesroles_form', $this->viewData);
    }

    private function inicializarForm()
    {
        $this->mode = $_GET["mode"] ?? 'INS';

        if ($this->mode !== 'INS') {
            $this->funcionRol["rolescod"] = $_GET["rolescod"];
            $this->funcionRol["fncod"] = $_GET["fncod"];
            $this->cargarDatosFuncionRol();
        }
    }

    private function cargarDatosFuncionRol()
    {
        $funcionRol = FuncionesRoles::obtenerFuncionRolPorID(
            $this->funcionRol["rolescod"],
            $this->funcionRol["fncod"]
        );

        $this->funcionRol = $funcionRol;
    }

    private function cargarDatosDelFormulario()
    {
        $this->funcionRol["rolescod"] = $_POST["rolescod"];
        $this->funcionRol["fncod"] = $_POST["fncod"];
        $this->funcionRol["fnrolest"] = $_POST["fnrolest"];
        $this->funcionRol["fnexp"] = $_POST["fnexp"];
    }

    private function validarDatos()
    {
        if (Validators::IsEmpty($this->funcionRol["rolescod"])) {
            $this->addError("El código del rol no puede ir vacío", "rolescod");
        }

        if (Validators::IsEmpty($this->funcionRol["fncod"])) {
            $this->addError("El código de la función no puede ir vacío", "fncod");
        }

        return count($this->errors) === 0;
    }

    private function procesarAccion()
    {
        switch ($this->mode) {
            case 'INS':
                $result = FuncionesRoles::agregarFuncionRol($this->funcionRol);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=FuncionesRoles-FuncionesRolesList", "Asignación realizada satisfactoriamente");
                }
                break;

            case 'UPD':
                $result = FuncionesRoles::actualizarFuncionRol($this->funcionRol);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=FuncionesRoles-FuncionesRolesList", "Asignación actualizada satisfactoriamente");
                }
                break;

            case 'DEL':
                $result = FuncionesRoles::eliminarFuncionRol($this->funcionRol["rolescod"], $this->funcionRol["fncod"]);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=FuncionesRoles-FuncionesRolesList", "Asignación eliminada satisfactoriamente");
                }
                break;
        }
    }

    private function generarViewData()
    {
        $this->viewData["mode"] = $this->mode;
        $this->viewData["modes_dsc"] = sprintf(
            $this->modeDscArr[$this->mode],
            $this->funcionRol["rolescod"],
            $this->funcionRol["fncod"]
        );

        $this->viewData["funcionRol"] = $this->funcionRol;
        foreach ($this->errors as $context => $errores) {
            $this->viewData[$context . '_error'] = $errores;
        }
    }
}