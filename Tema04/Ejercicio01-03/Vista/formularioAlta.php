<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
    <style>
        label {
            display: inline-block;
            width: 100px;
        }
    </style>
</head>
<body>
    <?php
        if (isset($_SESSION['usuario'])) {
    ?>
    <form action="alta.php" method="post" enctype="multipart/form-data">
        <h1>Formulario de registro</h1>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"><br>
        <label for="apellido1">Apellido 1:</label>
        <input type="text" name="apellido1"><br>
        <label for="apellido2">Apellido 2:</label>
        <input type="text" name="apellido2"><br>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario"><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña"><br>
        <label for="email">Email:</label>
        <input type="email" name="email"><br>
        <button type="submit">Enviar</button>
    </form>
    <?php
        } else {
            header("../Vista/formularioEntrada.html");
        }
    ?>
</body>
</html>