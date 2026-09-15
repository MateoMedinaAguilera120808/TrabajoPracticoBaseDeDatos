<?php
// logIn.php
// este archivo procesa el inicio de sesión del usuario

session_start();
//se conecta a la base de datos
require_once "../TrabajoPracticoBaseDeDatos/TrabajoBD/config/config.php";

// verifica si se enviaron los datos del formulario
if (isset($_POST["userName"]) && isset($_POST["userPassword"])) {
    // obtiene los datos del formulario
    $userName = $_POST["userName"];
    $userPassword = $_POST["userPassword"];

    //hace la consulta para obtener el usuario por nombre de usuario
    $sql = "SELECT idCliente, NombreCliente, Contrasena FROM empresa WHERE NombreCliente = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $userName);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    // si se encontró el usuario, verifica la contraseña
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);

        if ($userPassword === $row["userPassword"]) {
            //inicia la sesión y guarda los datos del usuario en la sesión
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['userId'] = $row['userId'];
            

            echo json_encode(["success" => true, "msj" => "Login exitoso."]);
        }
    }
    // si no se encontró el usuario por nombre de usuario, intenta con el email
    else{
    // hace la consulta para obtener el usuario por email
    $sql = "SELECT idCliente, NombreCliente, Contrasena FROM Empleados WHERE Correo = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $userName);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    // si se encontró el usuario, verifica la contraseña
     if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        
        if ($userPassword === $row["userPassword"]) {
            //inicia la sesión y guarda los datos del usuario en la sesión
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['userId'] = $row['userId'];
           
            echo json_encode(["success" => true, "msj" => "Login exitoso."]);
        }}else {
            echo json_encode(["error" => "incorrecto", "msj" => "Usuario o contraseña incorrectos."]);
        }
    }
    
} else {
    echo json_encode(["error" => "faltan_datos", "msj" => "Por favor, completa todos los campos."]);
}
