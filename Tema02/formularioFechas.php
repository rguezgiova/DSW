<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
	<?php 
	   $meses = ['Enero'=> 1, 'Febrero'=> 2, 'Marzo'=> 3, 'Abril'=> 4, 'Mayo'=> 5, 'Junio'=> 6, 'Julio'=> 7, 'Agosto'=> 8, 'Septiembre'=> 9, 'Octubre'=> 10, 'Noviembre'=> 11, 'Diciembre'=> 12]
	   
	?>
	<form action = "tablaDeMultiplicar.php" method = "get" enctype = "multipart-formdata">
		<label for = "numero">Inserte un mes en numero:</label>
		<input type = "text" name = "numero" id = "numero" maxlength = "12">
		<button type = "submit">Enviar</button>
	</form>
</body>
