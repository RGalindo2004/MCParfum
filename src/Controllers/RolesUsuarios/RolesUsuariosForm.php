<?php

namespace Controllers\RolesUsuarios;

use Controllers\PrivateController;
use Views\Renderer;
use Dao\RolesUsuarios\RolesUsuarios;
use Utilities\Validators;
use Utilities\Site;

class RolesUsuariosForm extends PrivateController
{
    private $viewData = [];
    private $modeDscArr = [
        "INS" => "Asignar nuevo rol a un usuario",
        "UPD" => "Editando rol del usuario %s y rol %s",
        "DEL" => "Eliminando rol del usuario %s y rol %s",
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

    private $rolUsuario = [
        "usercod" => '',
        "rolescod" => '',
        "roleuserest" => 'ACT',
        "roleuserexp" => '',
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
        Renderer::render('rolesusuarios/rolesusuarios_form', $this->viewData);
    }

    private function inicializarForm()
    {
        $this->mode = $_GET["mode"] ?? 'INS';

        if ($this->mode !== 'INS') {
            $this->rolUsuario["usercod"] = $_GET["usercod"];
            $this->rolUsuario["rolescod"] = $_GET["rolescod"];
            $this->cargarDatosRolUsuario();
        }
    }

    private function cargarDatosRolUsuario()
    {
        $rolUsuario = RolesUsuarios::obtenerRolUsuarioPorID(
            $this->rolUsuario["usercod"],
            $this->rolUsuario["rolescod"]
        );

        $this->rolUsuario = $rolUsuario;
    }

    private function cargarDatosDelFormulario()
    {
        $this->rolUsuario["usercod"] = $_POST["usercod"];
        $this->rolUsuario["rolescod"] = $_POST["rolescod"];
        $this->rolUsuario["roleuserest"] = $_POST["roleuserest"];
        $this->rolUsuario["roleuserexp"] = $_POST["roleuserexp"];
    }

    private function validarDatos()
    {
        if (Validators::IsEmpty($this->rolUsuario["usercod"])) {
            $this->addError("El código del usuario no puede ir vacío", "usercod");
        }

        if (Validators::IsEmpty($this->rolUsuario["rolescod"])) {
            $this->addError("El código del rol no puede ir vacío", "rolescod");
        }

        return count($this->errors) === 0;
    }

    private function procesarAccion()
    {
        switch ($this->mode) {
            case 'INS':
                $result = RolesUsuarios::agregarRolUsuario($this->rolUsuario);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=RolesUsuarios-RolesUsuariosList", "Asignación realizada satisfactoriamente");
                }
                break;

            case 'UPD':
                $result = RolesUsuarios::actualizarRolUsuario($this->rolUsuario);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=RolesUsuarios-RolesUsuariosList", "Asignación actualizada satisfactoriamente");
                }
                break;

            case 'DEL':
                $result = RolesUsuarios::eliminarRolUsuario($this->rolUsuario["usercod"], $this->rolUsuario["rolescod"]);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=RolesUsuarios-RolesUsuariosList", "Asignación eliminada satisfactoriamente");
                }
                break;
        }
    }

    private function generarViewData()
    {
        $this->viewData["mode"] = $this->mode;
        $this->viewData["modes_dsc"] = sprintf(
            $this->modeDscArr[$this->mode],
            $this->rolUsuario["usercod"],
            $this->rolUsuario["rolescod"]
        );

        $this->viewData["readonly_rolescod"] = ($this->mode !== 'INS') ? 'readonly' : '';
        $this->viewData["readonly"] = ($this->mode === 'DEL' || $this->mode === 'DSP') ? 'readonly' : '';

        $this->viewData["rolUsuario"] = $this->rolUsuario;
        foreach ($this->errors as $context => $errores) {
            $this->viewData[$context . '_error'] = $errores;
        }
    }
}