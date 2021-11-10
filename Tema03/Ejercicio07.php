<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 07</title>
    <script src="Ejercicio07.js"></script>
</head>
<body>
    <?php
    require_once('../config.php');
    ?>

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'fichero')">Subir fichero</button>
        <button class="tablinks" onclick="openCity(event, 'csv')">Archivo CSV</button>
        <button class="tablinks" onclick="openCity(event, 'imagen')">Imprimir imgaen</button>
    </div>

    <div id="fichero" class="tabcontent">
        <?php
        function subirFichero() {
            if ($_POST || $_FILES) {
                foreach ($_FILES["fichero"]["tmp_name"] as $nombreFicheroTmp) {
                    move_uploaded_file($nombreFicheroTmp, DATA_PATH . "/" . $_FILES['fichero']['name']);
                }
                $fichero = $_FILES['fichero']['tmp_name'];
            } else {
        ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="fichero">Selecciona el fichero:</label>
                    <input type="file" id="fichero" name="fichero[]" multiple="multiple" /><br />
                    <button type="submit">Enviar</button>
                </form>
        <?php
            }
        }
        subirFichero();
        ?>
    </div>

    <div id="csv" class="tabcontent">
        <?php
        function generarTabla() {
        if ($_FILES || $_POST) {
                function generarFila($linea, $separador = ";") {
                    static $tipoCelda = "th";
                    $linea = substr($linea, 0, strlen($linea) - 1);
                    $campos = explode($separador, $linea);
                    echo "<tr>";
                    foreach ($campos as $campo) {
                        echo "<$tipoCelda>$campo</$tipoCelda>";
                    }
                    echo "</tr>";
                    if ($tipoCelda == "th") {
                        $tipoCelda = "td";   
                    }
                }
            
                function csvToHtmlTable($file) {
                    $handle = fopen($file, "r");
                    echo "<table>";
                    while ($linea = fgets($handle)) {
                        generarFila($linea);
                    }
                    echo "</table>";
                }
            
                function textCsvToHtmlTable($cadena) {
                    $lineas = explode("\n", $cadena);
                    $lineas = preg_split("/[\r]?[\n]/", $cadena);
                    echo "<table>\n";
                    foreach($lineas as $linea) {
                        generarFila($linea);
                    }
                    echo "</table>\n";
                }
            
                function fileCsvToHtmlTable($file) {
                    $lineas = file_get_contents($file);
                    textCsvToHtmlTable($lineas);
                }
                textCsvToHtmlTable($_POST['csv']);
            } else {
            ?>
                <form action="" method="POST" enctype="multipart/form-data">
                <textarea id="csv" >Pega aquí el texto:</textarea>
                <button type="submit">Enviar</button>
                </form>
        <?php    
            }
        }
        generarTabla();
        ?>        
    </div>
</body>
</html>