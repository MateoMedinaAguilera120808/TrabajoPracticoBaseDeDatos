<?php
session_start();
require_once 'config/conexion.php';

// Verificar sesión
if (!isset($_SESSION['idCliente'])) {
    header("Location: visual/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idCliente    = $_SESSION['idCliente'];
    $idProducto   = intval($_POST['idProducto'] ?? 0);
    $cantProducto = intval($_POST['cantProducto'] ?? 0);
    $idProveedor  = intval($_POST['idProveedor'] ?? 0);

    if ($idProducto <= 0 || $cantProducto <= 0 || $idProveedor <= 0) {
        die("Error: Datos de la orden incompletos.");
    }

    // 1. Obtener precio y stock actual del producto
    $stmtProd = $conexion->prepare("SELECT Precio, Stock FROM productos WHERE IdProducto = ?");
    $stmtProd->bind_param("i", $idProducto);
    $stmtProd->execute();
    $resProd = $stmtProd->get_result();

    if ($resProd->num_rows === 0) {
        die("Error: El producto seleccionado no existe.");
    }

    $prod = $resProd->fetch_assoc();
    $precioUnitario = $prod['Precio'];
    $stockActual    = $prod['Stock'];

    if ($cantProducto > $stockActual) {
        die("Error: No hay suficiente stock disponible.");
    }

    $totalCalculado = $precioUnitario * $cantProducto;
    $fechaActual    = date("Y-m-d H:i:s");

    // Iniciar Transacción
    $conexion->begin_transaction();

    try {
        // 2. Descontar Stock
        $stmtStock = $conexion->prepare("UPDATE productos SET Stock = Stock - ? WHERE IdProducto = ?");
        $stmtStock->bind_param("ii", $cantProducto, $idProducto);
        $stmtStock->execute();

        // 3. Crear Orden de Compra (orden_de_compra)
        $stmtOrden = $conexion->prepare("INSERT INTO orden_de_compra (IdProducto, idCliente, CantProducto, FechaCompra) VALUES (?, ?, ?, ?)");
        $stmtOrden->bind_param("iiis", $idProducto, $idCliente, $cantProducto, $fechaActual);
        $stmtOrden->execute();

        // Obtener el NumOrden generado automáticamente
        $numOrden = $conexion->insert_id;

        // 4. Crear Factura vinculada a la Orden de Compra (factura)
        $stmtFactura = $conexion->prepare("INSERT INTO factura (PrecioPagar, idCliente, idProveedor, NumOrden) VALUES (?, ?, ?, ?)");
        $stmtFactura->bind_param("diii", $totalCalculado, $idCliente, $idProveedor, $numOrden);
        $stmtFactura->execute();

        // Confirmar transacción en MySQL
        $conexion->commit();

        // Redirigir a ver facturas
        header("Location: visual/ver_facturas.php");
        exit();

    } catch (Exception $e) {
        $conexion->rollback();
        echo "Error al procesar la orden: " . $e->getMessage();
    }

} else {
    header("Location: visual/index.php");
    exit();
}
?>