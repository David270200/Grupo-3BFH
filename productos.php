<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Hospital BioFarma</title>
    <link rel="shortcut icon" type="image/png" href="img/Logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>


<?php

$conn = mysqli_connect("localhost","root","","semestral");

$sql="SELECT * FROM productos";

$resultado=mysqli_query($conn,$sql);

?>





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
                 <a class="nav-link fw-semibold"
       href="#"
       onclick="document.getElementById('modalLogin').style.display='flex'; return false;">
        Iniciar Sesion
    </a>
                <li class="nav-item ms-lg-2"><a class="btn btn-biofarma" href="contacto.html"><i class="fas fa-envelope me-1"></i>Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="page-banner">
    <div class="container">
        <h1><i class="fas fa-pills me-3"></i>Farmacia BioFarma</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.html" class="text-white">Inicio</a></li>
                <li class="breadcrumb-item active text-white-50">Productos</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="section-header text-center mb-5">
            <span class="section-tag">Farmacia</span>
            <h2>Catalogo de Productos</h2>
            <p class="text-muted">Encuentra los medicamentos y productos de salud que necesitas con asesoria farmaceutica profesional.</p>
        </div>

        <!-- Filtros -->
        <div class="d-flex gap-2 flex-wrap justify-content-center mb-5">
            <button class="btn btn-filtro active" data-filtro="todos">Todos</button>
            <button class="btn btn-filtro" data-filtro="analgesico">Analgesicos</button>
            <button class="btn btn-filtro" data-filtro="antinflamatorio">Antinflamatorios</button>
            <button class="btn btn-filtro" data-filtro="cardiovascular">Cardiovascular</button>
            <button class="btn btn-filtro" data-filtro="respiratorio">Respiratorio</button>
        </div>

        <?php while($fila=mysqli_fetch_assoc($resultado)){ ?>

            <div class="col-6 col-md-4 col-lg-3 producto-item"
            data-cat="<?= strtolower($fila['CATEGORIA']) ?>">

            <div class="producto-card">

                <div class="producto-img-wrap">
                <img src="<?= $fila['IMAGEN'] ?>" class="img-fluid">
                </div>

                <div class="producto-body">

                <span class="producto-cat">
                <?= $fila['CATEGORIA'] ?>
                </span>

                <h3><?= $fila['NOMBRE'] ?></h3>

                <div class="producto-footer">

                <span class="precio">
                    $<?= $fila['PRECIO'] ?>
                </span>

                <button class="btn-agregar"
                        onclick="agregarCarrito(this,'<?= $fila['ID'] ?>')">

                    <i class="fas fa-cart-plus"></i>

                </button>

            </div>

        </div>

    </div>

</div>
<?php } ?>

        <!-- Toast notificacion carrito -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="toastCarrito" class="toast align-items-center text-bg-success border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body"><i class="fas fa-check-circle me-2"></i><span id="toastMsg"></span></div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        </div>

        <!-- Aviso farmaceutico -->
        <div class="farmacia-aviso mt-5">
            <i class="fas fa-info-circle me-2"></i>
            <strong>Aviso importante:</strong> Consulte siempre a un profesional de la salud antes de adquirir o consumir cualquier medicamento. Nuestros farmaceuticos estan disponibles para orientarte.
        </div>
    </div>
</section>

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
<script>
// Filtros de productos
document.querySelectorAll(".btn-filtro").forEach(btn => {
    btn.addEventListener("click", function() {
        document.querySelectorAll(".btn-filtro").forEach(b => b.classList.remove("active"));
        this.classList.add("active");
        const filtro = this.dataset.filtro;
        document.querySelectorAll(".producto-item").forEach(item => {
            if (filtro === "todos" || item.dataset.cat === filtro) {
                item.style.display = "";
            } else {
                item.style.display = "none";
            }
        });
    });
});

// Toast carrito
function agregarCarrito(btn, nombre) {

    document.getElementById("toastMsg").textContent =
        nombre + " agregado a tu carrito.";

    const toastEl = document.getElementById("toastCarrito");
    const toast = new bootstrap.Toast(toastEl,{delay:3000});
    toast.show();

    fetch("agregar_carrito.php",{

        method:"POST",

        headers:{
            "Content-Type":"application/x-www-form-urlencoded"
        },

        body:"producto="+encodeURIComponent(id)

    });
}
</script>
</body>
</html>