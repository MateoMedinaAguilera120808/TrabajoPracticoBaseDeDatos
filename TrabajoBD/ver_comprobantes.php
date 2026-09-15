<?php
session_start();
require_once '../config/conexion.php';

if (!isset($_SESSION['idCliente'])) {
    header("Location: login.php");
    exit();
}

$idCliente = $_SESSION['idCliente'];

$sql = "SELECT c.NumPago, c.idFactura, f.PrecioPagar, e.NombreCliente, e.Correo
        FROM comprobante_de_pago c
        INNER JOIN factura f ON c.idFactura = f.idFactura
        INNER JOIN empresa e ON c.idCliente = e.idCliente
        WHERE c.idCliente = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $idCliente);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<h2>Comprobantes de Pago</h2>
<table border="1">
    <tr>
        <th>N° Comprobante</th>
        <th>N° Factura</th>
        <th>Cliente / Empleado</th>
        <th>Correo</th>
        <th>Monto</th>
    </tr>
    <?php while ($row = $resultado->fetch_assoc()): ?>
    <tr>
        <td><?= $row['NumPago'] ?></td>
        <td><?= $row['idFactura'] ?></td>
        <td><?= htmlspecialchars($row['NombreCliente']) ?></td>
        <td><?= htmlspecialchars($row['Correo']) ?></td>
        <td>$<?= $row['PrecioPagar'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>