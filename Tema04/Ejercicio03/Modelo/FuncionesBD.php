<?php
    require_once("config.php");

    function getDataBase() {
        return DATA_PATH."bdTienda.txt";
    }

    function reset() {
        if (isset($_GET['reset'])) {
            if ($_GET['reset'] == true) {
                unset($_SESSION['cantidad']);
                unset($_SESSION['precio']);
                unset($_SESSION['total']);
                unset($_SESSION['carrito']);
            }
        }
    }

    function aniadir($precio) {
        if (isset($_GET['aniadir'])) {
            $item = $_GET['aniadir'];
            $cantidad = $_SESSION['cantidad'][$item] + 1;
            $_SESSION['precio'][$item] = $precio[$item] * $cantidad;
            $_SESSION['carrito'][$item] = $item;
            $_SESSION['cantidad'][$item] = $cantidad;
        }
    }
