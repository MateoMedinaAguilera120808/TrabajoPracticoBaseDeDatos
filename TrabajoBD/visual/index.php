<!doctype html>
<html lang="es"><head><script>window["_codeletBootstrap_"]=JSON.parse('{"A":"A","B":"20260831-05-891237f","C":{"Abril Fatface":"YACgEZbkUVE,0","Alfa Slab One":"YACgEYS9sJU,0","Anton":"YACgEcYqQ-A,0","Archivo":"YAHO2-t-jNE,0","Arial":"YAGyDvJ_4Ts,0","Bebas Neue":"YACgESME5ew,0","Bricolage Grotesque":"YAFyMcdwzpc,0","Canva Sans":"YAFLd8sKbwc,2","Caveat":"YALBs2ploWQ,0","Comic Sans MS":"YAHO2VMiyZo,0","Cormorant Garamond":"YAFdJhX-538,0","Courier New":"YAGzXiGs0_8,0","DM Sans":"YAD1aU3sLnI,0","DM Serif Display":"YAD1aYG82rc,0","Forum":"YACgEcnnqB4,0","Fraunces":"YAEul-FRQw4,0","Georgia":"YAGzXkO0pEM,0","Helvetica Neue":"YAFcf6CtJfI,0","Impact":"YAFcfnjI7Vk,0","Inter":"YAFdJvSyp_k,3","Iowan Old Style":"YAGNIFa8j9o,0","Jacques Francois":"YAHO2a5g66Q,0","JetBrains Mono":"YAFdJksXcAk,0","Libre Baskerville":"YACgEUFdPdA,0","Manrope":"YAHO2b2feC4,0","Merriweather":"YACgEXvHxxs,0","Montserrat":"YADLjI9qxTA,0","Nunito":"YACgEX8C5Gg,0","Oleo Script":"YACgEQQ14jI,0","Phantom Sans":"YAHO2E8Pb88,0","Playfair Display":"YACgEYmuCJE,0","Poppins":"YAFdJjbTu24,1","Press Start 2P":"YAFyGr-8pmQ,0","Quicksand":"YADWjpfPmdk,0","Raleway":"YACgEVg3xZg,0","Segoe UI":"YAHNdRD1Klw,0","Source Sans 3":"YAG4lO1Mj10,0","Spectral":"YAHO2rVUHIM,0","Times New Roman":"YAGzXW3gftg,0","Times":"YAGzXW3gftg,0","Ubuntu":"YACgERDU--Q,0","Work Sans":"YAGXhLOKv44,0","Yellowtail":"YACgEYG4kG4,0","ui-monospace":"YADlN8CFZ8Q,0","ui-sans-serif":"YACkoN-xg4g,0"}}');</script><script src="/_sdk/50d846425a1e5082.telemetry_sdk.js" integrity="sha512-Otbex+ztlVbcEGql0rXGd/3E3ee/hqAntg6DeuUEMG6pIPbXGOSvZbFZVzknAXi1tH/itQ+ijEhOTr2aWj6CXg=="></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hub de Compras</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <script src="https://cdn.jsdelivr.net/npm/lucide@0.263.0/dist/umd/lucide.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
  <style>
        body { font-family: 'Libre Franklin', sans-serif; }
        .tab-active { border-bottom: 2px solid #1e40af; color: #1e40af; font-weight: 600; }
        .section-hidden { display: none; }
        .doc-detail { display: none; }
        .doc-detail.open { display: block; }
        .row-toggle { cursor: pointer; }
        .row-toggle:hover { background: #f1f5f9; }
    </style>
  <script src="/_sdk/b3bf9e8ac58e6ad6.data_sdk.js" type="text/javascript" integrity="sha512-otc1u9NYq9Ms5Jt//7vmhrrqR5CLPr8Jdgs6741gqniClfLMcfmC+jK/cKuQdhLv6G0esJ/FzaMS9tv0T/vj/Q=="></script>
  <script src="/_sdk/2cfae6c35b9820dc.resizing_sdk.js" type="text/javascript" integrity="sha512-Oy+wKa9tloayelgS18tBfR707QfWMdeA8unVpm1M0/W/edVyjcRCNO6/jCvDwt/HpUta1v7sfMHiF1mAVr5RIA=="></script>
 </head>
 <body data-template-id="__page-root" class="min-h-screen w-full" style="background: rgb(255, 255, 255);">
  <header class="border-b border-gray-200 bg-white">
   <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    <div>
     <h1 data-template-id="main-title" class="canva-text font-bold" style="color: rgb(17, 24, 39); font-weight: 700; font-style: normal; font-size: 22px;">Hub de Compras</h1>
     <p data-template-id="main-subtitle" class="canva-text text-sm mt-0.5" style="color: rgb(107, 114, 128); font-weight: 400; font-style: normal; font-size: 14px;">Gestión de órdenes, facturas y comprobantes</p>
    </div>
   </div>
  </header>
  <main class="max-w-7xl mx-auto px-6 py-6">
   <!-- Tabs -->
   <nav class="flex gap-6 border-b border-gray-200 mb-6" role="tablist">
    <button class="tab-active pb-2 px-1 text-sm" data-tab="ordenes" role="tab" aria-selected="true">Órdenes de Compra</button> <button class="pb-2 px-1 text-sm text-gray-500" data-tab="facturas" role="tab" aria-selected="false">Facturas</button> <button class="pb-2 px-1 text-sm text-gray-500" data-tab="comprobantes" role="tab" aria-selected="false">Comprobantes</button>
   </nav><!-- Órdenes -->
   <section id="section-ordenes">
    <div class="flex justify-between items-center mb-4">
     <h2 data-template-id="ordenes-title" class="canva-text font-semibold" style="color: rgb(17, 24, 39); font-weight: 600; font-style: normal; font-size: 18px;">Órdenes de Compra</h2><button data-template-id="btn-nueva-orden" class="canva-button px-3 py-1.5 rounded text-sm font-medium flex items-center gap-1" onclick="toggleForm()" style="background: rgb(30, 64, 175); color: rgb(255, 255, 255); font-weight: 500; font-style: normal; font-size: 14px;">Nueva Orden</button>
    </div>
    <div id="order-form" class="hidden mb-5 p-4 border border-gray-200 rounded-lg bg-gray-50">
     <form onsubmit="submitOrder(event)" class="grid grid-cols-1 md:grid-cols-2 gap-3">
      <div><label for="proveedor" class="block text-xs font-medium text-gray-600 mb-1">Proveedor</label><select id="proveedor" class="w-full border border-gray-300 rounded px-2 py-1.5 text-sm"><option>Distribuidora Norte S.A.</option><option>Insumos del Sur</option><option>TechParts Ltda.</option></select>
      </div>
      <div><label for="item" class="block text-xs font-medium text-gray-600 mb-1">Ítem</label><input id="item" type="text" placeholder="Descripción" class="w-full border border-gray-300 rounded px-2 py-1.5 text-sm">
      </div>
      <div><label for="cantidad" class="block text-xs font-medium text-gray-600 mb-1">Cantidad</label><input id="cantidad" type="number" value="1" min="1" class="w-full border border-gray-300 rounded px-2 py-1.5 text-sm">
      </div>
      <div><label for="monto" class="block text-xs font-medium text-gray-600 mb-1">Monto</label><input id="monto" type="text" placeholder="$0.00" class="w-full border border-gray-300 rounded px-2 py-1.5 text-sm">
      </div>
      <div class="md:col-span-2 flex gap-2 justify-end"><button type="button" onclick="toggleForm()" class="px-3 py-1.5 text-sm border border-gray-300 rounded text-gray-600">Cancelar</button><button type="submit" class="px-3 py-1.5 text-sm rounded bg-blue-700 text-white">Crear</button>
      </div>
     </form>
    </div>
    <div id="ordenes-list" class="border border-gray-200 rounded-lg divide-y divide-gray-100 overflow-hidden"></div>
   </section><!-- Facturas -->
   <section id="section-facturas" class="section-hidden">
    <h2 data-template-id="facturas-title" class="canva-text font-semibold mb-4" style="color: rgb(17, 24, 39); font-weight: 600; font-style: normal; font-size: 18px;">Facturas</h2>
    <div id="facturas-list" class="border border-gray-200 rounded-lg divide-y divide-gray-100 overflow-hidden"></div>
   </section><!-- Comprobantes -->
   <section id="section-comprobantes" class="section-hidden">
    <h2 data-template-id="comprobantes-title" class="canva-text font-semibold mb-4" style="color: rgb(17, 24, 39); font-weight: 600; font-style: normal; font-size: 18px;">Comprobantes de Pago</h2>
    <div id="comprobantes-list" class="border border-gray-200 rounded-lg divide-y divide-gray-100 overflow-hidden"></div>
   </section>
  </main>
  <script src="/_sdk/0aac212797dcb9a6.editing_sdk.js" integrity="sha512-U1Z5TGB/MTX0fFSADhP7rVM3+UzJJjKTapiY1vm1cxcbcyWo4eBuCJNJO6zARJ5kHopP9UvWNtPszOqzRc1ICA=="></script>
  <script>
        lucide.createIcons();

        const orders = [
            { id: 'OC-2024-001', proveedor: 'Distribuidora Norte S.A.', cuit: '30-71234567-8', items: [{ desc: 'Resma Papel A4 80g', cant: 500, unit: '$90', total: '$45.000' }], subtotal: '$45.000', iva: '$9.450', total: '$54.450', estado: 'Enviada', fecha: '2026-06-25', condicion: 'Pago a 30 días' },
            { id: 'OC-2024-002', proveedor: 'Insumos del Sur', cuit: '30-65432198-4', items: [{ desc: 'Toner HP 26A Original', cant: 3, unit: '$26.167', total: '$78.500' }], subtotal: '$78.500', iva: '$16.485', total: '$94.985', estado: 'Facturada', fecha: '2026-06-22', condicion: 'Contado' },
            { id: 'OC-2024-003', proveedor: 'TechParts Ltda.', cuit: '30-98765432-1', items: [{ desc: 'Mouse Logitech M280', cant: 10, unit: '$12.000', total: '$120.000' }], subtotal: '$120.000', iva: '$25.200', total: '$145.200', estado: 'Pagada', fecha: '2026-06-18', condicion: 'Pago a 15 días' },
        ];

        const facturas = [
            { id: 'FAC-A-0001-00000201', proveedor: 'Insumos del Sur', cuit: '30-65432198-4', orden: 'OC-2024-002', items: [{ desc: 'Toner HP 26A Original', cant: 3, unit: '$26.167', total: '$78.500' }], subtotal: '$78.500', iva: '$16.485', total: '$94.985', fecha: '2026-06-24', vencimiento: '2026-07-24', estado: 'Pendiente', tipo: 'Factura A' },
            { id: 'FAC-A-0001-00000198', proveedor: 'TechParts Ltda.', cuit: '30-98765432-1', orden: 'OC-2024-003', items: [{ desc: 'Mouse Logitech M280', cant: 10, unit: '$12.000', total: '$120.000' }], subtotal: '$120.000', iva: '$25.200', total: '$145.200', fecha: '2026-06-20', vencimiento: '2026-07-05', estado: 'Pagada', tipo: 'Factura A' },
        ];

        const comprobantes = [
            { id: 'COMP-2024-055', factura: 'FAC-A-0001-00000198', proveedor: 'TechParts Ltda.', cuit: '30-98765432-1', monto: '$145.200', fecha: '2026-06-21', metodo: 'Transferencia bancaria', banco: 'Banco Nación', cbu: '011***4523', referencia: 'TRF-88291034' },
        ];

        function statusBadge(estado) {
            const map = { 'Enviada': 'bg-blue-50 text-blue-700 border-blue-200', 'Facturada': 'bg-yellow-50 text-yellow-700 border-yellow-200', 'Pagada': 'bg-green-50 text-green-700 border-green-200', 'Pendiente': 'bg-yellow-50 text-yellow-700 border-yellow-200' };
            return <span class="text-xs px-2 py-0.5 rounded border font-medium ${map[estado] || 'bg-gray-50 text-gray-600 border-gray-200'}">${estado}</span>;
        }

        function renderOrders() {
            const el = document.getElementById('ordenes-list');
            el.innerHTML = orders.map((o, i) => `
                <div>
                    <div class="row-toggle flex items-center justify-between px-4 py-3 text-sm" onclick="toggleDoc('ord-${i}')">
                        <div class="flex items-center gap-4">
                            <span class="font-mono font-medium text-gray-900">${o.id}</span>
                            <span class="text-gray-600">${o.proveedor}</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="font-medium">${o.total}</span>
                            ${statusBadge(o.estado)}
                            <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400"></i>
                        </div>
                    </div>
                    <div id="ord-${i}" class="doc-detail bg-white border-t border-gray-100 p-6">
                        <div class="max-w-2xl mx-auto border border-gray-300 rounded-lg p-6 bg-white shadow-sm">
                            <div class="flex justify-between items-start mb-6">
                                <div><p class="text-lg font-bold text-gray-900">ORDEN DE COMPRA</p><p class="text-sm text-gray-500 font-mono">${o.id}</p></div>
                                <div class="text-right text-sm text-gray-600"><p>Fecha: ${o.fecha}</p><p>Condición: ${o.condicion}</p></div>
                            </div>
                            <div class="mb-5 p-3 bg-gray-50 rounded text-sm"><p class="font-semibold text-gray-800">${o.proveedor}</p><p class="text-gray-500">CUIT: ${o.cuit}</p></div>
                            <table class="w-full text-sm mb-4">
                                <thead><tr class="border-b border-gray-200 text-gray-600"><th class="text-left py-2">Descripción</th><th class="text-right py-2">Cant.</th><th class="text-right py-2">P. Unit.</th><th class="text-right py-2">Total</th></tr></thead>
                                <tbody>${o.items.map(it => <tr class="border-b border-gray-100"><td class="py-2">${it.desc}</td><td class="text-right py-2">${it.cant}</td><td class="text-right py-2">${it.unit}</td><td class="text-right py-2 font-medium">${it.total}</td></tr>).join('')}</tbody>
                            </table>
                            <div class="flex justify-end"><div class="text-sm text-right space-y-1"><p>Subtotal: ${o.subtotal}</p><p>IVA 21%: ${o.iva}</p><p class="font-bold text-base text-gray-900">Total: ${o.total}</p></div></div>
                            <div class="mt-4 pt-3 border-t border-gray-200 flex justify-between items-center"><span class="text-xs text-gray-400">Estado: </span>${statusBadge(o.estado)}</div>
                        </div>
                    </div>
                </div>
            `).join('');
            lucide.createIcons();
        }

        function renderFacturas() {
            const el = document.getElementById('facturas-list');
            el.innerHTML = facturas.map((f, i) => `
                <div>
                    <div class="row-toggle flex items-center justify-between px-4 py-3 text-sm" onclick="toggleDoc('fac-${i}')">
                        <div class="flex items-center gap-4">
                            <span class="font-mono font-medium text-gray-900">${f.id}</span>
                            <span class="text-gray-600">${f.proveedor}</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="font-medium">${f.total}</span>
                            ${statusBadge(f.estado)}
                            <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400"></i>
                        </div>
                    </div>
                    <div id="fac-${i}" class="doc-detail bg-white border-t border-gray-100 p-6">
                        <div class="max-w-2xl mx-auto border border-gray-300 rounded-lg p-6 bg-white shadow-sm">
                            <div class="flex justify-between items-start mb-6">
                                <div><p class="text-lg font-bold text-gray-900">${f.tipo}</p><p class="text-sm text-gray-500 font-mono">${f.id}</p></div>
                                <div class="text-right text-sm text-gray-600"><p>Emisión: ${f.fecha}</p><p>Vto: ${f.vencimiento}</p><p>Orden: ${f.orden}</p></div>
                            </div>
                            <div class="mb-5 p-3 bg-gray-50 rounded text-sm"><p class="font-semibold text-gray-800">${f.proveedor}</p><p class="text-gray-500">CUIT: ${f.cuit}</p></div>
                            <table class="w-full text-sm mb-4">
                                <thead><tr class="border-b border-gray-200 text-gray-600"><th class="text-left py-2">Descripción</th><th class="text-right py-2">Cant.</th><th class="text-right py-2">P. Unit.</th><th class="text-right py-2">Total</th></tr></thead>
                                <tbody>${f.items.map(it => <tr class="border-b border-gray-100"><td class="py-2">${it.desc}</td><td class="text-right py-2">${it.cant}</td><td class="text-right py-2">${it.unit}</td><td class="text-right py-2 font-medium">${it.total}</td></tr>).join('')}</tbody>
                            </table>
                            <div class="flex justify-end"><div class="text-sm text-right space-y-1"><p>Subtotal: ${f.subtotal}</p><p>IVA 21%: ${f.iva}</p><p class="font-bold text-base text-gray-900">Total: ${f.total}</p></div></div>
                            <div class="mt-4 pt-3 border-t border-gray-200 flex justify-between items-center"><span class="text-xs text-gray-400">Estado: </span>${statusBadge(f.estado)}</div>
                        </div>
                    </div>
                </div>
            `).join('');
            lucide.createIcons();
        }

        function renderComprobantes() {
            const el = document.getElementById('comprobantes-list');
            el.innerHTML = comprobantes.map((c, i) => `
                <div>
                    <div class="row-toggle flex items-center justify-between px-4 py-3 text-sm" onclick="toggleDoc('comp-${i}')">
                        <div class="flex items-center gap-4">
                            <span class="font-mono font-medium text-gray-900">${c.id}</span>
                            <span class="text-gray-600">${c.proveedor}</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="font-medium">${c.monto}</span>
                            <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400"></i>
                        </div>
                    </div>
                    <div id="comp-${i}" class="doc-detail bg-white border-t border-gray-100 p-6">
                        <div class="max-w-2xl mx-auto border border-gray-300 rounded-lg p-6 bg-white shadow-sm">
                            <div class="flex justify-between items-start mb-6">
                                <div><p class="text-lg font-bold text-gray-900">COMPROBANTE DE PAGO</p><p class="text-sm text-gray-500 font-mono">${c.id}</p></div>
                                <div class="text-right text-sm text-gray-600"><p>Fecha: ${c.fecha}</p></div>
                            </div>
                            <div class="mb-5 p-3 bg-gray-50 rounded text-sm"><p class="font-semibold text-gray-800">${c.proveedor}</p><p class="text-gray-500">CUIT: ${c.cuit}</p></div>
                            <div class="grid grid-cols-2 gap-4 text-sm mb-4">
                                <div><p class="text-gray-500">Factura asociada</p><p class="font-medium">${c.factura}</p></div>
                                <div><p class="text-gray-500">Método de pago</p><p class="font-medium">${c.metodo}</p></div>
                                <div><p class="text-gray-500">Banco</p><p class="font-medium">${c.banco}</p></div>
                                <div><p class="text-gray-500">CBU</p><p class="font-mono font-medium">${c.cbu}</p></div>
                                <div><p class="text-gray-500">Referencia</p><p class="font-mono font-medium">${c.referencia}</p></div>
                            </div>
                            <div class="pt-4 border-t border-gray-200 flex justify-end"><p class="text-xl font-bold text-gray-900">${c.monto}</p></div>
                        </div>
                    </div>
                </div>
            `).join('');
            lucide.createIcons();
        }

        function toggleDoc(id) {
            const el = document.getElementById(id);
            el.classList.toggle('open');
        }

        // Tabs
        document.querySelectorAll('[data-tab]').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('[data-tab]').forEach(b => { b.classList.remove('tab-active'); b.classList.add('text-gray-500'); b.setAttribute('aria-selected', 'false'); });
                btn.classList.add('tab-active'); btn.classList.remove('text-gray-500'); btn.setAttribute('aria-selected', 'true');
                document.querySelectorAll('[id^="section-"]').forEach(s => s.classList.add('section-hidden'));
                document.getElementById('section-' + btn.dataset.tab).classList.remove('section-hidden');
            });
        });

        function toggleForm() { document.getElementById('order-form').classList.toggle('hidden'); }

        function submitOrder(e) {
            e.preventDefault();
            const item = document.getElementById('item').value || 'Nuevo ítem';
            const prov = document.getElementById('proveedor').value;
            const monto = document.getElementById('monto').value || '$0';
            const cant = parseInt(document.getElementById('cantidad').value) || 1;
            orders.unshift({ id: OC-2024-${String(orders.length + 1).padStart(3, '0')}, proveedor: prov, cuit: '30-00000000-0', items: [{ desc: item, cant, unit: monto, total: monto }], subtotal: monto, iva: '-', total: monto, estado: 'Enviada', fecha: new Date().toISOString().split('T')[0], condicion: 'A definir' });
            renderOrders();
            toggleForm();
            e.target.reset();
        }

        renderOrders();
        renderFacturas();
        renderComprobantes();
    </script>
 
</body></html>