<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
	<?php 
    $file = "./ficheros/notasAlumnos.txt";
    $notasAlumnos = [];
    
    if (file_exists($file)) {
        $fichero = fopen($file, "r");
        
        while ($linea = fgets($fichero)) {
            $notaAlumno = explode("\n", $linea);
            $tmpArray = explode(",", $notaAlumno[0]);
            $notasAlumnos[$tmpArray[0]] = intval($tmpArray[1]);
        }

        arsort($notasAlumnos);
        
        echo "<table>";
        foreach ($notasAlumnos as $alumno => $nota) {
            
            echo "<tr><td>$alumno</td><td>$nota</td></tr>";
            
        }
        echo "</table>";
        fclose($fichero);
    }
    ?>
</body>
</html>