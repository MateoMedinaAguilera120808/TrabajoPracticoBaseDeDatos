<?php
session_start();
require_once '../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo     = trim($_POST['Correo']);
    $contrasena = trim($_POST['Contrasena']);

    if (empty($correo) || empty($contrasena)) {
        die("Por favor completa ambos campos.");
    }

    $stmt = $conexion->prepare("SELECT idCliente, NombreCliente, Contrasena FROM empresa WHERE Correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        // Verificar la contraseña codificada o en texto plano (en caso de migración previa)
        if (password_verify($contrasena, $usuario['Contrasena']) || $contrasena === $usuario['Contrasena']) {
            $_SESSION['idCliente']     = $usuario['idCliente'];
            $_SESSION['NombreCliente'] = $usuario['NombreCliente'];

            header("Location: index.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "No existe una cuenta registrada con este correo.";
    }
}
?>