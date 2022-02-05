<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio03</title>
</head>
<body>
    <?php
    if ($_POST) {
        $file = "./ficheros/bdUsuarios.json";
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        if (strlen($usuario) > 8 || strpos($usuario, " ")) {
            for ($i = strlen($usuario); $i < 8; $i++) {
                $usuario = $usuario." ";
            }
        } else {
            if (file_exists($file)) {
                $fichero = fopen($file, "r");
                $passwordCorrecta = false;
                while ($linea = fgets($fichero)) {
                    $datos = json_decode($linea, true);
                    if ($datos["usuario"] == $usuario) {
                        if (password_verify($password, $datos["hash"])) {
                            $passwordCorrecta = true;
                        }
                    }
                }
                if ($passwordCorrecta) {
                    echo "<p>El usuario se encuentra registrado</p>";
                }
                fclose($fichero);
            }
        }
    } else {
    ?>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <button type="submit">Validar</button>
        </form>
    <?php
    }
    ?>
</body>
</html>