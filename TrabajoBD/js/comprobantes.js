document.addEventListener("DOMContentLoaded", async () => {
    const mensajeDiv = document.getElementById("mensaje");
    const tabla = document.getElementById("tablaComprobantes");
    const cuerpo = document.getElementById("cuerpoComprobantes");

    try {
        const response = await fetch("../ver_comprobantes.php");
        const res = await response.json();

        if (res.success) {
            mensajeDiv.style.display = "none";
            tabla.style.display = "table";
            cuerpo.innerHTML = "";

            if (res.data.length === 0) {
                cuerpo.innerHTML = `<tr><td colspan="3">No tienes comprobantes registrados.</td></tr>`;
                return;
            }

            res.data.forEach(item => {
                cuerpo.innerHTML += `
                    <tr>
                        <td>${item.idComprobante}</td>
                        <td>${item.idFactura}</td>
                        <td>$${item.Monto}</td>
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