<?php

namespace Dao\Productos;

use Dao\Table;

class Productos extends Table
{
    public static function obtenerProductos()
    {
        $sqlstr = 'SELECT * FROM products WHERE productStatus = "ACT";';
        $productos = self::obtenerRegistros($sqlstr, []);
        return $productos;
    }

    public static function obtenerProductoPorId($id)
    {
        $sqlstr = 'SELECT * from products where productId=:productId;';
        $producto = self::obtenerUnRegistro($sqlstr, ["productId" => $id]);
        return $producto;
    }

    public static function agregarProducto($producto)
    {
        unset($producto['productId']);
        $sqlstr = 'insert into products (
            productName, productDescription, productPrice, productImgUrl,
            productStatus ) values
        (
            :productName, :productDescription, :productPrice, :productImgUrl,
            :productStatus
        );';
        return self::executeNonQuery($sqlstr, $producto);
    }

    public static function actualizarProducto($producto)
    {
        $sqlstr = "update products set productName = :productName, productDescription = :productDescription, productPrice = :productPrice, productImgUrl = :productImgUrl, productStatus = :productStatus where productId = :productId;";

        return self::executeNonQuery($sqlstr, $producto);
    }

    public static function eliminarProducto($codigo)
    {
        $sqlstr = "update products set productStatus = 'INA' where productId = :productId;";
        return self::executeNonQuery($sqlstr, ["productId" => $codigo]);
    }
}
