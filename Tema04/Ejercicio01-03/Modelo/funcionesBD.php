<?php
    require_once ("../config.php");
    /**
     * Funcion que recoge la BD
     * @return string con los datos de la BD
     */
    function getDataBase() {
        return DATA_PATH."bdUsuarios.txt";
    }

    /**
     * Funcion que consulta en una BBDD
     * @param string $usuario a consultar
     * @return false|mixed datos del usuario
     */
    function consulta(string $usuario) {
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

    /**
     * Funcion que inserta datos en una BBDD
     * @param array $datos a insertar
     * @return bool si los inserta o no
     */
    function inserta(array $datos):bool {
        if (consulta($datos['usuario'])) {
            echo "<span style='color: red;'>Usuario ya existe: ", $datos['usuario'],".</span";
            return false;
        }
        $dataBase = getDataBase();
        $handle = fopen($dataBase, "a") ;
        if (!$handle) {
            return false;
        }
        $datos['contrasenia'] = password_hash($datos['contrasenia'], PASSWORD_BCRYPT);
        fputs($handle, json_encode($datos, JSON_UNESCAPED_UNICODE). "\n");
        fclose($handle);
        return true;
    }

    /**
     * Funcion que borra a un usuario de la BD
     * @param string $usuario a borrar
     * @return bool si o no segun borre
     */
    function borra(string $usuario):bool {
        if (!consulta($usuario)) {
            echo "<span style='color: red;'>Usuario no existe: $usuario </span>";
            return false;
        }
        $bdTemp = tempnam(DATA_PATH, "bdUsuariosTemp");
        $entrada = fopen(getDataBase(), "r");
        $salida = fopen($bdTemp, "w");
        while ($linea = fgets($entrada)) {
            if (!str_contains($linea, "\"usuario\":\"$usuario\"")) {
                fputs($salida, $linea."\n");
            }
        }
        fclose($entrada);
        fclose($salida);
        unlink(getDataBase());
        return rename($bdTemp, getDataBase());
    }

    function modifica(array $nuevosDatosUsuario):bool {

    }
?>