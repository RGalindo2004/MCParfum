<?php

namespace Dao\CarritoCompras;

use Dao\Table;

class CarritoCompras extends Table
{
    public static function obtenerCarritoCompras()
    {
        $sqlstr = 'SELECT * FROM carretillaanon';
        $carrito = self::obtenerRegistros($sqlstr, []);
        return $carrito;
    }

    public static function obtenerCarritoPorID($id)
    {
        $sqlstr = 'SELECT * FROM carretillaanon WHERE codcarretilla = :codcarretilla;';
        $carrito = self::obtenerUnRegistro($sqlstr, ["codcarretilla" => $id]);
        return $carrito;
    }

    public static function eliminarItemCarrito($id)
    {
        $sqlstr = 'DELETE FROM carretillaanon WHERE codcarretilla = :codcarretilla;';
        return self::executeNonQuery($sqlstr, ["codcarretilla" => $id]);
    }
}
