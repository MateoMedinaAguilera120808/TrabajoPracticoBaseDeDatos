<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="../css/app.css">
</head>
<body class="body-login">

    <h2>Iniciar sesion en Laser</h2>

    <form id="formLogin">
        <div class="login-form">
            <p>Correo</p>
            <input type="text" name="userName" id="loginUserName" class="input" placeholder="Correo" required
                autocomplete="username" maxlength="255">

            <p>Contraseña</p>
            <input type="password" name="userPassword" id="loginUserPassword" class="input" placeholder="Contraseña"
                required autocomplete="current-password" maxlength="15">

            <button type="submit" id="button" class="buttonw">Iniciar Sesión</button>
        </div>
    </form>

    <div id="mensaje"></div>

    <div class="login-register">
        <p>¿Sos Nuevo en Laser? <a href="register.php">Crea una cuenta</a></p>
    </div>

    <script src="../js/logIn.js"></script>
</body>

</html>