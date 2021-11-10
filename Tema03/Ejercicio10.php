<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ejercicio 10</title>
</head>
<body>
	<?php
    require_once('../config.php');
    require_once(PROJECT_PATH.'/Utilidades/funcionesAuxiliares.php');
    $repeticiones = 10;
    $i = 0;
    $listaIps = [];
    do {
        $ip = json_decode(file_get_contents("https://api.ipify.org?format=json")) -> ip;
        if (!in_array($ip, $listaIps)) {
            array_push($listaIps, $ip);
        }
    } while (++$i < $repeticiones);
        tablaToHtml($listaIps);
    ?>
</body>
</html>