<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 03</title>
</head>
<body>
    <?php
    if (isset($_POST['json'])) {
        $json = $_POST['json'];
        $jsonParse = json_decode($json, true);
        echo "<table>
                <tr>";
        for ($i = 0; $i < count($jsonParse); $i++) {
            echo "<td>$jsonParse</td>";
        }
        echo "</tr>
            </table>";
    } else {
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="json">Inserte contenido en formato JSON:</label>
            <textarea name="json" id="json"></textarea>
            <button type="submit">Enviar</button>
        </form>
    <?php
    }
    ?>
</body>
</html>