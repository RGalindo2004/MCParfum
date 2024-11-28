<?php

namespace Controllers\Sec;

use Controllers\PublicController;
use \Utilities\Validators;
use Exception;

class Register extends PublicController
{
    private $txtEmail = "";
    private $txtPswd = "";
    private $txtUser = "";
    private $errorEmail = "";
    private $errorPswd = "";
    private $errorUser = "";
    private $hasErrors = false;

    public function run() :void
    {

        if ($this->isPostBack()) {
            $this->txtEmail = $_POST["txtEmail"];
            $this->txtPswd = $_POST["txtPswd"];
            $this->txtUser = $_POST["txtUser"];

            // Validaciones
            if (!Validators::IsValidUsername($this->txtUser)) {
                $this->errorUser = "El usuario debe tener entre 4 y 20 caracteres (Puede incluir guiones bajos)";
                $this->hasErrors = true;
            }
            if (!(Validators::IsValidEmail($this->txtEmail))) {
                $this->errorEmail = "El correo no tiene el formato adecuado";
                $this->hasErrors = true;
            }
            if (!Validators::IsValidPassword($this->txtPswd)) {
                $this->errorPswd = "La contraseña debe tener al menos 8 caracteres, una mayúscula, un número y un carácter especial.";
                $this->hasErrors = true;
            }
            if (Validators::IsEmpty($this->txtUser)) {
                $this->errorUser = "El nombre de usuario no puede estar vacío.";
                $this->hasErrors = true;
            }

            if (!$this->hasErrors) {
                try {
                    if (\Dao\Security\Security::newUsuario($this->txtEmail, $this->txtPswd, $this->txtUser)) {
                        \Utilities\Site::redirectToWithMsg("index.php?page=sec_login", "¡Usuario Registrado Satisfactoriamente!");
                    }
                } catch (Exception $ex) {
                    die($ex);
                }
            }
        }
        $viewData = get_object_vars($this);
        \Views\Renderer::render("security/sigin", $viewData);
    }
}
?>

