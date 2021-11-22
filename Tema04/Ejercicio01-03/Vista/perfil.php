<?php session_start(); ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
</head>
<body>
    <?php
        if (isset($_SESSION['usuario'])) {
            require_once("../Modelo/funcionesBD.php");
            $datosUsuario = consulta($_SESSION['usuario']);
            print_r($datosUsuario);
        }
    ?>
</body>
</html>