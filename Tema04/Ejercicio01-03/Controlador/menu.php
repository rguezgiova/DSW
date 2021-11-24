<?php require_once("autenticado.php"); ?>
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
    if ($_GET) {
        $opcion = $_GET['opcion'];
        if ($opcion == 'alta') {
            $datosForm=['nombre' => ["",""],'apellido1' =>["",""], 'apellido2' =>["",""],'usuario' =>["",""], 'contrasenia' =>["",""], 'contrasenia2' =>["",""], 'password' =>["",""], 'email' =>["",""]];
            require_once("Tema04/Ejercicio01-03/Vista/formularioAlta.php");
        } elseif ($opcion == 'verPerfil') {
            $datosForm=['nombre' => ["","disabled"],'apellido1' =>["","disabled"], 'apellido2' =>["","disabled"],'usuario' =>["","disabled"], 'contrasenia' =>["","disabled"], 'contrasenia2' =>["","disabled"], 'password' =>["","disabled"], 'email' =>["","disabled"]];
            require_once("Tema04/Ejercicio01-03/Vista/formularioAlta.php");
        } elseif ($opcion == 'modificar') {
            $datosForm=['nombre' => ["",""],'apellido1' =>["",""], 'apellido2' =>["",""],'usuario' =>["","disabled"], 'contrasenia' =>["",""], 'contrasenia2' =>["",""], 'password' =>["",""], 'email' =>["",""]];
            require_once("Tema04/Ejercicio01-03/Vista/formularioAlta.php");
        } else {

        }
    } else {
        if ($_SESSION['usuario'] == 'admin') {
            echo "<a href='?opcion=alta'>Dar de alta</a>";
        }
        echo "<a href='?opcion=verPerfil'>Ver perfil</a>";
        echo "<a href='?opcion=modificar'>Modificar Perfil</a>";
    }
?>
</body>
</html>