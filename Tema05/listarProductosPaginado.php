<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos paginados</title>
</head>
<body>
    <?php
    function consulta($sql) {
        $conexion = new MySQLi("localhost", "productos", "productos2021", "productos");
        if ($conexion->connect_errno != 0) {
            echo "Error estableciendo conexión";
            exit(1);
        }
        $resultado = $conexion->query($sql);
        if ($resultado == null) {
            echo "Error en la consulta: $sql";
            exit(2);
        }
        return $resultado;
    }

    function numProductos() {
        $sql = "SELECT count(*) as numProductos FROM producto";
        $resultado = consulta($sql);
        $count = $resultado->fetch_assoc();
        return intval($count['numProds']);
    }

    function listaProductos($numPag = 1, $tamPag = 10) {
        $comienzo = ($numPag - 1) * $tamPag;
        $sql = "SELECT * FROM producto LIMIT $comienzo, $tamPag";
        $resultado = consulta($sql);
        $listaProds = [];
        while ($producto = $resultado->fetch_assoc()) {
            $listaProds[] = $producto;
        }
        return $listaProds;
    }

    if (isset($_GET['tamPag'])) {
        $tamPag = intval($_GET['tamPag']);
    } else {
        $tamPag = 10;
    }
    $numTotalPags = ceil(numProductos() / $tamPag);
    if (isset($_GET['pag'])) {
        $numPag = intval($_GET['pag']);
        if ($numPag < 0 || $numPag > $numTotalPags) {
            die("Esta página no es válida");
        }
    } else {
        $numPag = 1;
    }
    $productos = listaProductos($numPag);
    echo "<table border='1px'>\n";
    foreach ($productos as $producto) {
        echo "<tr>";
        foreach ($producto as $campo) {
            echo "<td>$campo</td>";
        }
        echo "</tr>";
    }
    echo "</table>\n";
    if ($numPag > 1) {
        echo "<a href='?pag=",$numPag - 1,"'><<</a>";
    }
    if ($numPag < $numTotalPags) {
        echo "<a href='?pag=",$numPag + 1,"'>>></a>";
    }
    ?>
</body>
</html>