<?php
session_start();
require_once '../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreCliente = trim($_POST['NombreCliente']);
    $correo        = trim($_POST['Correo']);
    $contrasena    = trim($_POST['Contrasena']);
    $sector        = trim($_POST['Sector']);
    $telefono      = trim($_POST['Telefono']);

    if (empty($nombreCliente) || empty($correo) || empty($contrasena) || empty($sector) || empty($telefono)) {
        die("Por favor completa todos los campos.");
    }

    // Verificar si el correo ya existe
    $stmtCheck = $conexion->prepare("SELECT idCliente FROM empresa WHERE Correo = ?");
    $stmtCheck->bind_param("s", $correo);
    $stmtCheck->execute();
    if ($stmtCheck->get_result()->num_rows > 0) {
        die("El correo ingresado ya se encuentra registrado.");
    }

    // Encriptar la contraseña
    $passHash = password_hash($contrasena, PASSWORD_BCRYPT);

    // Insertar el nuevo registro en la base de datos
    $stmt = $conexion->prepare("INSERT INTO empresa (NombreCliente, Correo, Contrasena, Sector, Telefono) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombreCliente, $correo, $passHash, $sector, $telefono);

    if ($stmt->execute()) {
        header("Location: login.php?registered=success");
        exit();
    } else {
        echo "Error al registrar: " . $conexion->error;
    }
}
?>