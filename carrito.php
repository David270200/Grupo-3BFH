


<?php

session_start();

$con = mysqli_connect("localhost","root","","semestral");

$productosCarrito = [];
/* ==========================================================================
   CARRITO DE COMPRAS – BIOFARMA
   --------------------------------------------------------------------------
   Este archivo contiene UNICAMENTE la estructura visual del carrito.
   No hay conexion a base de datos, consultas SQL, sesiones ni logica
   de negocio. Los productos que se muestran abajo son datos simulados
   ($productosCarrito) organizados para que sea sencillo reemplazarlos
   por un arreglo obtenido desde MySQL (por ejemplo, desde la sesion
   del usuario o una consulta a la tabla `carrito`).

   Para conectar el backend, el siguiente desarrollador solo debe:
   1) Reemplazar el arreglo $productosCarrito por los datos reales
      (sesion, base de datos, etc.).
   2) El bloque <?php foreach ($productosCarrito as $item): ?> ya esta
      preparado para recorrer datos reales sin tocar el HTML/CSS.
   3) Conectar los botones con id="btnProcederPago", los data-id de
      cada .product-card, y el formulario de cupon si se requiere.
   ========================================================================== */

// -----------------------------------------------------------------------
// DATOS SIMULADOS (reemplazar por datos reales de PHP/MySQL)
// -----------------------------------------------------------------------
if(isset($_SESSION["carrito"])){

    foreach($_SESSION["carrito"] as $id => $cantidad){

        $sql = "SELECT * FROM productos WHERE ID = $id";
        $resultado = mysqli_query($con,$sql);

        if($fila = mysqli_fetch_assoc($resultado)){

            $fila["cantidad"] = $cantidad;

            $productosCarrito[] = [
                "id"        => $fila["ID"],
                "nombre"    => $fila["NOMBRE"],
                "categoria" => $fila["CATEGORIA"],
                "imagen"    => $fila["IMAGEN"],
                "precio"    => $fila["PRECIO"],
                "cantidad"  => $cantidad,
                "stock"     => $fila["STOCK"]
            ];

        }
    }
}

