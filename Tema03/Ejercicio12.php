<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 12</title>
    <style>
        .blanco {
            background-color: white;
        }

        .negro {
            background-color: black;
        }
    </style>
</head>
<body>
    <table border="1px" width="400" height="400px">
    <?php
    require_once('../config.php');
    for ($i = 1; $i <= 8; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= 8; $j++) {
            $total = $i + $j;
            if ($total % 2 == 0) {
                echo "<td class='blanco' id='"."$i"."-$j' onclick='mandaInfo(this.id);'></td>";
            } else {
                echo "<td class='negro' id='"."$i"."-$j' onclick='mandaInfo(this.id);'></td>";
            } 
        }
        echo "</tr>";
    }
    ?>
    <?php
    $posiciones = [];
    for ($i = 1; $i <= 8; $i++) {
        for ($j = 1; $j <= 8; $j++) {
            $posiciones[$i][$j] = $i."-".$j;
        }
    }
    $posicionClic = $_REQUEST['id'];
    ?>
    </table>
    <script src="Ejercicio12.js" type="text/javascript"></script>
</body>
</html>