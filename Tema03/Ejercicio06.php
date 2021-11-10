<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ejercicio 06</title>
</head>
<body>
	<?php
    require_once('../config.php');
    require_once('../Utilidades/funcionesAuxiliares.php');
    function contadorVisitas() {
        $archivo = DATA_PATH."/contadorVisitas.txt";
        $abrir = fopen($archivo, "r");
        if ($abrir) {
            $contador = fread($abrir, filesize($archivo));
            $contador = $contador + 1;
            fclose($abrir);
        }
        $abrir = fopen($archivo, "w+");
        if ($abrir) {
            fwrite($abrir, $contador);
            fclose($abrir);
        }
        return $contador;
    }
    mostrarImgNum(contadorVisitas());
	?>
</body>
</html>