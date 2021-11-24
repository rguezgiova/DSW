<?php session_start(); ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alta</title>
</head>
<body>
    <?php
        require_once('config.php');
        require_once('Tema04/Ejercicio01-03/Modelo/funcionesBD.php');

        /**
         * Funcion que procesa los datos del usuario en POST
         * @return array asociativo con los datos del usuario
         */
        function procesaDatos():array {
            return [
                "nombre" => $_POST['nombre'],
                "apellido1" => $_POST['apellido1'],
                "apellido2" => $_POST['apellido2'],
                "usuario" => $_POST['usuario'],
                "contraseña" => $_POST['contrasenia'],
                "email" => $_POST['email']
            ];
        }

        if ($_POST) {
            $datos = procesaDatos();
            if (inserta($datos)) {
                echo "<span style='color: blue'>Datos insertados correctamente</span>";
            } else {
                echo "<span style='color: red'>Error al insertar los datos</span>";
            }
        }
    ?>
</body>
</html>
