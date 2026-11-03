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
    <title>Mis Facturas</title>
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>

    <nav>
        <a href="index.php">Volver al Inicio</a> | 
        <a href="ver_comprobantes.php">Ver Mis Comprobantes</a> | 
        <a href="../logout.php">Cerrar Sesión</a>
    </nav>

    <h2>Mis Facturas</h2>

    <div id="mensaje">Cargando facturas...</div>

    <table border="1" id="tablaFacturas" style="display:none; margin-top:15px; width:100%;">
        <thead>
            <tr>
                <th>N° Factura</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody id="cuerpoFacturas"></tbody>
    </table>

    <script src="../js/facturas.js"></script>
</body>
</html>