<?php
session_start();
if (!isset($_SESSION['idCliente'])) {
    header("Location: logIn.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos</title>
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>

    <nav>
        <a href="index.php">Volver al Inicio</a> | 
        <a href="ver_facturas.php">Ver Mis Facturas</a> | 
        <a href="ver_comprobantes.php">Ver Mis Comprobantes</a> | 
        <a href="../logout.php">Cerrar Sesión</a>
    </nav>

    <h2>Mis Pedidos de Compra</h2>

    <div id="mensaje">Cargando pedidos...</div>

    <table border="1" id="tablaPedidos" style="display:none; margin-top:15px; width:100%;">
        <thead>
            <tr>
                <th>N° Orden</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha de Compra</th>
            </tr>
        </thead>
        <tbody id="cuerpoPedidos"></tbody>
    </table>

    <script src="../js/pedidos.js"></script>
</body>
</html>