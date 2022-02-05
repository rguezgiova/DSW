<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio02</title>
</head>
<body>
    <?php
    $file = "./ficheros/notasAlumnos.txt";
    $notas = [];
    $media = 0;
    if (file_exists($file)) {
        $fichero = fopen($file, "r");
        while ($linea = fgets($fichero)) {
            $notaAlumno = explode("\n", $linea);
            $tmpArray = explode(";", $notaAlumno[0]);
            $notasAlumnos[$tmpArray[0]] = floatval($tmpArray[1]);
        }
        asort($notasAlumnos);
        echo "<table>";
        foreach ($notasAlumnos as $alumno => $nota) {
            $notas[] = [$alumno, $nota];
            echo "<tr>";
            echo "<td>$alumno</td>";
            echo "<td>$nota</td>";
            echo "</tr>";
            $media += $nota;
        }
        $alumnos = count($notasAlumnos);
        $menosAlumno = $notas[0][0];
        $menosNota = $notas[0][1];
        $masAlumno = $notas[$alumnos - 1][0];
        $masNota = $notas[$alumnos - 1][1];
        $media = $media / $alumnos;
        echo "</table>";
        echo "<div>";
        echo "<p>Alumno con Menor nota: $menosAlumno - $menosNota</p>";
        echo "<p>Alumno con Mayor nota: $masAlumno - $masNota</p>";
        echo "<p>Media de la clase: $media</p>";
        echo "</div>";
        fclose($fichero);
    }
    ?>
</body>
</html>