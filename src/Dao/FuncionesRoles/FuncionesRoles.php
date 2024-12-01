<?php

namespace Dao\FuncionesRoles;

use Dao\Table;

class FuncionesRoles extends Table
{
    public static function obtenerFuncionesRoles()
    {
        $sqlstr = 'SELECT * FROM funciones_roles';
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function obtenerFuncionRolPorID($rolescod, $fncod)
    {
        $sqlstr = 'SELECT * FROM funciones_roles WHERE rolescod = :rolescod AND fncod = :fncod;';
        return self::obtenerUnRegistro($sqlstr, ["rolescod" => $rolescod, "fncod" => $fncod]);
    }

    public static function agregarFuncionRol($funcionRol)
    {
        $sqlstr = 'INSERT INTO funciones_roles (
            rolescod,
            fncod,
            fnrolest,
            fnexp
        ) VALUES (
            :rolescod,
            :fncod,
            :fnrolest,
            :fnexp
        );';

        return self::executeNonQuery($sqlstr, $funcionRol);
    }

    public static function actualizarFuncionRol($funcionRol)
    {
        $sqlstr = 'UPDATE funciones_roles SET
            fnrolest = :fnrolest,
            fnexp = :fnexp
        WHERE rolescod = :rolescod AND fncod = :fncod;';

        return self::executeNonQuery($sqlstr, $funcionRol);
    }

    public static function eliminarFuncionRol($rolescod, $fncod)
    {
        $sqlstr = 'DELETE FROM funciones_roles WHERE rolescod = :rolescod AND fncod = :fncod;';
        return self::executeNonQuery($sqlstr, ["rolescod" => $rolescod, "fncod" => $fncod]);
    }
}