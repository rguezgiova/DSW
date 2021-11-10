<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ejercicio 09</title>
</head>
<body>
	<?php
    require_once('../config.php');
    $lista = "";
    if (isset($_POST['num'])) {
        $num = $_POST['num'];
        if ($num == -1) {
            $listaFinal = explode(" ", trim($_POST['lista']));
            echo "<table>\n";
            foreach($listaFinal as $valor) {
                echo "<tr><td>",$valor,"</td></tr>";
                $suma += intval($valor);
            }
            echo "<tr><td>$suma</td></tr>";
            echo "</table>\n";
        } else {
            $lista = $_POST['lista'].$num." ";
        }
    }
    if ($num != -1) {
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="">Numero:</label></td>
                    <td><input type="number" name="numero" id="numero"></td>
                    <input type="hidden" name="lista" id="lista" value="<?php echo $lista;?>">
                </tr>
                <tr>
                    <td><button type="submit">Enviar</button></td>
                    <td><button type="reset">Borrar</button></td>
                </tr>
            </table>
        </form>
        <?php
    }
    ?>
</body>
</html>