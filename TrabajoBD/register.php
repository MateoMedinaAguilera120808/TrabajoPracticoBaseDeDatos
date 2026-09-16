<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

// Ajusta la ruta a tu conexion según donde esté el archivo actual
require_once 'config/conexion.php'; 

$response = ['success' => false, 'msj' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Acepta parámetros provenientes del JS o de formulario tradicional
    $nombreCliente = trim($_POST['userName'] ?? $_POST['NombreCliente'] ?? '');
    $correo        = trim($_POST['userEmail'] ?? $_POST['Correo'] ?? '');
    $contrasena    = trim($_POST['userPassword'] ?? $_POST['Contrasena'] ?? '');
    $sector        = trim($_POST['Sector'] ?? 'General');
    $telefono      = trim($_POST['Telefono'] ?? '00000000');

    if (empty($nombreCliente) || empty($correo) || empty($contrasena)) {
        $response['msj'] = 'Por favor completa todos los campos requeridos.';
        echo json_encode($response);
        exit();
    }

    // Verificar si el correo ya existe
    $stmtCheck = $conexion->prepare("SELECT idCliente FROM empresa WHERE Correo = ?");
    $stmtCheck->bind_param("s", $correo);
    $stmtCheck->execute();
    
    if ($stmtCheck->get_result()->num_rows > 0) {
        $response['msj'] = 'El correo ingresado ya se encuentra registrado.';
        echo json_encode($response);
        exit();
    }

    // Encriptar la contraseña
    $passHash = password_hash($contrasena, PASSWORD_BCRYPT);

    // Insertar el nuevo registro en la base de datos
    $stmt = $conexion->prepare("INSERT INTO empresa (NombreCliente, Correo, Contrasena, Sector, Telefono) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombreCliente, $correo, $passHash, $sector, $telefono);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['msj'] = '¡Usuario registrado con éxito!';
    } else {
        $response['msj'] = 'Error al registrar: ' . $conexion->error;
    }
} else {
    $response['msj'] = 'Método de solicitud no permitido.';
}

echo json_encode($response);
exit();
?>