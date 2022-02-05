<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio01</title>
</head>
<body>
    <?php
    $host= "localhost"; $usuario = "productos"; $password = "productos2021"; $bd = "productos";
    $conexion = new MySQLi($host, $usuario, $password, $bd);
    echo "<table border=1px>";
    echo "<thead>";
    echo "<tr>
            <td>ID</td>
            <td>Descripción</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Imagen</td>
        </tr>";
    echo "</thead>";
    echo "<tbody>";
    if ($conexion->errno == null) {
        echo "<tr>";
        $resultado = $conexion->query('SELECT * FROM producto');
        if ($resultado) {
            while ($producto = $resultado->fetch_assoc()) {
                echo "<tr>";
                foreach ($producto as $campo => $valor) {
                    echo "<td>$valor</td>";
                }
                echo "</tr>";
            }
        }
        echo "</tbody>
             </table>";
    }
    $conexion->close();
    ?>
</body>
</html>
