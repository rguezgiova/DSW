<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<?php 
if ($_POST) {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    
    $nums = $num2 - $num1 + 1;
    $suma = $num1;
    $producto = $num1;
    $media = 0;
    
    for ($i = $num1+1; $i <= $num2; $i++) {
        $suma += $i;
        $producto = $producto * $i;
    }
    $media = $suma / $nums;
    ?>
    <table>
        <thead>
            <tr>
                <th>Suma</td>
                <th>Producto</th>
                <th>Media</th>
            </tr>
        </thead>
        <tbody>
                <td><?=$suma?></td>
                <td><?=$producto?></td>
                <td><?=$media?></td>
        </tbody>
    </table>
    <?php 
} else {
    ?>
    <form action="" method="post">
        <label for="num1">Primer numero</label>
        <input type="text" name="num1">
        <label for="num2">Segundo numero</label>
        <input type="text" name="num2">
        <button type="submit">Enviar</button>
    </form>
    <?php
}
?>
</body>
</html>

