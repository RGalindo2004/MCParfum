<?php

namespace Dao\Pagos;

use Dao\Table;

class Pagos extends Table
{
    public static function insertPago($paymentData)
    {
        $sql = "INSERT INTO pagos (usercod, total, metodoPago, estado, fechaPago) 
                VALUES (:usercod, :total, :metodoPago, :estado, NOW())";

        return self::executeNonQuery(
            $sql,
            $paymentData
        );
    }
}
