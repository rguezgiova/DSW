<?php
    namespace Tema05\Ejercicio03\Controlador;
    use Tema05\Ejercicio03\Modelo\ModeloProducto;
    use Tema05\Ejercicio03\Modelo\Producto;
    require_once("../Modelo/ModeloProducto.php");

    class ControladorProducto {
        public static function listar($numPag = 1, $tamPag = 10): array {
             return ModeloProducto::listar($numPag, $tamPag);
        }

        public static function insertar($datos): bool {
            return ModeloProducto::insertar($datos);
        }

        public static function eliminar($codigo) {
            return ModeloProducto::eliminar($codigo);
        }

        public static function modificar($datos) {
            return ModeloProducto::modificar($datos);
        }

        public static function numProductos() {
            return ModeloProducto::numProductos();
        }
    }

    if (isset($_POST['operacion']) && $_POST['operacion'] == 'insertar')  {
        $atributos = [
            "codigo" => $_POST['codigo'],
            "descripcion" => $_POST['descripcion'],
            "pcompra" => $_POST['pcompra'],
            "pventa" => $_POST['pventa'],
            "stock" => $_POST['stock'],
        ];
        $producto = Producto::getProducto($atributos);
        $resultado = ModeloProducto::insertar($producto);
        if ($resultado) {
            echo '{"response": true}';
        } else {
            echo '{"response": false}';
        }
    }
    if (isset($_POST['operacion']) && $_POST['operacion'] == 'eliminar')  {
       $codigo = $_POST['codigo'];
       $resultado = ModeloProducto::eliminar($codigo);
        if ($resultado) {
            echo '{"response": true}';
        } else {
            echo '{"response": false}';
        }
    }
    if (isset($_POST['operacion']) && $_POST['operacion'] == 'actualizar')  {
        $atributos = [
            "codigo" => $_POST['codigo'],
            "descripcion" => $_POST['descripcion'],
            "pcompra" => $_POST['pcompra'],
            "pventa" => $_POST['pventa'],
            "stock" => $_POST['stock'],
        ];
        $producto = Producto::getProducto($atributos);
        $resultado = ModeloProducto::modificar($producto);
        if ($resultado) {
            echo '{"response": true}';
        } else {
            echo '{"response": false}';
        }
    }
    if (isset($_POST['operacion']) && $_POST['operacion'] == 'entrada')  {
        $atributos = [
            "codigo" => $_POST['codigo'],
            "descripcion" => $_POST['descripcion'],
            "pcompra" => $_POST['pcompra'],
            "pventa" => $_POST['pventa'],
            "stock" => $_POST['stock'],
        ];
        $cantidad = $_POST['cantidad'];
        $atributos['stock'] = $atributos['stock'] + $cantidad;
        $producto = Producto::getProducto($atributos);
        $resultado = ModeloProducto::modificar($producto);
        if ($resultado) {
            echo '{"response": true}';
        } else {
            echo '{"response": false}';
        }
    }
    if (isset($_POST['operacion']) && $_POST['operacion'] == 'salida')  {
        $atributos = [
            "codigo" => $_POST['codigo'],
            "descripcion" => $_POST['descripcion'],
            "pcompra" => $_POST['pcompra'],
            "pventa" => $_POST['pventa'],
            "stock" => $_POST['stock'],
        ];
        $cantidad = $_POST['cantidad'];
        if ($atributos['stock'] < $cantidad) {
            echo '{"response": false}';
        } else {
            $atributos['stock'] = $atributos['stock'] - $cantidad;
            $producto = Producto::getProducto($atributos);
            $resultado = ModeloProducto::modificar($producto);
            if ($resultado) {
                echo '{"response": true}';
            } else {
                echo '{"response": false}';
            }
        }

    }