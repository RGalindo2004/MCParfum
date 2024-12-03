<?php

namespace Dao\RolesUsuarios;

use Dao\Table;

class RolesUsuarios extends Table
{
    public static function obtenerRolesUsuarios()
    {
        $sqlstr = 'SELECT * FROM roles_usuarios';
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function obtenerRolUsuarioPorID($usercod, $rolescod)
    {
        $sqlstr = 'SELECT * FROM roles_usuarios WHERE usercod = :usercod AND rolescod = :rolescod;';
        return self::obtenerUnRegistro($sqlstr, ["usercod" => $usercod, "rolescod" => $rolescod]);
    }

    public static function agregarRolUsuario($rolUsuario)
    {
        $sqlstr = 'INSERT INTO roles_usuarios (
            usercod,
            rolescod,
            roleuserest,
            roleuserexp,
            roleuserfch
        ) VALUES (
            :usercod,
            :rolescod,
            :roleuserest,
            :roleuserexp,
            :roleuserfch
        );';

        return self::executeNonQuery($sqlstr, $rolUsuario);
    }

    public static function actualizarRolUsuario($rolUsuario)
    {
        $sqlstr = 'UPDATE roles_usuarios SET
            rolescod = :rolescod,
            roleuserest = :roleuserest,
            roleuserfch = :roleuserfch,
            roleuserexp = :roleuserexp
        WHERE usercod = :usercod AND rolescod = :rolescod;';

        return self::executeNonQuery($sqlstr, $rolUsuario);
    }

    public static function eliminarRolUsuario($usercod, $rolescod)
    {
        $sqlstr = 'DELETE FROM roles_usuarios WHERE usercod = :usercod AND rolescod = :rolescod;';
        return self::executeNonQuery($sqlstr, ["usercod" => $usercod, "rolescod" => $rolescod]);
    }
}
