<?php session_start(); ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
</head>
<body>
<?php
    if (isset($_SESSION['usuario'])) {
        if ($_SESSION['usuario'] == 'admin') {
            echo "<a href='../Vista/formularioAlta.php'>Dar de alta</a>";
        }
        echo "<a href='../Vista/perfil.html'>Ver perfil</a>";
        echo "<a href='../Vista/modificar.html'>Modificar Perfil</a>";
    } else {
        header("Location: ../Vista/formularioEntrada.html");
    }
?>
</body>
</html>