<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
	<?php 
	if ($_POST) {
	    $file = "./ficheros/bdUsuarios.json";
	    $usuario = $_POST["usuario"];
	    $password = $_POST["password"];
	    //$password = password_hash($password, PASSWORD_BCRYPT);
	    if (strlen($usuario) > 8 || strpos($usuario, " ")) {
	        echo "<h2 style='color: red;'>Usuario no valido</h2>";
	    } else {
    	    for ($i = strlen($usuario); $i < 8; $i++) {
    	        $usuario = $usuario." ";
    	    }
    	    
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
    	            echo "<h2 style='color: green;'>Usuario logeado correctamente</h2>";
    	        } else {
    	            echo "<h2 style='color: red;'>Usuario o contrasenia incorrectos</h2>";
    	        }
    	        fclose($fichero);
    	    }
	    }
	} else {
	    ?>
    	<form action="" method="post">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario">
            <label for="password">Password</label>
            <input type="text" name="password">
            <button type="submit">Enviar</button>
    	</form>
	    <?php
	}
	?>
    
</body>
</html>