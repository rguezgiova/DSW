<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02</title>
</head>
<body>
<?php
    require_once("../Utilidades/funcionesAuxiliares.php");
    $contador = lecturaContador();
    if ($_COOKIE && isset($_COOKIE['timeStampUltimaVisita'])) {
        $timeStamp = $_COOKIE['timeStampUltimaVisita'];
        $time = date('H:i:s', $timeStamp);
        $date = date('d-m-Y', $timeStamp);
        $visitasAnteriores = $contador-intval($_COOKIE['numVisita']) - 1;
        echo "La ultima vez que me visitaste fue el dia $date, a la hora $time";
        echo "Han trascurrido $visitasAnteriores desde su ultima visita";
    } else {
        echo "Es la primera vez que me visitas";
    }
    setcookie("timeStampUltimaVisita", getdate()[0], time() + 365 * 24 * 60 * 60);
    setcookie("numVisita", $contador, time() + 365 * 24 * 60 * 60);
?>
</body>
</html>