/* ==========================================================================
   CARRITO DE COMPRAS – BIOFARMA
   Logica 100% visual (frontend). No conecta con PHP ni base de datos.
   Cuando el backend este listo, este archivo puede sustituirse o
   adaptarse para consumir los datos reales via fetch/AJAX.
   ========================================================================== */

document.addEventListener("DOMContentLoaded", function () {

    const contenedorCards   = document.getElementById("cards-container");
    const carritoVacioBox   = document.getElementById("carritoVacio");
    const carritoConItems   = document.getElementById("carritoConItems");
    const contadorItems     = document.getElementById("contadorItems");

    // Elementos del resumen
    const elSubtotal = document.getElementById("resumenSubtotal");
    const elImpuesto = document.getElementById("resumenImpuesto");
    const elEnvio    = document.getElementById("resumenEnvio");
    const elDescuento = document.getElementById("resumenDescuento");
    const elTotal     = document.getElementById("resumenTotal");

    const TASA_IMPUESTO = 0.07;   // 7% simulado (ITBMS)
    const COSTO_ENVIO_BASE = 3.50; // simulado
    let idProductoAEliminar = null;

    /* ----------------------------------------------------------------
       Recalcula subtotal, impuesto, envio, descuento y total
       Basado en las product-card visibles en el DOM (data-precio y data-cantidad)
    ---------------------------------------------------------------- */
    function recalcularTotales() {
        const cards = document.querySelectorAll(".product-card");
        let subtotal = 0;

        cards.forEach(card => {
            const precio = parseFloat(card.dataset.precio);
            const cantidad = parseInt(card.querySelector(".qty-valor").textContent, 10);
            const sub = precio * cantidad;
            card.querySelector(".js-subtotal-item").textContent = "$" + sub.toFixed(2);
            subtotal += sub;
        });

        const descuento = subtotal > 50 ? subtotal * 0.10 : 0; // simulado: 10% si subtotal > $50
        const impuesto = subtotal * TASA_IMPUESTO;
        const envio = cards.length === 0 ? 0 : (subtotal > 30 ? 0 : COSTO_ENVIO_BASE);
        const total = subtotal + impuesto + envio - descuento;

        if (elSubtotal)  elSubtotal.textContent  = "$" + subtotal.toFixed(2);
        if (elImpuesto)  elImpuesto.textContent  = "$" + impuesto.toFixed(2);
        if (elEnvio)     elEnvio.textContent     = envio === 0 ? "Gratis" : "$" + envio.toFixed(2);
        if (elDescuento) elDescuento.textContent = "-$" + descuento.toFixed(2);
        if (elTotal)     elTotal.textContent     = "$" + total.toFixed(2);

        if (contadorItems) {
            const totalUnidades = Array.from(cards).reduce((acc, card) => {
                return acc + parseInt(card.querySelector(".qty-valor").textContent, 10);
            }, 0);
            contadorItems.textContent = totalUnidades + (totalUnidades === 1 ? " producto" : " productos");
        }

        actualizarVisibilidadCarrito();
    }

    /* ----------------------------------------------------------------
       Muestra el estado "carrito vacio" o el contenido, segun corresponda
    ---------------------------------------------------------------- */
    function actualizarVisibilidadCarrito() {
        const hayProductos = document.querySelectorAll(".product-card").length > 0;
        if (carritoVacioBox && carritoConItems) {
            carritoVacioBox.style.display = hayProductos ? "none" : "block";
            carritoConItems.style.display = hayProductos ? "flex" : "none";
        }
    }

    /* ----------------------------------------------------------------
       Botones + / - de cantidad (solo visual, respeta stock simulado)
    ---------------------------------------------------------------- */
    document.addEventListener("click", function (e) {

        const btnMas = e.target.closest(".js-qty-mas");
        const btnMenos = e.target.closest(".js-qty-menos");

        if (btnMas) {
            const card = btnMas.closest(".product-card");
            const qtyEl = card.querySelector(".qty-valor");
            const stock = parseInt(card.dataset.stock, 10);
            let cantidad = parseInt(qtyEl.textContent, 10);

            if (cantidad < stock) {
                cantidad++;
                qtyEl.textContent = cantidad;
            }
            actualizarEstadoBotones(card);
            recalcularTotales();
        }

        if (btnMenos) {
            const card = btnMenos.closest(".product-card");
            const qtyEl = card.querySelector(".qty-valor");
            let cantidad = parseInt(qtyEl.textContent, 10);

            if (cantidad > 1) {
                cantidad--;
                qtyEl.textContent = cantidad;
            }
            actualizarEstadoBotones(card);
            recalcularTotales();
        }

        /* ------------------------------------------------------------
           Boton eliminar -> abre modal de confirmacion
        ------------------------------------------------------------ */
        const btnEliminar = e.target.closest(".js-eliminar-item");
        if (btnEliminar) {
            const card = btnEliminar.closest(".product-card");
            idProductoAEliminar = card.dataset.id;

            const nombreProducto = card.querySelector(".js-nombre-producto").textContent;
            const spanNombre = document.getElementById("modalEliminarNombre");
            if (spanNombre) spanNombre.textContent = nombreProducto;

            const modalEl = document.getElementById("modalEliminarProducto");
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    });

    function actualizarEstadoBotones(card) {
        const qtyEl = card.querySelector(".qty-valor");
        const stock = parseInt(card.dataset.stock, 10);
        const cantidad = parseInt(qtyEl.textContent, 10);

        card.querySelector(".js-qty-menos").disabled = cantidad <= 1;
        card.querySelector(".js-qty-mas").disabled = cantidad >= stock;
    }

    // Inicializa el estado de los botones +/- al cargar
    document.querySelectorAll(".product-card").forEach(actualizarEstadoBotones);

    /* ----------------------------------------------------------------
       Confirmar eliminacion desde el modal
    ---------------------------------------------------------------- */
    const btnConfirmarEliminar = document.getElementById("btnConfirmarEliminar");
    if (btnConfirmarEliminar) {
        btnConfirmarEliminar.addEventListener("click", function () {
            if (!idProductoAEliminar) return;

            const card = document.querySelector('.product-card[data-id="' + idProductoAEliminar + '"]');
            if (card) {
                card.classList.add("item-saliendo");
                card.addEventListener("animationend", function () {
                    card.remove();
                    recalcularTotales();
                }, { once: true });
            }

            const modalEl = document.getElementById("modalEliminarProducto");
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.hide();
            idProductoAEliminar = null;
        });
    }

    /* ----------------------------------------------------------------
       Cupon de descuento (solo visual / simulado)
    ---------------------------------------------------------------- */
    const btnCupon = document.getElementById("btnAplicarCupon");
    if (btnCupon) {
        btnCupon.addEventListener("click", function () {
            const input = document.getElementById("inputCupon");
            if (input && input.value.trim() !== "") {
                input.classList.add("is-valid");
                setTimeout(() => input.classList.remove("is-valid"), 2000);
            }
        });
    }

    /* ----------------------------------------------------------------
       Boton "Proceder al pago" (placeholder, sin backend)
    ---------------------------------------------------------------- */
    const btnProcederPago = document.getElementById("btnProcederPago");
    if (btnProcederPago) {
        btnProcederPago.addEventListener("click", function (e) {
            e.preventDefault();
            // TODO (backend): redirigir al flujo de pago / checkout.php
            alert("Funcionalidad de pago pendiente de conectar con el backend.");
        });
    }

    // Calculo inicial al cargar la pagina
    recalcularTotales();
});