// Cambiar a [] para previsualizar el estado de "carrito vacio"
// $productosCarrito = [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras | Hospital BioFarma</title>
    <link rel="shortcut icon" type="image/png" href="img/Logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/carrito.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="index.html">
            <img src="img/Logo.png" alt="BioFarma" height="52">
            <span class="brand-name">Bio<span class="brand-accent">Farma</span></span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item"><a class="nav-link fw-semibold" href="index.html"><i class="fas fa-home me-1"></i>Inicio</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold" href="servicios.html"><i class="fas fa-heartbeat me-1"></i>Servicios</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold" href="Doctores.html"><i class="fas fa-user-md me-1"></i>Doctores</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold" href="productos.html"><i class="fas fa-pills me-1"></i>Productos</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold" href="noticias.html"><i class="fas fa-newspaper me-1"></i>Noticias</a></li>
                <a class="nav-link fw-semibold" href="#" onclick="document.getElementById('modalLogin').style.display='flex'; return false;">
                    Iniciar Sesion
                </a>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-biofarma position-relative" href="carrito.php">
                        <i class="fas fa-shopping-cart me-1"></i>Carrito
                        <span id="badgeCarritoNav" class="badge rounded-pill bg-danger position-absolute top-0 start-100 translate-middle" style="font-size:0.65rem;">
                            <?php echo count($productosCarrito); ?>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="page-banner">
    <div class="container">
        <h1><i class="fas fa-shopping-cart me-3"></i>Tu Carrito de Compras</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.html" class="text-white">Inicio</a></li>
                <li class="breadcrumb-item"><a href="productos.html" class="text-white">Productos</a></li>
                <li class="breadcrumb-item active text-white-50">Carrito</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">

        <?php if (count($productosCarrito) > 0): ?>

        <div class="carrito-header">
            <h1><i class="fas fa-shopping-basket"></i>Mis Productos <span class="contador-items" id="contadorItems"></span></h1>
            <a href="productos.html" class="link-seguir-comprando"><i class="fas fa-arrow-left"></i>Seguir comprando</a>
        </div>

        <?php endif; ?>

        <!-- ====================================================
             ESTADO: CARRITO VACIO (oculto por JS si hay productos)
        ==================================================== -->
        <div class="carrito-vacio" id="carritoVacio" style="display:none;">
            <div class="carrito-vacio-icono">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <h2>Tu carrito esta vacio</h2>
            <p>Aun no has agregado productos. Explora nuestro catalogo de medicamentos y productos de salud.</p>
            <a href="productos.html" class="btn btn-biofarma"><i class="fas fa-pills me-2"></i>Ir a la tienda</a>
        </div>

        <!-- ====================================================
             ESTADO: CARRITO CON PRODUCTOS
        ==================================================== -->
        <div class="row g-4" id="carritoConItems" style="display:none;">

            <!-- ============ COLUMNA IZQUIERDA (70%) ============ -->
            <div class="col-lg-8">
                <div id="cards-container">
                    <?php foreach ($productosCarrito as $item): ?>
                    <?php
                        $stockBajo = $item["stock"] <= 5;
                        $subtotalItem = $item["precio"] * $item["cantidad"];
                    ?>
                    <div class="product-card cart-item-card"
                         id="item-<?php echo htmlspecialchars($item['id']); ?>"
                         data-id="<?php echo htmlspecialchars($item['id']); ?>"
                         data-precio="<?php echo htmlspecialchars($item['precio']); ?>"
                         data-stock="<?php echo htmlspecialchars($item['stock']); ?>">

                        <div class="cart-item-img">
                            <img src="<?php echo htmlspecialchars($item['imagen']); ?>" alt="<?php echo htmlspecialchars($item['nombre']); ?>">
                        </div>

                        <div class="cart-item-info">
                            <span class="producto-cat"><?php echo htmlspecialchars($item['categoria']); ?></span>
                            <h3 class="js-nombre-producto"><?php echo htmlspecialchars($item['nombre']); ?></h3>

                            <div class="cart-item-precio-unit">
                                Precio unitario: <strong>$<?php echo number_format($item['precio'], 2); ?></strong>
                            </div>

                            <div class="cart-item-stock <?php echo $stockBajo ? 'stock-bajo' : ''; ?>">
                                <i class="fas fa-<?php echo $stockBajo ? 'exclamation-circle' : 'check-circle'; ?>"></i>
                                <?php echo $stockBajo ? '¡Solo quedan ' . $item['stock'] . ' unidades!' : $item['stock'] . ' unidades disponibles'; ?>
                            </div>

                            <button type="button" class="btn-eliminar-item js-eliminar-item" id="btnEliminar-<?php echo htmlspecialchars($item['id']); ?>">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </div>

                        <div class="cart-item-controles">
                            <div class="qty-control">
                                <button type="button" class="qty-btn js-qty-menos" id="btnMenos-<?php echo htmlspecialchars($item['id']); ?>" aria-label="Disminuir cantidad">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <span class="qty-valor" id="qtyValor-<?php echo htmlspecialchars($item['id']); ?>"><?php echo (int) $item['cantidad']; ?></span>
                                <button type="button" class="qty-btn js-qty-mas" id="btnMas-<?php echo htmlspecialchars($item['id']); ?>" aria-label="Aumentar cantidad">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="cart-item-subtotal">
                            <span class="label">Subtotal</span>
                            <span class="valor js-subtotal-item" id="subtotal-<?php echo htmlspecialchars($item['id']); ?>">
                                $<?php echo number_format($subtotalItem, 2); ?>
                            </span>
                        </div>

                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="farmacia-aviso mt-2">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Aviso importante:</strong> Consulte siempre a un profesional de la salud antes de adquirir o consumir cualquier medicamento.
                </div>
            </div>

            <!-- ============ COLUMNA DERECHA (30%) ============ -->
            <div class="col-lg-4">
                <div class="resumen-compra">
                    <h3><i class="fas fa-receipt"></i>Resumen de Compra</h3>

                    <div class="resumen-fila">
                        <span>Subtotal</span>
                        <span id="resumenSubtotal">$0.00</span>
                    </div>
                    <div class="resumen-fila">
                        <span>Impuestos (ITBMS 7%)</span>
                        <span id="resumenImpuesto">$0.00</span>
                    </div>
                    <div class="resumen-fila envio">
                        <span>Envio</span>
                        <span id="resumenEnvio">$0.00</span>
                    </div>
                    <div class="resumen-fila descuento">
                        <span>Descuento</span>
                        <span id="resumenDescuento">-$0.00</span>
                    </div>

                    <hr class="resumen-divider">

                    <div class="resumen-total">
                        <span class="label">Total</span>
                        <span class="valor" id="resumenTotal">$0.00</span>
                    </div>

                    <!-- Cupon de descuento (simulado, sin conexion) -->
                    <div class="cupon-box">
                        <input type="text" id="inputCupon" name="cupon" placeholder="Codigo de cupon">
                        <button type="button" class="btn-aplicar-cupon" id="btnAplicarCupon">Aplicar</button>
                    </div>

                    <button type="button" class="btn-proceder-pago" id="btnProcederPago" name="btnProcederPago">
                        <i class="fas fa-lock"></i> Proceder al Pago
                    </button>

                    <a href="productos.html" class="btn-seguir-comprando-full">
                        <i class="fas fa-arrow-left"></i> Seguir Comprando
                    </a>

                    <div class="resumen-seguro">
                        <i class="fas fa-shield-alt"></i> Compra 100% segura y protegida
                    </div>

                    <div class="metodos-pago">
                        <i class="fab fa-cc-visa"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-paypal"></i>
                        <i class="fab fa-cc-amex"></i>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ====================================================
     MODAL: CONFIRMAR ELIMINACION DE PRODUCTO
