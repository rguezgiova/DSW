<?php
namespace Tema05\Ejercicio01_Clase\Controlador;
use Tema05\Ejercicio01_Clase\Modelo\Producto;
use Tema05\Ejercicio01_Clase\Modelo\ModeloProducto;
require_once ("../Modelo/Producto.php");
require_once ("../Modelo/ModeloProducto.php");
if ($_POST) {
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $producto = new Producto($descripcion, $nombre, $precio, $imagen, $id);
    if (ModeloProducto::actualizarProducto($producto)) {
        echo "{ 'resultado': true }";
    } else {
        echo "{ 'resultado': false }";
    }
}