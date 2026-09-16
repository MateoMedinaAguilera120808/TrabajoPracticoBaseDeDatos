<?php
session_start();
ob_clean();
header('Content-Type: application/json; charset=utf-8');

require_once 'config/conexion.php';

$response = ['success' => false, 'msj' => 'Ocurrió un error inesperado.'];

if (!isset($_SESSION['idCliente'])) {
    $response['msj'] = 'Sesión no iniciada.';
    echo json_encode($response);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idCliente = $_SESSION['idCliente'];
    $idFactura = intval($_POST['idFactura'] ?? 0);

    if ($idFactura <= 0) {
        $response['msj'] = 'Debes seleccionar una factura válida.';
        echo json_encode($response);
        exit();
    }

    // 1. Verificar que la factura exista y pertenezca al cliente
    $stmtCheck = $conexion->prepare("SELECT idFactura FROM factura WHERE idFactura = ? AND idCliente = ?");
    $stmtCheck->bind_param("ii", $idFactura, $idCliente);
    $stmtCheck->execute();
    
    if ($stmtCheck->get_result()->num_rows === 0) {
        $response['msj'] = 'La factura seleccionada no existe o no te pertenece.';
        echo json_encode($response);
        exit();
    }

    // 2. Verificar que la factura NO haya sido pagada previamente
    $stmtPagada = $conexion->prepare("SELECT NumPago FROM comprobante_de_pago WHERE idFactura = ?");
    $stmtPagada->bind_param("i", $idFactura);
    $stmtPagada->execute();

    if ($stmtPagada->get_result()->num_rows > 0) {
        $response['msj'] = 'Esta factura ya fue pagada anteriormente.';
        echo json_encode($response);
        exit();
    }

    // 3. Registrar el comprobante de pago
    $stmtPago = $conexion->prepare("INSERT INTO comprobante_de_pago (idCliente, idFactura) VALUES (?, ?)");
    $stmtPago->bind_param("ii", $idCliente, $idFactura);

    if ($stmtPago->execute()) {
        $response['success'] = true;
        $response['msj'] = '¡Pago registrado correctamente! Comprobante generado.';
    } else {
        $response['msj'] = 'Error al registrar el pago: ' . $conexion->error;
    }
} else {
    $response['msj'] = 'Método no permitido.';
}

echo json_encode($response);
exit();
?>