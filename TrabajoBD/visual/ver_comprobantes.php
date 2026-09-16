<?php
session_start();
if (!isset($_SESSION['idCliente'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Comprobantes</title>
</head>
<body>

    <nav>
        <a href="index.php">Volver al Inicio</a> | 
        <a href="ver_facturas.php">Ver Mis Facturas</a> | 
        <a href="../logout.php">Cerrar Sesión</a>
    </nav>

    <h2>Mis Comprobantes de Pago</h2>

    <div id="mensaje">Cargando comprobantes...</div>

    <table border="1" id="tablaComprobantes" style="display:none; margin-top:15px; width:100%;">
        <thead>
            <tr>
                <th>N° Pago / Comprobante</th>
                <th>N° Factura</th>
                <th>Monto Pagado</th>
            </tr>
        </thead>
        <tbody id="cuerpoComprobantes"></tbody>
    </table>

    <script src="../js/comprobantes.js"></script>
</body>
</html>