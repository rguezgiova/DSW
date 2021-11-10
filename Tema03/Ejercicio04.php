<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ejercicio 04</title>
</head>
<body>
	<?php
	require_once('../config.php');
	require_once('../Utilidades/funcionesAuxiliares.php');
    function primitiva() {
	    $resultado = [];
	    while (count($resultado) < 6) {
	        $num = rand(1, 49);
	        if (!in_array($num, $resultado)) {
	            array_push($resultado, $num);
	        }
	    }
	    sort($resultado);
	    return $resultado;
	}
	$sorteo = primitiva();
	foreach ($sorteo as $valor) {
		if ($valor < 10) {
			mostrarImgNum(strval($valor));
		} else {
			$valor = strval($valor);
			mostrarImgNum($valor[0]);
			mostrarImgNum($valor[1]);
		}
	}
	?>
</body>
</html>