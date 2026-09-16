<?php
session_start();
// Importamos la conexión a la BD
require_once '../config/conexion.php';

if (!isset($_SESSION['idCliente'])) {
    header("Location: login.php");
    exit();
}

$idCliente = $_SESSION['idCliente'];

// 1. Cargar productos con precio
$productosResult = $conexion->query("SELECT IdProducto, NombreProducto, Precio, Stock FROM productos WHERE Stock > 0");

// 2. Cargar proveedores
$proveedoresResult = $conexion->query("SELECT idProveedor, NombreProveedor FROM Proveedores");

// 3. Cargar SOLO facturas pendientes de pago (LEFT JOIN con comprobante_de_pago)
$sqlFacturas = "SELECT f.idFactura, f.PrecioPagar 
                FROM factura f 
                LEFT JOIN comprobante_de_pago c ON f.idFactura = c.idFactura 
                WHERE f.idCliente = ? AND c.idFactura IS NULL";

$stmtFacturas = $conexion->prepare($sqlFacturas);
$stmtFacturas->bind_param("i", $idCliente);
$stmtFacturas->execute();
$facturasResult = $stmtFacturas->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Compras</title>
</head>
<body>

    <nav>
        <a href="ver_pedidos.php">Ver Mis Pedidos</a> | 
        <a href="ver_facturas.php">Ver Mis Facturas</a> | 
        <a href="ver_comprobantes.php">Ver Mis Comprobantes</a> | 
        <a href="../logout.php">Cerrar Sesión</a>
    </nav>

    <h2>Nueva Orden de Compra</h2>

    <form action="../procesar_orden.php" method="POST">
        <label for="idProducto">Producto (Precio Unitario):</label>
        <select name="idProducto" id="idProducto" required>
            <?php while ($prod = $productosResult->fetch_assoc()): ?>
                <option value="<?= $prod['IdProducto'] ?>">
                    <?= htmlspecialchars($prod['NombreProducto']) ?> — $<?= number_format($prod['Precio'], 2) ?> c/u (Stock: <?= $prod['Stock'] ?>)
                </option>
            <?php endwhile; ?>
        </select>
        <br><br>

        <label for="cantProducto">Cantidad:</label>
        <input type="number" name="cantProducto" id="cantProducto" min="1" required>
        <br><br>

        <label for="idProveedor">Proveedor:</label>
        <select name="idProveedor" id="idProveedor" required>
            <?php while ($prov = $proveedoresResult->fetch_assoc()): ?>
                <option value="<?= $prov['idProveedor'] ?>">
                    <?= htmlspecialchars($prov['NombreProveedor']) ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br><br>

        <button type="submit">Realizar Orden</button>
    </form>

    <hr style="margin-top: 30px;">

    <h2>Pagar Factura</h2>
    <form id="formPagarFactura">
        <label for="idFacturaSelect">Selecciona la Factura Pendiente:</label>
        <select name="idFactura" id="idFacturaSelect" required>
            <option value="">-- Seleccionar Factura --</option>
            <?php while ($fact = $facturasResult->fetch_assoc()): ?>
                <option value="<?= $fact['idFactura'] ?>">
                    Factura N° <?= $fact['idFactura'] ?> — Total: $<?= number_format($fact['PrecioPagar'], 2) ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br><br>
        <button type="submit">Pagar y Generar Comprobante</button>
    </form>
    <div id="mensajePago" style="margin-top: 10px;"></div>

    <script src="../js/pagar_factura.js"></script>
</body>
</html>