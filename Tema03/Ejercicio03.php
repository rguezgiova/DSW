<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ejercicio 03</title>
</head>
<body>
	<?php
    require_once("../config.php");
    require_once('../Utilidades/funcionesAuxiliares.php');
    $num = rand(10000, 99999);
    $numStr = strval($num);
    for ($i = 0; $i < strlen($numStr); $i++) {
        mostrarImgNum($numStr[$i]);
    }
	?>
</body>
</html>