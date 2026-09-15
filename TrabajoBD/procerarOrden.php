<?php
session_start();
require_once '../config/conexion.php';

// Verificar que el usuario tenga sesión iniciada
if (!isset($_SESSION['idCliente'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idCliente = $_SESSION['idCliente'];
    $idProducto = intval($_POST['idProducto']);
    $cantProducto = intval($_POST['cantProducto']);
    $idProveedor = intval($_POST['idProveedor']); // Seleccionado o asignado

    // 1. Obtener precio actual y verificar stock
    $stmtProd = $conexion->prepare("SELECT Precio, Stock FROM productos WHERE IdProducto = ?");
    $stmtProd->bind_param("i", $idProducto);
    $stmtProd->execute();
    $resProd = $stmtProd->get_result();

    if ($resProd->num_rows > 0) {
        $prod = $resProd->fetch_assoc();
        
        if ($prod['Stock'] < $cantProducto) {
            die("Stock insuficiente para realizar la compra.");
        }

        $precioUnitario = $prod['Precio'];
        $precioTotal = $precioUnitario * $cantProducto;
        $fechaActual = date('Y-m-d');

        // Iniciar transacción SQL para garantizar integridad de datos
        $conexion->begin_transaction();

        try {
            // A. Insertar en orden_de_compra
            $stmtOrden = $conexion->prepare("INSERT INTO orden_de_compra (IdProducto, idCliente, CantProducto, FechaCompra) VALUES (?, ?, ?, ?)");
            $stmtOrden->bind_param("iiis", $idProducto, $idCliente, $cantProducto, $fechaActual);
            $stmtOrden->execute();
            $numOrden = $conexion->insert_id;

            // B. Actualizar stock del producto
            $stmtStock = $conexion->prepare("UPDATE productos SET Stock = Stock - ? WHERE IdProducto = ?");
            $stmtStock->bind_param("ii", $cantProducto, $idProducto);
            $stmtStock->execute();

            // C. Insertar en factura
            $stmtFactura = $conexion->prepare("INSERT INTO factura (PrecioPagar, idCliente, idProveedor, NumOrden) VALUES (?, ?, ?, ?)");
            $stmtFactura->bind_param("diii", $precioTotal, $idCliente, $idProveedor, $numOrden);
            $stmtFactura->execute();
            $idFactura = $conexion->insert_id;

            // D. Insertar en comprobante_de_pago
            $stmtComprobante = $conexion->prepare("INSERT INTO comprobante_de_pago (idCliente, idFactura) VALUES (?, ?)");
            $stmtComprobante->bind_param("ii", $idCliente, $idFactura);
            $stmtComprobante->execute();

            // Confirmar transacción
            $conexion->commit();
            header("Location: index.php?status=success");
            exit();

        } catch (Exception $e) {
            $conexion->rollback();
            echo "Error en el procesamiento de la compra: " . $e->getMessage();
        }
    } else {
        echo "El producto seleccionado no existe.";
    }
}
?>