<?php
namespace Tema05\Ejercicio03\Modelo;
use PDO, PDOException;
require_once("Producto.php");

    class ModeloProducto {
        public static function consulta(string $sql) {
            [$host, $usuario, $password, $bd] = ['localhost', 'gestisimal', 'gestisimal2021', 'gestisimal'];
            try {
                $conexion = new PDO("mysql:host=$host;dbname=$bd;charset=utf8", $usuario, $password);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $resultado = $conexion->query($sql);
            } catch (PDOException $exception) {
                exit($exception);
            }
            return $resultado;
        }

        public static function insertar(Producto $producto): bool {
            if ($producto->codigo != null) {
                $resultado = self::consulta("SELECT * FROM producto WHERE codigo='".$producto->codigo."'");
                if ($resultado->fetch(PDO::FETCH_ASSOC) != null) {
                    return false;
                }
            }
            [$codigo, $descripcion, $pcompra, $pventa, $stock] = [$producto->codigo, $producto->descripcion, $producto->pcompra, $producto->pventa, $producto->stock];
            self::consulta("INSERT INTO producto VALUES('$codigo', '$descripcion', $pcompra, $pventa, $stock);");
            return true;
        }

        public static function eliminar(string $codigo): bool {
            $resultado = self::consulta("DELETE FROM producto WHERE codigo='$codigo'");
            if ($resultado->rowCount() == 1) {
                return true;
            } else {
                return false;
            }
        }

        public static function modificar(Producto $producto): bool {
            $sql = "UPDATE producto SET ";
            $atributos = $producto->getAtributos();
            foreach ($atributos as $clave => $valor) {
                $sql .= "$clave='$valor',";
            }
            $sql = substr($sql, 0, strlen($sql) - 1);
            $sql .= "WHERE codigo='".$producto->codigo."'";
            $resultado = self::consulta($sql);
            if ($resultado->rowCount() == 1) {
                return true;
            } else {
                return false;
            }
        }

        public static function listar(int $numPag = 1, int $tamPag = 10): array {
            $comienzo = ($numPag - 1) * $tamPag;
            $resultado = ModeloProducto::consulta("SELECT * FROM producto LIMIT $comienzo, $tamPag");
            $listaProductos = [];
            while ($producto = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $listaProductos[] = Producto::getProducto($producto);
            }
            return $listaProductos;
        }

        public static function numProductos():int {
            $resultado = ModeloProducto::consulta("SELECT count(*) as numProductos FROM producto");
            $count = $resultado->fetch(PDO::FETCH_ASSOC);
            return intval($count['numProductos']);
        }
    }
