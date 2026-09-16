<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
require_once 'config/conexion.php';

if (!isset($_SESSION['idCliente'])) {
    echo json_encode(['success' => false, 'msj' => 'Sesión no iniciada.']);
    exit();
}

$idCliente = $_SESSION['idCliente'];

$sql = "SELECT f.idFactura, 
               f.PrecioPagar AS Total, 
               o.FechaCompra AS Fecha, 
               'Emitida' AS Estado
        FROM factura f
        INNER JOIN orden_de_compra o ON f.NumOrden = o.NumOrden
        WHERE f.idCliente = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $idCliente);
$stmt->execute();
$res = $stmt->get_result();

$facturas = [];
while ($row = $res->fetch_assoc()) {
    $facturas[] = $row;
}

echo json_encode(['success' => true, 'data' => $facturas]);
exit();
?>