<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 01-Clase</title>
</head>
<body>
    <?php
        function lineaProducto($producto) {
            static $primeraLinea = true;
            if ($primeraLinea) {
                echo "<tr>";
                foreach ($producto as $clave => $valor) {
                    $nombreCampo = ucfirst($clave);
                    echo "<th><a style='display: block' href='?orden=$clave'>$nombreCampo</a>";
                }
                echo "</tr>";
                $primeraLinea = false;
            }
            echo "<tr>";
            foreach ($producto as $clave => $valor) {
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
        [$host, $user, $pass, $bd] = ["localhost", "productos", "productos2021", "productos"];
        $conexion = new MySQLi($host, $user, $pass, $bd);
        if (!$conexion) {
            echo "Error estableciendo la conexión";
            exit(1);
        }
        $sql = "SELECT * FROM producto";
        if (isset($_GET['orden'])) {
            $sql .= "ORDEN BY".$_GET['orden'];
        }
        $resultado = $conexion->query($sql);
        if (!$resultado) {
            echo "Error ejecutando consulta";
        }
        echo "<table border='1px'>";
        while ($producto = $resultado->fetch_assoc()) {
            lineaProducto($producto);
        }
        echo "</table>";
        $conexion->close();
    ?>
</body>
</html>