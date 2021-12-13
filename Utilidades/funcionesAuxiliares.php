<?php 
    /**
     * Funcion que suma de dos matrices bidimensionales a la que se le pasa dos parametros
     */
    function sumaMatrices($a, $b) {
        if (count($a) != count($b) || count($a[0]) != count($b[0])) {
            return false;
        }
        $r = [];
        for($i = 0; $i < count($a); $i++){
            for($j = 0; $j < count($a[0]); $j++) {
                $r[$i][$j] = $a[$i][$j] + $b[$i][$j];
            }
        }
        return $r;
    }
    /**
     * Funcion que genera una tabla donde $a es una matriz bidimensional
     */
    function imprimirMatriz($a) {
        echo "<table>\n";
        for ($i = 0; $i < count($a); $i++) {
            echo "  <tr>\n";
            for ($j = 0; $j < count($a[0]); $j++) {
                echo "<td>", $a[$i][$j], "</td>";
            }
            echo "  </tr>\n";
        }
        echo "</table>";
    }
    
    /**
     * Funcion que imprime un formulario donde se le pasa el nombre y las filas y columnas
     */
    function imprimirFormulario($nombre, $filas, $cols) {
        echo "     <table>\n";
        for ($i = 0; $i < $filas; $i++) {
            echo "\n<tr>";
            for ($j = 0; $j < $cols; $j++) {
                $valor = $i * $cols + $j;
                echo "<td><input type='number' name='$nombre"."[$i][]' value= '$valor' maxlength='4' size='4'/></td>";
            }
            echo "</tr>\n";
        }
        echo "</table>";
    }

    /**
     * Funcion que muestra las imagenes de los numeros y les disminuye el tamanio
     */
    function _mostrarImgNum($num, $width= 0.25) {
        $relativePath = "/imagenes/imgNumeros/".$num.".png";
        $urlFile = ROOT_PATH.$relativePath;
        $realFile = __DIR__."/..$relativePath";
        $newWidth = intval(getimagesize($realFile)[0]*$width);
        echo "<img src='$urlFile' width='$newWidth'/>";
    }

    function mostrarImgNum($num, $width= 0.25) {
        $num = strval($num);
        for ($i = 0; $i < strlen($num); $i++) {
            _mostrarImgNum($num[$i]);
        }
    }

    /**
     * Funcion que muestra las imagenes de las cartas de la baraja espaniola
     */
    function mostrarImgCarta($carta, $palo) {
        $relativePath = "/imagenes/barajaEspa/".$palo."/".$palo.$carta.".png";
        $urlFile = ROOT_PATH.$relativePath;
        $realFile = __DIR__."..$relativePath";
        echo "<img src= '$urlFile' width='100px'/>";
    }

    /**
    * Funcion que obtiene la fecha y hora actual 
    */
    function obtenerFechaHora($claves, $fecha = null) {
        date_default_timezone_set('Atlantic/Canary');
        if ($fecha == null) {
            $fecha = getdate();
        }
        echo "<table>
                <tr>";
        foreach ($claves as $c) {
            echo "<td>";
            if ($fecha[$c] < 10) {
                mostrarImgNum(0);
            }
            mostrarImgNum($fecha[$c]);
            echo "</td>";
        }
        echo "  </tr>
                </table>";
    }

    /**
    * Funcion que muestra la hora actual 
    */
    function mostrarHoraActual($fecha = null) {
        obtenerFechaHora(["hours", "minutes", "seconds"]);
    }

    /**
    * Funcion que muestra la fecha actual 
    */
    function mostrarFechaActual($fecha = null) {
        obtenerFechaHora(["mday", "mon", "year"]);
    }

    /**
     * Funcion que te devuelve una array en formato tabla
     */
    function tablaToHtml($array, $mostrarIndices = false) {
        echo "<table>\n";
    foreach ($array as $indice => $valor) {
        echo "<tr>";
        if ($mostrarIndices) {
            echo "<td>$indice</td>";
        }
        echo "<td>$valor</td>";
        echo "</tr>";
    }
    echo "</table>\n";
    }

    /**
     * Funcion que genera una array de numeros aleatorios
     * @param int $min numero minimo
     * @param int $max numero maximo
     * @param int $cantidad de numeros
     * @return array con los numeros aleatorios
     */
    function arrayNumAleatorios(int $min, int $max, int $cantidad, bool $ordenado = false):array {
        $resultado = [];
        while (count($resultado) < $cantidad) {
            $nuevo = rand($min, $max);
            if (!in_array($nuevo, $resultado)) {
                array_push($resultado, $nuevo);
            }
        }
        if ($ordenado) {
            sort($resultado);
        }
        return $resultado;
    }
?>