<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ejercicio 11</title>
</head>
<body>
	<?php
    require_once('../config.php');
    require_once(PROJECT_PATH.'/Utilidades/funcionesAuxiliares.php');
    //Array con las cartas que hemos jugado
    $cartasJugadas[] = "";
    //Puntuacion de las cartas
    $puntosMano = 0;
    //Array asociativa con las puntuaciones de cada carta
    $puntos = [ '1' => 11, '2' => 0, '3' => 10, '4' => 0, '5' => 0, '6' => 0, '7' => 0, '10' => 2, '11' => 3, '12' => 4];
    //Array con los palos de las cartas
    $palos = ['oros', 'bastos', 'espadas', 'copas'];
    //Array de las cartas
    $cartas = ['1', '2', '3', '4', '5', '6', '7', '10', '11', '12'];

    //Bucle donde sacamos 10 cartas random
    for ($i = 0; $i < 10; $i++) {
        //Sacamos un palo random del array
        $paloCarta = $palos[rand(0, 3)];
        //Sacamos un numero de carta random  del array
        $numeroCarta = $cartas[rand(0, 9)];
        //Sacamos los puntos que vale esa carta
        $puntosCarta = $puntos[$numeroCarta];
        //Concatenamos el palo de la carta con el numero para comparar y posteriormente mostrar su imagen
        $cartaMano = $paloCarta.$numeroCarta;

        //Condicional para comprobar si la carta generada no esta en el array
        if (!in_array($cartaMano, $cartasJugadas)) {
            //Aniadimos la carta generada al array de mano
            $cartasJugadas[] = $cartaMano;
            //Suma del valor de la carta con los puntos
            $puntosMano += $puntosCarta;
            //Funcion que muestra la imagen de la carta generada
            mostrarImgCarta($numeroCarta, $paloCarta);
        } else {
            $i--;
        }
    }
    //Mostramos los puntos totales de las cartas de la mano
    echo "<br>\nPuntuación total: ", $puntosMano;
    ?>
</body>
</html>