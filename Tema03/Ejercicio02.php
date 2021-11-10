<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ejercicio 02</title>
</head>
<body>
	<?php
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
	echo "<table>
            <tr>";
	foreach ($sorteo as $valor) {
	    echo "<td>$valor</td>";
	}
	echo   "</tr>
        </table>";
	?>
</body>
</html>