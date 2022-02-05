<?php
    namespace Tema05\Ejercicio01_Clase\Vista;
    use Tema05\Ejercicio01_Clase\Modelo\ModeloProducto;
    use Tema05\Ejercicio01_Clase\Modelo\Producto;
    //Esto va en el controlador
    require_once("../Modelo/ModeloProducto.php");
    //
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Catálogo de Productos</title>
    <script src="funciones.js"></script>
</head>
<body>
    <?php
    function tabula($str, $inc = +1, $ad = 0) {
        static $nivel = 0;
        $nivel += $inc;
        ($nivel < 0 ? $nivel = 0 : null);
        $tabs = "";
        for($i = 1; $i <= $nivel; $i++) {
            $tabs .= "\t";
        }
        $nivel += $ad;
        echo "${tabs}${str}\n";
    }
    //Esto va en el controlador
    $listaProductos = ModeloProducto::listarProductos();
    $fieldInfo = ModeloProducto::getLongitudCampos();
    //
    tabula("<table>");
    foreach ($listaProductos as $producto) {
        $id = $producto->id;
        tabula("<tr id='fila_${id}'>");
        foreach ($producto->getAtributos() as $clave=>$campo) {
            $align = $fieldInfo[$clave][3];
            $size = $fieldInfo[$clave][2];
            $maxLength = $fieldInfo[$clave][1];
            $type = $fieldInfo[$clave][0];
            tabula("<td");
            tabula("<input style='text-align: $align' type='$type' maxlength='$maxLength' size='$size' name='$clave' readonly='readonly'  value='$campo'/>");
            tabula("</td>", -1, -1);
        }
        tabula("<button name='eliminar' type='submit'>Eliminar</button>", 0, -1);
        tabula("<button name='modificar' id='modificar_$id' onclick='ponerModificableFila(this.$id);' type='button'>Modificar</button>");
        tabula("</tr>", -1);
    }
    tabula("</table>", -1);
    ?>
</body>
</html>