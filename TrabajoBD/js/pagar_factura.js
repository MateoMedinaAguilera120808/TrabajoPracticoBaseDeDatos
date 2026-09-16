document.addEventListener("DOMContentLoaded", () => {
    const formPagar = document.getElementById("formPagarFactura");
    const mensajePago = document.getElementById("mensajePago");

    if (!formPagar) return;

    formPagar.addEventListener("submit", async (e) => {
        e.preventDefault();

        const formData = new FormData(formPagar);

        if (!formData.get("idFactura")) {
            mensajePago.style.color = "red";
            mensajePago.textContent = "Por favor selecciona una factura.";
            return;
        }

        try {
            const response = await fetch("../pagar_factura.php", {
                method: "POST",
                body: formData
            });

            // Leer respuesta en texto en caso de que PHP devuelva un error no-JSON
            const textResponse = await response.text();
            
            let data;
            try {
                data = JSON.parse(textResponse);
            } catch (jsonErr) {
                console.error("Respuesta del servidor no es un JSON válido:", textResponse);
                mensajePago.style.color = "red";
                mensajePago.textContent = "Error interno en el servidor PHP.";
                return;
            }

            if (data.success) {
                mensajePago.style.color = "green";
                mensajePago.textContent = data.msj;

                setTimeout(() => {
                    window.location.href = "ver_comprobantes.php";
                }, 1200);
            } else {
                mensajePago.style.color = "red";
                mensajePago.textContent = data.msj;
            }
        } catch (err) {
            mensajePago.style.color = "red";
            mensajePago.textContent = "Error de conexión con el servidor.";
            console.error("Error en petición AJAX:", err);
        }
    });
});