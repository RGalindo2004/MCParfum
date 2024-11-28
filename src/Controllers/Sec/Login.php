<?php

namespace Controllers\Sec;

class Login extends \Controllers\PublicController
{
    private $txtUserEmail = "";
    private $txtPswd = "";
    private $errorUserEmail = "";
    private $errorPswd = "";
    private $generalError = "";
    private $hasError = false;

    public function run(): void
    {
        if ($this->isPostBack()) {
            $this->txtUserEmail = $_POST["txtUserEmail"];
            $this->txtPswd = $_POST["txtPswd"];

            if (\Utilities\Validators::IsEmpty($this->txtUserEmail)) {
                $this->errorUserEmail = "¡Debe ingresar su usuario o correo electrónico!";
                $this->hasError = true;
            }
            if (\Utilities\Validators::IsEmpty($this->txtPswd)) {
                $this->errorPswd = "¡Debe ingresar una contraseña!";
                $this->hasError = true;
            }

            if (!$this->hasError) {
                $dbUser = null;
                if (\Utilities\Validators::IsValidEmail($this->txtUserEmail)) {
                    $dbUser = \Dao\Security\Security::getUsuarioByEmail($this->txtUserEmail);
                } else {
                    $dbUser = \Dao\Security\Security::getUsuarioByUsername($this->txtUserEmail);
                }

                if ($dbUser) {
                    if ($dbUser["userest"] != \Dao\Security\Estados::ACTIVO) {
                        $this->generalError = "¡Credenciales son incorrectas!";
                        $this->hasError = true;
                        error_log(sprintf(
                            "ERROR: %d %s tiene cuenta con estado %s",
                            $dbUser["usercod"],
                            $dbUser["useremail"],
                            $dbUser["userest"]
                        ));
                    }
                    if (!\Dao\Security\Security::verifyPassword($this->txtPswd, $dbUser["userpswd"])) {
                        $this->generalError = "¡Credenciales son incorrectas!";
                        $this->hasError = true;
                        error_log(sprintf(
                            "ERROR: %d %s contraseña incorrecta",
                            $dbUser["usercod"],
                            $dbUser["useremail"]
                        ));
                    }

                    if (!$this->hasError) {
                        \Utilities\Security::login(
                            $dbUser["usercod"],
                            $dbUser["username"],
                            $dbUser["useremail"]
                        );
                        if (\Utilities\Context::getContextByKey("redirto") !== "") {
                            \Utilities\Site::redirectTo(
                                \Utilities\Context::getContextByKey("redirto")
                            );
                        } else {
                            \Utilities\Site::redirectTo("index.php");
                        }
                    }
                } else {
                    error_log(sprintf(
                        "ERROR: %s intento de inicio de sesión fallido",
                        $this->txtUserEmail
                    ));
                    $this->generalError = "¡Credenciales son incorrectas!";
                }
            }
        }
        $dataView = get_object_vars($this);
        \Views\Renderer::render("security/login", $dataView);
    }
}