<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php 
    $file = "./ficheros/empleados.json";
    $datosEmpleados = [];
    
    function comprobarDni($dni) {
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $letra = substr($dni, -1);
        $numeros = intval(substr($dni, 0, -1));
        
        if (substr($letras, $numeros%23, 1) == $letra) {
            return true;
        } else {
            return false;
        }
    }
    
    if (file_exists($file)) {
        $fichero = fopen($file, "r");
        
        echo "<table>";
        
        ?>
        <table>
            <thead>
                <th>Nombre</th>
                <th>Apellido 1</th>
                <th>Apellido 2</th>
                <th>Edad</th>
                <th>Telefono</th>
                <th>Ciudad</th>
                <th>Dni</th>
                <th>Válido</th>
            </thead>
            <tbody>
        <?php
        while ($linea = fgets($fichero)) {
            $datos = json_decode($linea, true);
            array_push($datosEmpleados, $datos);
            
            echo "<tr>";
            echo "<td>".$datos["nombre"]."</td>";
            echo "<td>".$datos["ap1"]."</td>";
            echo "<td>".$datos["ap2"]."</td>";
            echo "<td>".$datos["edad"]."</td>";
            echo "<td>".$datos["telef"]."</td>";
            echo "<td>".$datos["ciudad"]."</td>";
            echo "<td>".$datos["dni"]."</td>";
            if (comprobarDni($datos["dni"])) {
                echo "<td>Si</td>";
            } else {
                echo "<td>No</td>";   
            }
            echo "</tr>";
        }
        
        echo "</tbody></table>";
        fclose($fichero);
    }
    
    ?>
</body>
</html>