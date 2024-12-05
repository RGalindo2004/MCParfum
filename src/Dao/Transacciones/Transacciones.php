<?php

namespace Dao\Transacciones;

class Transacciones extends \Dao\Table
{
    public static function crearPago($usercod, $total, $metodoPago, $estado)
    {
        $sql = "INSERT INTO pagos (usercod, total, metodoPago, estado, fechaPago)
                VALUES (:usercod, :total, :metodoPago, :estado, NOW())";
        return self::executeNonQuery($sql, [
            "usercod" => $usercod,
            "total" => $total,
            "metodoPago" => $metodoPago,
            "estado" => $estado,
        ]);
    }

    public static function obtenerPagosPorUsuario($usercod)
    {
        $sql = "SELECT * FROM pagos WHERE usercod = :usercod ORDER BY fechaPago DESC";
        return self::obtenerRegistros($sql, ["usercod" => $usercod]);
    }

    public static function obtenerPagoPorId($pagoId)
    {
        $sql = "SELECT * FROM pagos WHERE pagoId = :pagoId";
        return self::obtenerUnRegistro($sql, ["pagoId" => $pagoId]);
    }

    public static function actualizarEstadoPago($pagoId, $estado)
    {
        $sql = "UPDATE pagos SET estado = :estado WHERE pagoId = :pagoId";
        return self::executeNonQuery($sql, ["pagoId" => $pagoId, "estado" => $estado]);
    }

    public static function eliminarPago($pagoId)
    {
        $sql = "DELETE FROM pagos WHERE pagoId = :pagoId";
        return self::executeNonQuery($sql, ["pagoId" => $pagoId]);
    }
}
?>