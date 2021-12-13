<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 01</title>
</head>
<body>
    <?php
        if (isset($_POST['numero1']) && isset($_POST['numero2'])) {
            $numero1 = $_POST['numero1'];
            $numero2 = $_POST['numero2'];
            $resultadoSuma = 1;
            $resultadoProducto = 0;
            $resultadoMedia = 0;
            for ($i = $numero1; $i < $numero2; $i++) {
                $resultadoSuma += $i + 1;
            }
            for ($i = $numero1, $j = $numero1; $i < $numero2, $j < $numero2; $i++, $j++) {
                $i = $i + 1;
                $resultadoProducto += $i * $j;
            }
            $resultadoMedia = $resultadoSuma / $numero2;
            echo "<table>
                    <tr>
                        <td>
                            Resultado de la suma:
                        </td>
                        <td>
                            $resultadoSuma
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Resultado del producto:
                        </td>
                        <td>
                            $resultadoProducto
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Resultado de la media:
                        </td>
                        <td>
                            $resultadoMedia
                        </td>
                    </tr>
                  </table>";
        } else {
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="numero1">Inserte el primer número:</label>
        <input type="text" name="numero1" id="numero1">
        <label for="numero2">Inserte el segundo número:</label>
        <input type="text" name="numero2" id="numero2">
        <button type="submit">Enviar</button>
    </form>
    <?php
        }
    ?>
</body>
</html>