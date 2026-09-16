<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

require_once 'config/conexion.php';

$response = ['success' => false, 'msj' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo     = trim($_POST['userName'] ?? $_POST['Correo'] ?? '');
    $contrasena = trim($_POST['userPassword'] ?? $_POST['Contrasena'] ?? '');

    if (empty($correo) || empty($contrasena)) {
        $response['msj'] = 'Por favor completa ambos campos.';
        echo json_encode($response);
        exit();
    }

    $stmt = $conexion->prepare("SELECT idCliente, NombreCliente, Contrasena FROM empresa WHERE Correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($contrasena, $usuario['Contrasena']) || $contrasena === $usuario['Contrasena']) {
            $_SESSION['idCliente']     = $usuario['idCliente'];
            $_SESSION['NombreCliente'] = $usuario['NombreCliente'];

            $response['success'] = true;
            $response['msj'] = 'Inicio de sesión exitoso.';
        } else {
            $response['msj'] = 'Contraseña incorrecta.';
        }
    } else {
        $response['msj'] = 'No existe una cuenta registrada con este correo.';
    }
} else {
    $response['msj'] = 'Método no permitido.';
}

echo json_encode($response);
exit();
?>