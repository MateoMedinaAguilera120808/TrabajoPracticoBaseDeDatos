<?php
session_start();
require_once '../config/conexion.php';

if (!isset($_SESSION['idCliente'])) {
    header("Location: login.php");
    exit();
}

$idCliente = $_SESSION['idCliente'];

// Cargar productos para el selector
$productosResult = $conexion->query("SELECT IdProducto, NombreProducto, Precio, Stock FROM productos WHERE Stock > 0");
// Cargar proveedores
$proveedoresResult = $conexion->query("SELECT idProveedor, NombreProveedor FROM Proveedores");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Compras</title>
</head>
<body>

    <nav>
        <a href="ver_facturas.php">Ver Mis Facturas</a> | 
        <a href="ver_comprobantes.php">Ver Mis Comprobantes</a> | 
        <a href="logout.php">Cerrar Sesión</a>
    </nav>

    <h2>Nueva Orden de Compra</h2>

    <form action="procesar_orden.php" method="POST">
        <label for="idProducto">Producto:</label>
        <select name="idProducto" id="idProducto" required>
            <?php while ($prod = $productosResult->fetch_assoc()): ?>
                <option value="<?= $prod['IdProducto'] ?>">
                    <?= htmlspecialchars($prod['NombreProducto']) ?> - $<?= $prod['Precio'] ?> (Stock: <?= $prod['Stock'] ?>)
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

</body>
</html>