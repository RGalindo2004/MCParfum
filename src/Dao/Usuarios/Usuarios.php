<?php

namespace Dao\Usuarios;

use Dao\Table;

class Usuarios extends Table
{

  public static function ObtenerUsuariosPorEstado($userStatus = null)
  {
    $sqlstr = "SELECT * FROM usuario";
    $params = [];

    if (!is_null($userStatus) && $userStatus !== 'EMP') {
      $sqlstr .= " WHERE userest = :userest";
      $params['userest'] = $userStatus;
    }
    return self::obtenerRegistros($sqlstr, $params);
  }

  public static function ObtenerUsuarios()
  {
    $sqlstr = 'SELECT * FROM usuario';
    $usuarios = self::obtenerRegistros($sqlstr, []);
    return $usuarios;
  }

  public static function ObtenerUsuariosPorID($id)
  {
    $sqlstr = 'SELECT * FROM usuario WHERE usercod=:usercod;';
    $usuario = self::obtenerUnRegistro($sqlstr, ["usercod" => $id]);
    return $usuario;
  }

  public static function agregarUsuario($usuario)
  {
    $hashedPassword = self::_hashPassword($usuario['userpswd']);
    $usuario['userpswd'] = $hashedPassword;

    unset($usuario['usercod']);
    unset($usuario['userfching']);
    unset($usuario['userpswdchg']);

    $usuario['userpswdexp'] = date('Y-m-d', time() + 7776000);  //(3*30*24*60*60)
    $usuario['useractcod'] = hash("sha256", $usuario['useremail'] . time());

    $sqlstr =
      'INSERT INTO usuario ( 
            useremail, 
            username, 
            userpswd, 
            userfching, 
            userpswdest, 
            userpswdexp, 
            userest, 
            useractcod, 
            userpswdchg, 
            usertipo
        )
        VALUES
        (
            :useremail, 
            :username, 
            :userpswd, 
            now(), 
            :userpswdest, 
            :userpswdexp, 
            :userest, 
            :useractcod, 
            now(), 
            :usertipo
        );';

    return self::executeNonQuery($sqlstr, $usuario);
  }

  static private function _saltPassword($password)
  {
    return hash_hmac(
      "sha256",
      $password,
      \Utilities\Context::getContextByKey("PWD_HASH")
    );
  }

  static private function _hashPassword($password)
  {
    return password_hash(self::_saltPassword($password), PASSWORD_ALGORITHM);
  }

  public static function actualizarUsuario($usuario)
  {
    $hashedPassword = self::_hashPassword($usuario['userpswd']);
    $usuario['userpswd'] = $hashedPassword;


    unset($usuario['userfching']);
    unset($usuario['userpswdchg']);

    if (!isset($usuario['userpswdexp'])) {
      $usuario['userpswdexp'] = date('Y-m-d', time() + 7776000);  //(3*30*24*60*60)
    }

    if (!isset($usuario['useractcod'])) {
      $usuario['useractcod'] = hash("sha256", $usuario['useremail'] . time());
    }

    $sqlstr = "UPDATE usuario SET
      useremail = :useremail,  
      username = :username,  
      userpswd = :userpswd, 
      userfching = now(), 
      userpswdest = :userpswdest, 
      userpswdexp = :userpswdexp, 
      userest = :userest, 
      useractcod = :useractcod, 
      userpswdchg = now(), 
      usertipo = :usertipo
      WHERE usercod = :usercod;";

    return self::executeNonQuery($sqlstr, $usuario);
  }


  public static function eliminarUsuario($usercod)
  {
    $sqlstr = "UPDATE usuario SET userest = 'INA', userpswdest = 'INA' WHERE usercod = :usercod;";
    return self::executeNonQuery($sqlstr, ["usercod" => $usercod]);
  }
}
