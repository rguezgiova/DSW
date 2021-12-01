<?php
    require_once("Producto.php");
    function obtenerProductos() {
        return [
            new Producto("Pelikan Souveran M-1000", "Descripción M-1000", 545, "../Imagenes/pelikan.png"),
            new Producto("Parker Duofold International", "Descripción Parker", 406, "../Imagenes/parker.png"),
            new Producto("Visconti Van Gogh", "Descripción Visconti", 180, "../Imagenes/visconti.png")
        ];
    }