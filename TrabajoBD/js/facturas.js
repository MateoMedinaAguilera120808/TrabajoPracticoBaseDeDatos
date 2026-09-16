document.addEventListener("DOMContentLoaded", async () => {
    const mensajeDiv = document.getElementById("mensaje");
    const tabla = document.getElementById("tablaFacturas");
    const cuerpo = document.getElementById("cuerpoFacturas");

    try {
        // Llama al PHP que está en la raíz
        const response = await fetch("../ver_facturas.php");
        const res = await response.json();

        if (res.success) {
            mensajeDiv.style.display = "none";
            tabla.style.display = "table";
            cuerpo.innerHTML = "";

            if (res.data.length === 0) {
                cuerpo.innerHTML = `<tr><td colspan="4">No tienes facturas registradas.</td></tr>`;
                return;
            }

            res.data.forEach(item => {
                cuerpo.innerHTML += `
                    <tr>
                        <td>${item.idFactura}</td>
                        <td>${item.Fecha}</td>
                        <td>$${item.Total}</td>
                        <td>${item.Estado}</td>
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