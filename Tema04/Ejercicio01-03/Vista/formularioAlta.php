    <script>
        function verifyPasswords() {
            if (document.getElementById('contrasenia').value == document.getElementById('contrasenia2').value) {
                return true;
            } else {
                alert("Las contraseñas no coinciden");
                return false;
            }
        }
    </script>
</head>
<body>
    <?php
        if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'admin') {
    ?>
    <form action="alta.php" method="post" enctype="multipart/form-data" onsubmit="return verifyPasswords();">
        <h1>Formulario de registro</h1>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"><br>
        <label for="apellido1">Apellido 1:</label>
        <input type="text" name="apellido1"><br>
        <label for="apellido2">Apellido 2:</label>
        <input type="text" name="apellido2"><br>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario"><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contrasenia"><br>
        <label for="contrasenia2">Verificar contraseña:</label>
        <input type="password" name="contrasenia2"><br>
        <label for="email">Email:</label>
        <input type="email" name="email"><br>
        <button type="submit">Enviar</button>
    </form>
    <?php
        } else {
            header("../Vista/formularioEntrada.html");
        }
    ?>
</body>
</html>