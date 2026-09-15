<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body class="body-login">

    

    <h2>Iniciar sesion en Laser</h2>
    <br>

        <form id="formLogin">
            <div class="login-form">
            <p>Nombre de usuario</p>
            <input type="text" name="userName" id="loginUserName" class="input" placeholder="Nombre de usuario" required
                autocomplete="username" maxlength="20">

            <br>

            <p>Contraseña</p>
            <input type="password" name="userPassword" id="loginUserPassword" class="input" placeholder="Contraseña"
                required autocomplete="current-password" maxlength="15">

            <br>

            <button type="submit" id="button" class="buttonw">Iniciar Sesión</button>
            </div>
        </form>
    

    <div id="mensaje"></div>
    <br>

    <div class="login-register">
        <p>¿Sos Nuevo en Laser? <a href="register.php">Crea una cuenta</a></p>
    </div>
    <br>

    

    <script src="../js/logIn.js"></script>
</body>

</html>