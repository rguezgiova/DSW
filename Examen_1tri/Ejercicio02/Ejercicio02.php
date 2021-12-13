<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 02</title>
</head>
<body>
    <?php
    $datos = [];
    function consulta() {
            $handle = fopen("notasAlumnos.txt", "r");
            if ($handle) {
                while ($linea = fgets($handle)) {
                    $lineaSeparada = explode(",", $linea);
                    $numero = $lineaSeparada[1];
                    $numeroParse = strval($numero);
                }
            }
            asort($numeroParse);
            fclose($handle);
    }
    consulta();
    ?>
</body>
</html>