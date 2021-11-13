<!DOCTYPE html>
<html lang="es">
<head>
    <title></title>
    <meta charset="UTF-8">
</head>
<body>
    <?php
    require_once("../../config.php");
    /**
     * 
     * @return string
     */
    function getDataBase() {
        return DATA_PATH . "bdUsuarios.txt";
    }
    /**
     * 
     * @param String $usuario
     * @return mixed|boolean
     */
    function consulta(String $usuario) {
        $dataBase = getDataBase();
        if (file_exists($dataBase)) {
            $handle = fopen($dataBase, "r");
            while ($linea = fgets($handle)) {
                $datos = json_decode($linea, true);
                if ($datos['usuario'] == $usuario) {
                    return $datos;
                }
            }
            fclose($handle);
        }
        return false;
    }

    function inserta(array $datos) {
    }

    /**
     * 
     * @param array $POST
     * @return array
     */
    function procesaDatosPost(array $POST): array {
        return [
            "nombre" => $POST['nombre'],
            "apellido1" => $POST['apellido1'],
            "apellido2" => $POST['apellido2'],
            "usuario" => $POST['usuario'],
            "contraseña" => $POST['contraseña'],
            "email" => $POST['email']
        ];
    }

    if ($_POST) {
        $datos = procesaDatosPost($POST);
        $datosJson = json_encode($datos, JSON_UNESCAPED_UNICODE);
    }
    ?>
</body>
</html>