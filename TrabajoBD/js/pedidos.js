document.addEventListener("DOMContentLoaded", async () => {
    const mensajeDiv = document.getElementById("mensaje");
    const tabla = document.getElementById("tablaPedidos");
    const cuerpo = document.getElementById("cuerpoPedidos");

    try {
        const response = await fetch("../ver_pedidos.php");
        const res = await response.json();

        if (res.success) {
            mensajeDiv.style.display = "none";
            tabla.style.display = "table";
            cuerpo.innerHTML = "";

            if (res.data.length === 0) {
                cuerpo.innerHTML = `<tr><td colspan="4">No tienes pedidos realizados.</td></tr>`;
                return;
            }

            res.data.forEach(item => {
                cuerpo.innerHTML += `
                    <tr>
                        <td>${item.NumOrden}</td>
                        <td>${item.NombreProducto}</td>
                        <td>${item.CantProducto}</td>
                        <td>${item.FechaCompra}</td>
                    </tr>`;
            });
        } else {
            mensajeDiv.style.color = "red";
            mensajeDiv.textContent = res.msj;
        }
    } catch (err) {
        mensajeDiv.style.color = "red";
        mensajeDiv.textContent = "Error al conectar con el servidor.";
        console.error(err);
    }
});