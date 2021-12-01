<?php session_start(); ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Shop</title>
    <style>
        body{ text-align:center; background-color: aliceblue; color: darkslateblue; }
        table{ margin: 0 auto }
    </style>
</head>
<body>
    <?php
    require_once('Carrito.php');
    require_once('Producto.php');
    $producto1 = new Producto(1, 'aaa', 'abc', 100, 'Imagenes/pelikan.png');
    $producto2 = new Producto(2, 'bbb', 'abc', 10, 'Imagenes/parker.png');
    $producto3 = new Producto(3, 'ccc', 'abc', 150, 'Imagenes/visconti.png');
    $listaProductos = [];
    array_push($listaProductos, $producto1, $producto2, $producto3);
    $listaCantidad = [];
    ?>
    <h1>Tienda on-line <u>La Estilográfica</u></h1>
    <table>
        <thead>
            <tr>
                <th>Productos</th>
                <th>Carrito</th>
            </tr>
        </thead>
        <tbody>
                <?php
                foreach ($listaProductos as $producto) {
                    $nombre = $producto->getNombre();
                    $descripcion = $producto->getDescripcion();
                    $precio = $producto->getPrecio();
                    $imagen = $producto->getImagen();
                    echo "<tr>
                            <td><img src='$imagen' alt='imagen'>
                            <p>$nombre</p>
                            <p>$precio</p>
                            <p>$descripcion</p></td>
                          </tr>";
                }
                ?>
        </tbody>
    </table>
</body>
</html>