==================================================== -->
<div class="modal fade modal-eliminar" id="modalEliminarProducto" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-eliminar-icono">
                    <i class="fas fa-trash-alt"></i>
                </div>
                <h5 id="modalEliminarLabel">¿Eliminar este producto?</h5>
                <p>¿Deseas eliminar <strong id="modalEliminarNombre">este producto</strong> de tu carrito de compras?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-modal-cancelar" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn-modal-eliminar-confirmar" id="btnConfirmarEliminar">
                    <i class="fas fa-trash-alt me-1"></i> Eliminar
                </button>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row g-4 py-5">
            <div class="col-md-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <img src="img/Logo.png" alt="Logo" height="45">
                    <span class="footer-brand">Bio<span>Farma</span></span>
                </div>
                <p class="footer-desc">Brindando atencion medica de calidad con tecnologia de vanguardia y profesionales comprometidos con tu salud.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <h6 class="footer-title">Navegacion</h6>
                <ul class="footer-links">
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="servicios.html">Servicios</a></li>
                    <li><a href="Doctores.html">Doctores</a></li>
                    <li><a href="productos.html">Productos</a></li>
                    <li><a href="noticias.html">Noticias</a></li>
                    <li><a href="contacto.html">Contacto</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-6">
                <h6 class="footer-title">Servicios</h6>
                <ul class="footer-links">
                    <li><a href="servicios.html">Laboratorio Clinico</a></li>
                    <li><a href="servicios.html">Radiologia</a></li>
                    <li><a href="servicios.html">Urgencias 24h</a></li>
                    <li><a href="servicios.html">Cirugia</a></li>
                    <li><a href="servicios.html">Farmacia</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="footer-title">Contacto Rapido</h6>
                <ul class="footer-contact">
                    <li><i class="fas fa-phone"></i> 305-6305</li>
                    <li><i class="fas fa-envelope"></i> Biofarma@hospital.com</li>
                    <li><i class="fas fa-map-marker-alt"></i> Ciudad de Panama</li>
                    <li><i class="fas fa-clock"></i> Abierto 24/7</li>
                </ul>
            </div>
        </div>
        <hr class="footer-hr">
        <div class="footer-bottom text-center py-3">
            <p>2026 &copy; Derechos reservados | <strong>Hospital BioFarma</strong> | Desarrollado por Grupo 3</p>
        </div>
    </div>
</footer>

<div id="modalLogin" class="modal-overlay">
    <div class="modal-box-split">
        <button class="modal-cerrar-top" onclick="document.getElementById('modalLogin').style.display='none'" aria-label="Cerrar modal">✕</button>

        <div class="modal-split-container">

            <div class="modal-col-visual">
                <div class="visual-content">
                    <div class="visual-brand-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <p class="visual-quote">
                        “Cuidamos de ti y de los tuyos con productos de calidad y confianza.”
                    </p>
                    <div class="visual-line-accent"></div>
                </div>
            </div>

            <div class="modal-col-form">
                <div class="form-content-wrapper">

                    <h2 class="form-main-title">Iniciar <span class="accent-text">Sesión</span></h2>
                    <p class="form-subtitle">Bienvenido de vuelta, inicia sesión para continuar</p>

                    <form method="POST" action="login.php">

                        <div class="input-field-group">
                            <i class="far fa-user input-icon-left"></i>
                            <input type="email" name="correo" placeholder="Usuario o correo electrónico" required>
                        </div>

                        <div class="input-field-group">
                            <i class="fas fa-lock input-icon-left"></i>
                            <input type="password" name="clave" placeholder="Contraseña" id="loginPasswordInput" required>
                            <i class="far fa-eye input-icon-right toggle-password-btn" onclick="togglePasswordVisibility()"></i>
                        </div>

                        <div class="form-options-row">
                            <label class="checkbox-container">
                                <input type="checkbox" name="recordarme" checked>
                                <span class="checkmark"></span>
                                Recordarme
                            </label>
                            <a href="#" class="forgot-password-link">¿Olvidaste tu contraseña?</a>
                        </div>

                        <button type="submit" class="btn-login-submit">
                            <i class="fas fa-lock btn-inner-icon"></i> Iniciar Sesión
                        </button>

                    </form>

                    <div class="divider-text-container">
                        <span class="divider-line"></span>
                        <span class="divider-text">o continúa con</span>
                        <span class="divider-line"></span>
                    </div>

                    <button class="btn-google-auth">
                        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google" class="google-logo-icon">
                        Continuar con Google
                    </button>

                    <p class="form-footer-register-text">
                        ¿No tienes cuenta? <a href="contacto.html" class="register-link-highlight">Regístrate aquí</a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/carrito.js"></script>
</body>
</html>
