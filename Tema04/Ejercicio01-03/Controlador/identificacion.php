<?php session_start(); ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Identificación</title>
</head>
<body>
    <?php
        require_once('config.php');
        require_once('Tema04/Ejercicio01-03/Modelo/funcionesBD.php');

        if ($_POST) {
            $usuario = $_POST['usuario'];
            $contrasenia = $_POST['contrasenia'];
            $datosUsuario = consulta($usuario);
            if ($datosUsuario && password_verify($contrasenia, $datosUsuario['contrasenia'])) {
                $_SESSION['usuario'] = $usuario;
                header('Location: menu.php');
            } else {
                echo "<span style='color: red'>Error en el nombre de usuario y/o contraseña</span>";
            }
        }
    ?>
</body>
</html>