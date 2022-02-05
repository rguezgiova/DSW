<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio01</title>
</head>
<body>
    <?php
    if ($_POST) {
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];
        if ($numero1 < $numero2) {
            echo "<select>";
            for ($i = $numero1; $i <= $numero2; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            echo "</select>";
        } else {
            echo "<select>";
            for ($i = $numero1; $i >= $numero2; $i--) {
                echo "<option value='$i'>$i</option>";
            }
            echo "</select>";
        }

    } else {
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="numero1">Primer numero:</label></td>
                <td><input type="number" name="numero1" id="numero1"></td>
            </tr>
            <tr>
                <td><label for="numero2">Segundo numero:</label></td>
                <td><input type="number" name="numero2" id="numero2"></td>
            </tr>
            <tr>
                <td><button type="submit">Enviar</button></td>
            </tr>
        </table>
    </form>
    <?php
    }
    ?>
    </body>
</html>