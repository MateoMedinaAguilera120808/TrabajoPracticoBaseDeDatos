<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
require_once 'config/conexion.php';

if (!isset($_SESSION['idCliente'])) {
    echo json_encode(['success' => false, 'msj' => 'Sesión no iniciada.']);
    exit();
}

$idCliente = $_SESSION['idCliente'];

$sql = "SELECT o.NumOrden, p.NombreProducto, o.CantProducto, o.FechaCompra 
        FROM orden_de_compra o
        INNER JOIN productos p ON o.IdProducto = p.IdProducto
        WHERE o.idCliente = ?
        ORDER BY o.NumOrden DESC";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $idCliente);
$stmt->execute();
$res = $stmt->get_result();

$pedidos = [];
while ($row = $res->fetch_assoc()) {
    $pedidos[] = $row;
}

echo json_encode(['success' => true, 'data' => $pedidos]);
exit();
?>