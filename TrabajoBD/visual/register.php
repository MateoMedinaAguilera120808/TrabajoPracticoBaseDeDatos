<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta</title>
    <link rel="stylesheet" href="../css/app.css">
</head>
<body class="body-login">

    <h2>Registrate en Laser</h2>

    <form id="formRegister">
        <div class="login-form">
            <p>Nombre de usuario</p>
            <input type="text" name="userName" id="regUserName" class="input" placeholder="Nombre de usuario" required
                autocomplete="username" maxlength="20" minlength="5">

            <p>Email</p>
            <input type="email" name="userEmail" id="regUserEmail" class="input" placeholder="Correo electrónico"
                required autocomplete="email" maxlength="30">

            <p>Contraseña</p>
            <input type="password" name="userPassword" id="regUserPassword" class="input" placeholder="Contraseña"
                required minlength="5" autocomplete="new-password" maxlength="15">

            <button type="submit" id="Registrar" class="button">Crear cuenta</button>
        </div>
    </form>

    <div id="mensaje"></div>

    <div class="login-register">
        <p>¿Ya tienes una cuenta? <a href="logIn.php">Inicia sesión aquí</a></p>
    </div>

    <script src="../js/register.js"></script>
</body>

</html>