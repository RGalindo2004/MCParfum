<?php

namespace Controllers\Usuarios;

use Controllers\PublicController;
use Controllers\PrivateController;
use Dao\Usuarios\Usuarios;
use Views\Renderer;

class UsuariosList extends PrivateController
{
    public function run(): void
    {
        $userStatusFilter = isset($_GET['status']) && !empty($_GET['status']) ? $_GET['status'] : 'EMP';

        // Llama al DAO para obtener los usuarios filtrados
        $usuariosDao = Usuarios::ObtenerUsuariosPorEstado($userStatusFilter);
        
        $viewUsuarios = [];

        $estadosPswArr = [
            "ACT" => "Activa",
            "DES" => "Desactiva"
        ];

        $estadosUserArr = [
            "ACT" => "Activo",
            "INA" => "Inactivo",
            "BLQ" => "Bloqueado",
            "SUS" => "Suspendido"
        ];

        $usuarioTipoArr = [
            "ADM" => "Administrador",
            "SUP" => "Supervisor",
            "CLI" => "Cliente"
        ];

        foreach ($usuariosDao as $usuario) {
            $usuario["estadosPsw"] = $estadosPswArr[$usuario["userpswdest"]];
            $usuario["estadosUser"] = $estadosUserArr[$usuario["userest"]];
            $usuario["usuarioTipo"] = $usuarioTipoArr[$usuario["usertipo"]];

            $viewUsuarios[] = $usuario;
        }

        $viewData = [
            "usuario" => $usuariosDao,
            "status_EMP" => $userStatusFilter === "EMP" ? "selected" : "",
            "status_ACT" => $userStatusFilter === "ACT" ? "selected" : "",
            "status_INA" => $userStatusFilter === "INA" ? "selected" : "",
            "INS_enable" => $this->isFeatureAutorized('usuarios_INS_enable'),
            "UPD_enable" => $this->isFeatureAutorized('usuarios_UPD_enable'),
            "DEL_enable" => $this->isFeatureAutorized('usuarios_DEL_enable'),
            "useremail_enable" => $this->isFeatureAutorized('useremail_enable'),
            "userpswd_enable" => $this->isFeatureAutorized('userpswd_enable'),
            "userfching_enable" => $this->isFeatureAutorized('userfching_enable'),
            "userpswdest_enable" => $this->isFeatureAutorized('userpswdest_enable'),
            "userpswdexp_enable" => $this->isFeatureAutorized('userpswdexp_enable'),
            "userest_enable" => $this->isFeatureAutorized('userest_enable'),
            "useractcod_enable" => $this->isFeatureAutorized('useractcod_enable'),
            "userpswdchg_enable" => $this->isFeatureAutorized('userpswdchg_enable'),
            "usertipo_enable" => $this->isFeatureAutorized('usertipo_enable')
        ];

        Renderer::render('usuarios/usuarios_list', $viewData);
    }
}
