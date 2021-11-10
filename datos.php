<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valores variables PHP</title>
    <style>th, td { padding: 10px; }</style>
</head>
<body>
    <?php
        function imprimeTablaVars($TABLA, $nombre) {
            echo "<table border = '1'
                  <caption>Varibales: $nombre</caption>
                  <tr><th>Variable</th><th>&nbsp;&nbsp;&nbsp;</th><th>Valor</th><th>Tipo</th></tr>";
                foreach ($TABLA as $i => $val) {
                    if (getType($val) == 'array') {
                        echo "<tr><td>$i</td><td>==></td><td>";
                        print_r($val);
                        echo "</td><td>", getType($val), "</td></tr>";
                    } else {
                        echo "<tr><td>$i</td><td>==></td><td>$val</td><td>", getType($val), "</td></tr>";
                    }
                }
            echo "</table><br/><br/>";
        }
    ?>
    <?php
        imprimeTablaVars($_POST, "POST");
        imprimeTablaVars($_GET, "GET");
        imprimeTablaVars($_FILES, "FILES");
    ?>
</body>
</html>