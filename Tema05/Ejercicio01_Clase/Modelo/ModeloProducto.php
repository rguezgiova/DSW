<?php
namespace Tema05\Ejercicio01_Clase\Modelo;
use Tema05\Ejercicio01_Clase\Modelo\Producto;
use mysqli;
require_once("Producto.php");
    class ModeloProducto {
        private static mysqli $conexion;

        public static function consulta(string $sql) {
            self::$conexion = new MySQLi("localhost", "productos", "productos2021", "productos");
            if (self::$conexion->connect_errno != 0) {
                echo "Error estableciendo conexión";
                exit(1);
            }
            $resultado = self::$conexion->query($sql);
            if ($resultado == null) {
                echo "Error en la consulta: $sql";
                exit(2);
            }
            return $resultado;
        }

        public static function numProductos():int {
            $resultado = ModeloProducto::consulta("SELECT count(*) as numProductos FROM producto");
            $count = $resultado->fetch_assoc();
            return intval($count['numProds']);
        }

        public static function listarProductos(int $numPag = 1, int $tamPag = 10):array {
            $comienzo = ($numPag - 1) * $tamPag;
            $resultado = ModeloProducto::consulta("SELECT * FROM producto LIMIT $comienzo, $tamPag");
            $listaProductos = [];
            while ($producto = $resultado->fetch_assoc()) {
                $listaProductos[] = Producto::getProducto($producto);
            }
            return $listaProductos;
        }

        public static function mensajeError($mensaje) {
            echo "<br><span style='color: red; font-size: 200%'>$mensaje</span><br>";
        }

        public static function insertarProducto(Producto $producto):bool {
            if ($producto->id != null) {
                $resultado = ModeloProducto::consulta("SELECT * FROM producto WHERE id=".$producto->id);
                if ($resultado->fetch_assoc() != null) {
                    return false;
                }
            }
            $id = $producto->id; $descripcion = $producto->descripcion; $nombre = $producto->nombre; $precio = $producto->precio; $imagen = $producto->imagen;
            self::consulta("INSERT INTO producto VALUES ($id,'$descripcion', '$nombre', $precio, '$imagen')");
            return true;
        }

        public static function borrarProducto(int $id):bool {
            self::consulta("DELETE FROM producto WHERE id='$id'");
            return self::$conexion->affected_rows;
        }

        public static function actualizarProducto(Producto $producto):bool {
            $sql = "UPDATE producto SET ";
            $atributos = $producto->getAtributos();
            foreach ($atributos as $clave => $valor) {
                $sql += "$clave='$valor',";
            }
            $sql = substr($sql, 0, strlen($sql) - 1);
            $sql .= "WHERE id=".$producto->id;
            self::consulta($sql);
            return self::$conexion->affected_rows;
        }

        public static function getLongitudCampos(): array {
            return ['id' => ['text', 6, 6, 'right'], 'descripcion' => ['text', 200, 60, 'left'], 'nombre' => ['text', 40, 40, 'left'], 'precio' => ['number', 8, 8, 'right'], 'imagen' => ['text', 40, 40, 'left']];
        }
    }