<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
	<table>
	<?php 
		$numero = $_GET['numero'];
		for ($i = 1; $i <= 10; $i++) {
		    echo "<tr><td>$numero</td><td>*</td><td>$i</td><td>=</td><td>,$numero*$i,</td>";
		}
	?>
	</table>
</body>
</html>