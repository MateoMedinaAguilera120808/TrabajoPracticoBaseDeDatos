<?php
session_start();
require_once '../config/conexion.php';

if (!isset($_SESSION['idCliente'])) {
    header("Location: login.php");
    exit();
}

$idCliente = $_SESSION['idCliente'];

$sql = "SELECT f.idFactura, f.PrecioPagar, f.NumOrden, p.NombreProveedor, o.FechaCompra 
        FROM factura f
        INNER JOIN Proveedores p ON f.idProveedor = p.idProveedor
        INNER JOIN orden_de_compra o ON f.NumOrden = o.NumOrden
        WHERE f.idCliente = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $idCliente);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<h2>Mis Facturas</h2>
<table border="1">
    <tr>
        <th>N° Factura</th>
        <th>N° Orden</th>
        <th>Proveedor</th>
        <th>Monto Total</th>
        <th>Fecha</th>
    </tr>
    <?php while ($row = $resultado->fetch_assoc()): ?>
    <tr>
        <td><?= $row['idFactura'] ?></td>
        <td><?= $row['NumOrden'] ?></td>
        <td><?= htmlspecialchars($row['NombreProveedor']) ?></td>
        <td>$<?= $row['PrecioPagar'] ?></td>
        <td><?= $row['FechaCompra'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>