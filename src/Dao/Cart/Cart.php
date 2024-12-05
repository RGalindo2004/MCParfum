<?php

namespace Dao\Cart;

class Cart extends \Dao\Table
{
    public static function getProductosDisponibles()
    {
        $sqlAllProductosActivos = "SELECT * from products where productStatus in ('ACT');";
        $productosDisponibles = self::obtenerRegistros($sqlAllProductosActivos, array());

        //Sacar el stock de productos con carretilla autorizada
        $deltaAutorizada = \Utilities\Cart\CartFns::getAuthTimeDelta();
        $sqlCarretillaAutorizada = "select productId, sum(crrctd) as reserved
            from carretilla where TIME_TO_SEC(TIMEDIFF(now(), crrfching)) <= :delta
            group by productId;";
        $prodsCarretillaAutorizada = self::obtenerRegistros(
            $sqlCarretillaAutorizada,
            array("delta" => $deltaAutorizada)
        );
        //Sacar el stock de productos con carretilla no autorizada
        $deltaNAutorizada = \Utilities\Cart\CartFns::getUnAuthTimeDelta();
        $sqlCarretillaNAutorizada = "select productId, sum(crrctd) as reserved
            from carretillaanom where TIME_TO_SEC(TIMEDIFF(now(), crrfching)) <= :delta
            group by productId;";
        $prodsCarretillaNAutorizada = self::obtenerRegistros(
            $sqlCarretillaNAutorizada,
            array("delta" => $deltaNAutorizada)
        );
        $productosCurados = array();
        foreach ($productosDisponibles as $producto) {
            if (!isset($productosCurados[$producto["productId"]])) {
                $productosCurados[$producto["productId"]] = $producto;
            }
        }
        foreach ($prodsCarretillaAutorizada as $producto) {
            if (isset($productosCurados[$producto["productId"]])) {
                $productosCurados[$producto["productId"]]["productStock"] -= $producto["reserved"];
            }
        }
        foreach ($prodsCarretillaNAutorizada as $producto) {
            if (isset($productosCurados[$producto["productId"]])) {
                $productosCurados[$producto["productId"]]["productStock"] -= $producto["reserved"];
            }
        }
        $productosDisponibles = null;
        $prodsCarretillaAutorizada = null;
        $prodsCarretillaNAutorizada = null;
        return $productosCurados;
    }

    public static function getProductoDisponible($productId)
    {
        $sqlAllProductosActivos = "SELECT * from products where productStatus in ('ACT') and productId=:productId;";
        $productosDisponibles = self::obtenerRegistros($sqlAllProductosActivos, array("productId" => $productId));

        //Sacar el stock de productos con carretilla autorizada
        $deltaAutorizada = \Utilities\Cart\CartFns::getAuthTimeDelta();
        $sqlCarretillaAutorizada = "select productId, sum(crrctd) as reserved
            from carretilla where productId=:productId and TIME_TO_SEC(TIMEDIFF(now(), crrfching)) <= :delta
            group by productId;";
        $prodsCarretillaAutorizada = self::obtenerRegistros(
            $sqlCarretillaAutorizada,
            array("productId" => $productId, "delta" => $deltaAutorizada)
        );
        //Sacar el stock de productos con carretilla no autorizada
        $deltaNAutorizada = \Utilities\Cart\CartFns::getUnAuthTimeDelta();
        $sqlCarretillaNAutorizada = "select productId, sum(crrctd) as reserved
            from carretillaanom where productId = :productId and TIME_TO_SEC(TIMEDIFF(now(), crrfching)) <= :delta
            group by productId;";
        $prodsCarretillaNAutorizada = self::obtenerRegistros(
            $sqlCarretillaNAutorizada,
            array("productId" => $productId, "delta" => $deltaNAutorizada)
        );
        $productosCurados = array();
        foreach ($productosDisponibles as $producto) {
            if (!isset($productosCurados[$producto["productId"]])) {
                $productosCurados[$producto["productId"]] = $producto;
            }
        }
        foreach ($prodsCarretillaAutorizada as $producto) {
            if (isset($productosCurados[$producto["productId"]])) {
                $productosCurados[$producto["productId"]]["productStock"] -= $producto["reserved"];
            }
        }
        foreach ($prodsCarretillaNAutorizada as $producto) {
            if (isset($productosCurados[$producto["productId"]])) {
                $productosCurados[$producto["productId"]]["productStock"] -= $producto["reserved"];
            }
        }
        $productosDisponibles = null;
        $prodsCarretillaAutorizada = null;
        $prodsCarretillaNAutorizada = null;
        return $productosCurados;
    }

    public static function getProducto($productId)
    {
        $sqlAllProductosActivos = "SELECT * from products where productId=:productId;";
        $productosDisponibles = self::obtenerRegistros($sqlAllProductosActivos, array("productId" => $productId));
        return $productosDisponibles;
    }

    /*Parte que va la carretilla*/

    public static function AddProductoCartUser($usercod, $productId, $productName, $crrctd, $productPrice)
    {
        $sql = "INSERT INTO carretilla (usercod, productId, productName, crrctd, crrprc, crrfching) 
            VALUES (:usercod, :productId, :productName, :crrctd, :productPrice, NOW()) 
            ON DUPLICATE KEY UPDATE 
            crrctd = crrctd + :crrctd, 
            crrprc = :productPrice, 
            crrfching = NOW()";

        $result = self::executeNonQuery(
            $sql,
            array(
                "usercod" => $usercod,
                "productId" => $productId,
                "productName" => $productName,
                "crrctd" => $crrctd,
                "productPrice" => $productPrice
            )
        );

        return $result;
    }

    public static function getProductosCarretillaUser($usercod)
    {
        $sql = "SELECT * FROM carretilla WHERE usercod = :usercod";
        return self::obtenerRegistros($sql, array("usercod" => $usercod));
    }

    public static function removeProductoCartUser($usercod, $productId)
    {
        $sql = "DELETE FROM carretilla WHERE usercod = :usercod AND productId = :productId";
        return self::executeNonQuery($sql, array("usercod" => $usercod, "productId" => $productId));
    }

    public static function updateProductoCantidad($usercod, $productId, $newCantidad)
    {
        $sql = "UPDATE carretilla SET crrctd = :newCantidad WHERE usercod = :usercod AND productId = :productId";
        return self::executeNonQuery($sql, array("usercod" => $usercod, "productId" => $productId, "newCantidad" => $newCantidad));
    }

    public static function removeProductosCarretillaUser($usercod)
    {
        $sql = "DELETE FROM carretilla WHERE usercod = :usercod";
        return self::executeNonQuery($sql, array("usercod" => $usercod));
    }
}
?>