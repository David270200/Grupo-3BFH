<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin – Hospital BioFarma</title>
    <link rel="shortcut icon" type="image/png" href="../img/Logo.png">
    <!-- Bootstrap (mismo que el sitio principal) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (mismo que el sitio principal) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Fuentes (mismas que el sitio principal) -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <!-- CSS del sitio principal -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- CSS exclusivo del panel admin -->
    <link rel="stylesheet" href="css/admin.css">
</head>
<body class="admin-body">

<!-- ════════════════════════════════════════════════
     HEADER
════════════════════════════════════════════════ -->
<header class="admin-header">
    <div style="display:flex;align-items:center;gap:14px;">
        <!-- Botón hamburguesa (solo móvil) -->
        <button class="btn-sidebar-toggle" id="btnToggleSidebar" aria-label="Abrir menú">
            <i class="fas fa-bars"></i>
        </button>
        <a href="../index.html" class="brand" title="Volver al sitio">
            <div class="brand-icon"><i class="fas fa-pills"></i></div>
            <span class="brand-text">Bio<span>Farma</span> &nbsp;|&nbsp; Admin</span>
        </a>
    </div>
    <div class="header-right">
        <span class="header-fecha">
            <i class="fas fa-calendar-alt me-1"></i> Miércoles, 01 de julio de 2026
        </span>
        <div class="admin-pill">
            <div class="admin-avatar">A</div>
            <span class="admin-name">Administrador</span>
        </div>
    </div>
</header>

<!-- ════════════════════════════════════════════════
     LAYOUT PRINCIPAL
════════════════════════════════════════════════ -->
<div class="admin-layout">

    <!-- Overlay móvil -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- ════════════════════════════════════
         SIDEBAR
    ════════════════════════════════════ -->
    <aside class="admin-sidebar" id="adminSidebar">

        <div class="sidebar-section-label">Principal</div>

        <button class="sidebar-item active" onclick="mostrarSeccion('dashboard', this)">
            <i class="fas fa-chart-pie"></i> Dashboard
        </button>
        <button class="sidebar-item" onclick="mostrarSeccion('productos', this)">
            <i class="fas fa-pills"></i> Productos
        </button>
        <button class="sidebar-item" onclick="mostrarSeccion('citas', this)">
            <i class="fas fa-calendar-check"></i> Citas
        </button>
        <button class="sidebar-item" onclick="mostrarSeccion('usuarios', this)">
            <i class="fas fa-users"></i> Usuarios
        </button>

        <div class="sidebar-section-label">Sistema</div>

        <button class="sidebar-item" onclick="mostrarSeccion('configuracion', this)">
            <i class="fas fa-cog"></i> Configuración
        </button>

        <div class="sidebar-spacer"></div>
        <div class="sidebar-divider"></div>

        <a href="../index.html" class="sidebar-item" style="color:rgba(255,255,255,0.5);">
            <i class="fas fa-home"></i> Volver al sitio
        </a>
        <a href="../login.php" class="sidebar-item item-logout">
            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
        </a>

    </aside>

    <!-- ════════════════════════════════════
         CONTENIDO PRINCIPAL
    ════════════════════════════════════ -->
    <main class="admin-main">

        <!-- ══════════════════════════════
             SECCIÓN: DASHBOARD
        ══════════════════════════════ -->
        <section class="admin-section active" id="sec-dashboard">

            <h1 class="section-title">Dashboard</h1>
            <p class="section-sub">Bienvenido, Administrador. Aquí está el resumen del día.</p>

            <!-- Cards estadísticas -->
            <div class="stats-grid">
                <div class="stat-card-admin">
                    <div class="stat-card-bar" style="background:var(--azul)"></div>
                    <div class="stat-card-body">
                        <div class="stat-label"><i class="fas fa-pills" style="color:var(--azul)"></i> Productos registrados</div>
                        <div class="stat-num" style="color:var(--azul)">254</div>
                        <div class="stat-hint">+8 este mes</div>
                    </div>
                </div>
                <div class="stat-card-admin">
                    <div class="stat-card-bar" style="background:var(--ambar)"></div>
                    <div class="stat-card-body">
                        <div class="stat-label"><i class="fas fa-exclamation-triangle" style="color:var(--ambar)"></i> Bajo stock</div>
                        <div class="stat-num" style="color:var(--ambar)">12</div>
                        <div class="stat-hint">Requieren reposición</div>
                    </div>
                </div>
                <div class="stat-card-admin">
                    <div class="stat-card-bar" style="background:var(--verde)"></div>
                    <div class="stat-card-body">
                        <div class="stat-label"><i class="fas fa-calendar-day" style="color:var(--verde)"></i> Citas del día</div>
                        <div class="stat-num" style="color:var(--verde)">18</div>
                        <div class="stat-hint">6 pendientes</div>
                    </div>
                </div>
                <div class="stat-card-admin">
                    <div class="stat-card-bar" style="background:var(--azul-claro)"></div>
                    <div class="stat-card-body">
                        <div class="stat-label"><i class="fas fa-users" style="color:var(--azul-claro)"></i> Usuarios registrados</div>
                        <div class="stat-num" style="color:var(--azul-claro)">87</div>
                        <div class="stat-hint">3 nuevos hoy</div>
                    </div>
                </div>
            </div>

            <!-- Últimas citas + actividad reciente -->
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="admin-panel">
                        <div class="admin-panel-header">
                            <span class="admin-panel-title">
                                <i class="fas fa-calendar-check"></i> Últimas Citas
                            </span>
                            <button class="btn-admin btn-sm" onclick="mostrarSeccion('citas', null)">
                                Ver todas
                            </button>
                        </div>
                        <div class="admin-table-wrap">
                            <table class="admin-table">
                                <thead>
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Doctor</th>
                                        <th>Hora</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <!-- tbody listo para llenarse con PHP -->
                                <tbody id="tbody-ultimas-citas">
                                    <tr>
                                        <td>Juan Pérez</td>
                                        <td>Dr. Alberto Saavedra</td>
                                        <td>08:00 AM</td>
                                        <td><span class="badge-admin badge-confirmada">Confirmada</span></td>
                                    </tr>
                                    <tr>
                                        <td>María González</td>
                                        <td>Dra. Tiara Rodríguez</td>
                                        <td>09:30 AM</td>
                                        <td><span class="badge-admin badge-confirmada">Confirmada</span></td>
                                    </tr>
                                    <tr>
                                        <td>Luis Martínez</td>
                                        <td>Dr. David Pérez</td>
                                        <td>10:00 AM</td>
                                        <td><span class="badge-admin badge-pendiente">Pendiente</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ana Rodríguez</td>
                                        <td>Dra. Yuleidis Escudero</td>
                                        <td>10:45 AM</td>
                                        <td><span class="badge-admin badge-cancelada">Cancelada</span></td>
                                    </tr>
                                    <tr>
                                        <td>Carlos Mendoza</td>
                                        <td>Dr. Marvin Rodríguez</td>
                                        <td>11:30 AM</td>
                                        <td><span class="badge-admin badge-confirmada">Confirmada</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="admin-panel">
                        <div class="admin-panel-header">
                            <span class="admin-panel-title">
                                <i class="fas fa-clock"></i> Actividad Reciente
                            </span>
                        </div>
                        <div class="admin-panel-body">
                            <div class="mov-list" id="lista-actividad">
                                <div class="mov-item">
                                    <div class="mov-icon" style="background:#d4edda;color:var(--verde)"><i class="fas fa-plus"></i></div>
                                    <div class="mov-info">
                                        <div class="mov-accion">Producto agregado</div>
                                        <div class="mov-detalle">Paracetamol 500mg</div>
                                    </div>
                                    <span class="mov-hora">09:15 AM</span>
                                </div>
                                <div class="mov-item">
                                    <div class="mov-icon" style="background:#f8d7da;color:var(--rojo)"><i class="fas fa-trash"></i></div>
                                    <div class="mov-info">
                                        <div class="mov-accion">Producto eliminado</div>
                                        <div class="mov-detalle">Ibuprofeno 400mg</div>
                                    </div>
                                    <span class="mov-hora">09:40 AM</span>
                                </div>
                                <div class="mov-item">
                                    <div class="mov-icon" style="background:#cce5ff;color:var(--azul)"><i class="fas fa-calendar-plus"></i></div>
                                    <div class="mov-info">
                                        <div class="mov-accion">Nueva cita</div>
                                        <div class="mov-detalle">Juan Pérez</div>
                                    </div>
                                    <span class="mov-hora">10:05 AM</span>
                                </div>
                                <div class="mov-item">
                                    <div class="mov-icon" style="background:#d4edda;color:var(--verde)"><i class="fas fa-user-plus"></i></div>
                                    <div class="mov-info">
                                        <div class="mov-accion">Usuario registrado</div>
                                        <div class="mov-detalle">María González</div>
                                    </div>
                                    <span class="mov-hora">10:30 AM</span>
                                </div>
                                <div class="mov-item">
                                    <div class="mov-icon" style="background:#fff3cd;color:var(--ambar)"><i class="fas fa-boxes"></i></div>
                                    <div class="mov-info">
                                        <div class="mov-accion">Stock actualizado</div>
                                        <div class="mov-detalle">Vitamina C 1000mg</div>
                                    </div>
                                    <span class="mov-hora">11:00 AM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        // ══════════════════════════════
             SECCIÓN: CONFIGURACIÓN PHP
        // ══════════════════════════════

        <?php

        $conexion = mysqli_connect("localhost","root","","semestral");

        if(isset($_POST["guardar"])){

        $id = (int)$_POST["id"];
        $stock = (int)$_POST["stock"];

        mysqli_query($conexion,
        "UPDATE productos
         SET STOCK = $stock
         WHERE ID = $id");

        }

        $resultado = mysqli_query($conexion,"SELECT * FROM productos");

        ?>
        

            // FORM BUSQUEDA
            <table class="table table-striped">

    <thead>

        <tr>

            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Stock</th>
            <th></th>

        </tr>

    </thead>

    <tbody>

<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

<tr>

<form method="POST">

    <td>

        <?= $fila["ID"] ?>

        <input
            type="hidden"
            name="id"
            value="<?= $fila["ID"] ?>">

    </td>

    <td><?= $fila["NOMBRE"] ?></td>

    <td><?= $fila["CATEGORIA"] ?></td>

    <td>$<?= $fila["PRECIO"] ?></td>

    <td>

        <input
            type="number"
            name="stock"
            value="<?= $fila["STOCK"] ?>"
            class="form-control">

    </td>

    <td>

        <button
            name="guardar"
            class="btn btn-success">

            Guardar

        </button>

    </td>

            </form>

            </tr>

        <?php } ?>

    </tbody>

        </table>






        <!-- ══════════════════════════════
             SECCIÓN: PRODUCTOS
        ══════════════════════════════ -->
        








        <section class="admin-section" id="sec-productos">

            <h1 class="section-title">Productos</h1>
            <p class="section-sub">Gestiona el catálogo de productos de la farmacia.</p>

            <div class="admin-panel">
                <div class="admin-panel-header">
                    <span class="admin-panel-title">
                        <i class="fas fa-pills"></i> Catálogo de Productos
                    </span>
                    <div class="admin-toolbar">
                        <div class="admin-search">
                            <i class="fas fa-search"></i>
                            <input type="text" id="buscador-productos" name="buscador_productos" placeholder="Buscar producto...">
                        </div>
                        <select class="admin-select" id="filtro-categoria" name="filtro_categoria">
                            <option value="">Todas las categorías</option>
                            <option value="analgésico">Analgésico</option>
                            <option value="antibiótico">Antibiótico</option>
                            <option value="antiinflamatorio">Antiinflamatorio</option>
                            <option value="vitamina">Vitamina</option>
                            <option value="gastro">Gastro</option>
                        </select>
                        <select class="admin-select" id="filtro-estado" name="filtro_estado">
                            <option value="">Todos los estados</option>
                            <option value="disponible">Disponible</option>
                            <option value="poco">Poco Stock</option>
                            <option value="agotado">Agotado</option>
                        </select>
                        <button class="btn-admin" id="btn-nuevo-producto" data-bs-toggle="modal" data-bs-target="#modalProducto">
                            <i class="fas fa-plus"></i> Nuevo Producto
                        </button>
                    </div>
                </div>
                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <!-- tbody listo para llenarse con PHP -->
                        <tbody id="tbody-productos">
                            <tr>
                                <td><span class="id-tag">001</span></td>
                                <td><img src="../imagenesproductos/paracetamol.jpg" class="tabla-img" alt="Paracetamol"></td>
                                <td><strong>Paracetamol 500mg</strong></td>
                                <td>Analgésico</td>
                                <td class="precio-tag">$3.50</td>
                                <td>120</td>
                                <td><span class="badge-admin badge-disponible">Disponible</span></td>
                                <td>
                                    <button class="btn-accion editar" id="btn-editar-1"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion eliminar" id="btn-eliminar-1"><i class="fas fa-trash me-1"></i>Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">002</span></td>
                                <td><img src="../imagenesproductos/ibuprofeno.webp" class="tabla-img" alt="Ibuprofeno"></td>
                                <td><strong>Ibuprofeno 400mg</strong></td>
                                <td>Antiinflamatorio</td>
                                <td class="precio-tag">$4.20</td>
                                <td>85</td>
                                <td><span class="badge-admin badge-disponible">Disponible</span></td>
                                <td>
                                    <button class="btn-accion editar" id="btn-editar-2"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion eliminar" id="btn-eliminar-2"><i class="fas fa-trash me-1"></i>Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">003</span></td>
                                <td><img src="../imagenesproductos/pastillarespfriado.jpeg" class="tabla-img" alt="Amoxicilina"></td>
                                <td><strong>Amoxicilina 500mg</strong></td>
                                <td>Antibiótico</td>
                                <td class="precio-tag">$6.80</td>
                                <td>8</td>
                                <td><span class="badge-admin badge-poco">Poco Stock</span></td>
                                <td>
                                    <button class="btn-accion editar" id="btn-editar-3"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion eliminar" id="btn-eliminar-3"><i class="fas fa-trash me-1"></i>Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">004</span></td>
                                <td><img src="../imagenesproductos/medicamentoestomacal.webp" class="tabla-img" alt="Omeprazol"></td>
                                <td><strong>Omeprazol 20mg</strong></td>
                                <td>Gastro</td>
                                <td class="precio-tag">$5.10</td>
                                <td>0</td>
                                <td><span class="badge-admin badge-agotado">Agotado</span></td>
                                <td>
                                    <button class="btn-accion editar" id="btn-editar-4"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion eliminar" id="btn-eliminar-4"><i class="fas fa-trash me-1"></i>Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">005</span></td>
                                <td><img src="../imagenesproductos/cremapiel.png" class="tabla-img" alt="Crema"></td>
                                <td><strong>Crema Hidratante</strong></td>
                                <td>Dermatología</td>
                                <td class="precio-tag">$8.90</td>
                                <td>45</td>
                                <td><span class="badge-admin badge-disponible">Disponible</span></td>
                                <td>
                                    <button class="btn-accion editar" id="btn-editar-5"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion eliminar" id="btn-eliminar-5"><i class="fas fa-trash me-1"></i>Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">006</span></td>
                                <td><img src="../imagenesproductos/jarabetos.jpg" class="tabla-img" alt="Jarabe"></td>
                                <td><strong>Jarabe para la Tos</strong></td>
                                <td>Respiratorio</td>
                                <td class="precio-tag">$7.30</td>
                                <td>6</td>
                                <td><span class="badge-admin badge-poco">Poco Stock</span></td>
                                <td>
                                    <button class="btn-accion editar" id="btn-editar-6"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion eliminar" id="btn-eliminar-6"><i class="fas fa-trash me-1"></i>Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">007</span></td>
                                <td><img src="../imagenesproductos/pastillapresion.webp" class="tabla-img" alt="Presión"></td>
                                <td><strong>Pastilla para la Presión</strong></td>
                                <td>Cardiovascular</td>
                                <td class="precio-tag">$9.50</td>
                                <td>60</td>
                                <td><span class="badge-admin badge-disponible">Disponible</span></td>
                                <td>
                                    <button class="btn-accion editar" id="btn-editar-7"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion eliminar" id="btn-eliminar-7"><i class="fas fa-trash me-1"></i>Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>

        <!-- ══════════════════════════════
             SECCIÓN: CITAS
        ══════════════════════════════ -->
        <section class="admin-section" id="sec-citas">

            <h1 class="section-title">Citas Médicas</h1>
            <p class="section-sub">Gestiona las citas programadas de los pacientes.</p>

            <div class="admin-panel">
                <div class="admin-panel-header">
                    <span class="admin-panel-title">
                        <i class="fas fa-calendar-check"></i> Citas Programadas
                    </span>
                    <div class="admin-toolbar">
                        <div class="admin-search">
                            <i class="fas fa-search"></i>
                            <input type="text" id="buscador-citas" name="buscador_citas" placeholder="Buscar paciente o doctor...">
                        </div>
                        <select class="admin-select" id="filtro-estado-citas" name="filtro_estado_citas">
                            <option value="">Todos los estados</option>
                            <option value="confirmada">Confirmada</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="cancelada">Cancelada</option>
                        </select>
                        <select class="admin-select" id="filtro-doctor" name="filtro_doctor">
                            <option value="">Todos los doctores</option>
                            <option value="saavedra">Dr. Saavedra</option>
                            <option value="rodriguez">Dra. Rodríguez</option>
                            <option value="perez">Dr. Pérez</option>
                            <option value="escudero">Dra. Escudero</option>
                        </select>
                    </div>
                </div>
                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Paciente</th>
                                <th>Doctor</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <!-- tbody listo para llenarse con PHP -->
                        <tbody id="tbody-citas">
                            <tr>
                                <td><span class="id-tag">C001</span></td>
                                <td><strong>Juan Pérez</strong></td>
                                <td>Dr. Alberto Saavedra</td>
                                <td>01/07/2026</td>
                                <td>08:00 AM</td>
                                <td><span class="badge-admin badge-confirmada">Confirmada</span></td>
                                <td>
                                    <button class="btn-accion ver" id="btn-ver-c001"><i class="fas fa-eye me-1"></i>Ver</button>
                                    <button class="btn-accion editar" id="btn-editar-c001"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion cancelar" id="btn-cancelar-c001"><i class="fas fa-times me-1"></i>Cancelar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">C002</span></td>
                                <td><strong>María González</strong></td>
                                <td>Dra. Tiara Rodríguez</td>
                                <td>01/07/2026</td>
                                <td>09:30 AM</td>
                                <td><span class="badge-admin badge-confirmada">Confirmada</span></td>
                                <td>
                                    <button class="btn-accion ver" id="btn-ver-c002"><i class="fas fa-eye me-1"></i>Ver</button>
                                    <button class="btn-accion editar" id="btn-editar-c002"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion cancelar" id="btn-cancelar-c002"><i class="fas fa-times me-1"></i>Cancelar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">C003</span></td>
                                <td><strong>Luis Martínez</strong></td>
                                <td>Dr. David Pérez</td>
                                <td>01/07/2026</td>
                                <td>10:00 AM</td>
                                <td><span class="badge-admin badge-pendiente">Pendiente</span></td>
                                <td>
                                    <button class="btn-accion ver" id="btn-ver-c003"><i class="fas fa-eye me-1"></i>Ver</button>
                                    <button class="btn-accion editar" id="btn-editar-c003"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion cancelar" id="btn-cancelar-c003"><i class="fas fa-times me-1"></i>Cancelar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">C004</span></td>
                                <td><strong>Ana Rodríguez</strong></td>
                                <td>Dra. Yuleidis Escudero</td>
                                <td>01/07/2026</td>
                                <td>10:45 AM</td>
                                <td><span class="badge-admin badge-cancelada">Cancelada</span></td>
                                <td>
                                    <button class="btn-accion ver" id="btn-ver-c004"><i class="fas fa-eye me-1"></i>Ver</button>
                                    <button class="btn-accion editar" id="btn-editar-c004"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion cancelar" id="btn-cancelar-c004"><i class="fas fa-times me-1"></i>Cancelar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">C005</span></td>
                                <td><strong>Carlos Mendoza</strong></td>
                                <td>Dr. Marvin Rodríguez</td>
                                <td>01/07/2026</td>
                                <td>11:30 AM</td>
                                <td><span class="badge-admin badge-confirmada">Confirmada</span></td>
                                <td>
                                    <button class="btn-accion ver" id="btn-ver-c005"><i class="fas fa-eye me-1"></i>Ver</button>
                                    <button class="btn-accion editar" id="btn-editar-c005"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion cancelar" id="btn-cancelar-c005"><i class="fas fa-times me-1"></i>Cancelar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">C006</span></td>
                                <td><strong>Sofía Castro</strong></td>
                                <td>Dr. Alberto Saavedra</td>
                                <td>01/07/2026</td>
                                <td>12:00 PM</td>
                                <td><span class="badge-admin badge-pendiente">Pendiente</span></td>
                                <td>
                                    <button class="btn-accion ver" id="btn-ver-c006"><i class="fas fa-eye me-1"></i>Ver</button>
                                    <button class="btn-accion editar" id="btn-editar-c006"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion cancelar" id="btn-cancelar-c006"><i class="fas fa-times me-1"></i>Cancelar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">C007</span></td>
                                <td><strong>Roberto Jiménez</strong></td>
                                <td>Dr. David Pérez</td>
                                <td>01/07/2026</td>
                                <td>02:00 PM</td>
                                <td><span class="badge-admin badge-confirmada">Confirmada</span></td>
                                <td>
                                    <button class="btn-accion ver" id="btn-ver-c007"><i class="fas fa-eye me-1"></i>Ver</button>
                                    <button class="btn-accion editar" id="btn-editar-c007"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion cancelar" id="btn-cancelar-c007"><i class="fas fa-times me-1"></i>Cancelar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">C008</span></td>
                                <td><strong>Elena Torres</strong></td>
                                <td>Dra. Tiara Rodríguez</td>
                                <td>01/07/2026</td>
                                <td>03:30 PM</td>
                                <td><span class="badge-admin badge-pendiente">Pendiente</span></td>
                                <td>
                                    <button class="btn-accion ver" id="btn-ver-c008"><i class="fas fa-eye me-1"></i>Ver</button>
                                    <button class="btn-accion editar" id="btn-editar-c008"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion cancelar" id="btn-cancelar-c008"><i class="fas fa-times me-1"></i>Cancelar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>

        <!-- ══════════════════════════════
             SECCIÓN: USUARIOS
        ══════════════════════════════ -->
        <section class="admin-section" id="sec-usuarios">

            <h1 class="section-title">Usuarios</h1>
            <p class="section-sub">Administra los usuarios registrados en el sistema.</p>

            <div class="admin-panel">
                <div class="admin-panel-header">
                    <span class="admin-panel-title">
                        <i class="fas fa-users"></i> Usuarios del Sistema
                    </span>
                    <div class="admin-toolbar">
                        <div class="admin-search">
                            <i class="fas fa-search"></i>
                            <input type="text" id="buscador-usuarios" name="buscador_usuarios" placeholder="Buscar usuario...">
                        </div>
                        <select class="admin-select" id="filtro-rol" name="filtro_rol">
                            <option value="">Todos los roles</option>
                            <option value="admin">Administrador</option>
                            <option value="doctor">Doctor</option>
                            <option value="paciente">Paciente</option>
                        </select>
                        <button class="btn-admin" id="btn-nuevo-usuario" data-bs-toggle="modal" data-bs-target="#modalUsuario">
                            <i class="fas fa-user-plus"></i> Nuevo Usuario
                        </button>
                    </div>
                </div>
                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <!-- tbody listo para llenarse con PHP -->
                        <tbody id="tbody-usuarios">
                            <tr>
                                <td><span class="id-tag">U001</span></td>
                                <td><strong>Administrador</strong></td>
                                <td>admin@biofarma.com</td>
                                <td>Administrador</td>
                                <td><span class="badge-admin badge-activo">Activo</span></td>
                                <td>
                                    <button class="btn-accion editar" id="btn-editar-u001"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion eliminar" id="btn-eliminar-u001"><i class="fas fa-trash me-1"></i>Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">U002</span></td>
                                <td><strong>Dra. Tiara Rodríguez</strong></td>
                                <td>tiara@biofarma.com</td>
                                <td>Doctor</td>
                                <td><span class="badge-admin badge-activo">Activo</span></td>
                                <td>
                                    <button class="btn-accion editar" id="btn-editar-u002"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion eliminar" id="btn-eliminar-u002"><i class="fas fa-trash me-1"></i>Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">U003</span></td>
                                <td><strong>Dr. David Pérez</strong></td>
                                <td>david@biofarma.com</td>
                                <td>Doctor</td>
                                <td><span class="badge-admin badge-activo">Activo</span></td>
                                <td>
                                    <button class="btn-accion editar" id="btn-editar-u003"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion eliminar" id="btn-eliminar-u003"><i class="fas fa-trash me-1"></i>Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">U004</span></td>
                                <td><strong>Juan Pérez</strong></td>
                                <td>juan@email.com</td>
                                <td>Paciente</td>
                                <td><span class="badge-admin badge-activo">Activo</span></td>
                                <td>
                                    <button class="btn-accion editar" id="btn-editar-u004"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion eliminar" id="btn-eliminar-u004"><i class="fas fa-trash me-1"></i>Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="id-tag">U005</span></td>
                                <td><strong>María González</strong></td>
                                <td>maria@email.com</td>
                                <td>Paciente</td>
                                <td><span class="badge-admin badge-inactivo">Inactivo</span></td>
                                <td>
                                    <button class="btn-accion editar" id="btn-editar-u005"><i class="fas fa-edit me-1"></i>Editar</button>
                                    <button class="btn-accion eliminar" id="btn-eliminar-u005"><i class="fas fa-trash me-1"></i>Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>

        <!-- ══════════════════════════════
             SECCIÓN: CONFIGURACIÓN
        ══════════════════════════════ -->
        <section class="admin-section" id="sec-configuracion">

            <h1 class="section-title">Configuración</h1>
            <p class="section-sub">Administra tu perfil y las preferencias del sistema.</p>

            <div class="row g-4">
                <!-- Perfil -->
                <div class="col-lg-4">
                    <div class="admin-panel h-100">
                        <div class="admin-panel-header">
                            <span class="admin-panel-title"><i class="fas fa-user-circle"></i> Mi Perfil</span>
                        </div>
                        <div class="admin-panel-body text-center">
                            <div class="config-avatar-wrap">
                                <div class="config-avatar">A</div>
                                <button class="config-avatar-btn" id="btn-cambiar-foto" title="Cambiar foto">
                                    <i class="fas fa-camera"></i>
                                </button>
                            </div>
                            <h5 style="font-weight:800;color:var(--texto);margin-bottom:4px;">Administrador</h5>
                            <p style="font-size:0.85rem;color:var(--muted);">admin@biofarma.com</p>
                            <span class="badge-admin badge-activo" style="margin-top:8px;">Activo</span>
                        </div>
                    </div>
                </div>

                <!-- Información -->
                <div class="col-lg-8">
                    <div class="admin-panel">
                        <div class="admin-panel-header">
                            <span class="admin-panel-title"><i class="fas fa-id-card"></i> Información Personal</span>
                        </div>
                        <div class="admin-panel-body">
                            <!-- Formulario listo para conectar con PHP -->
                            <form id="form-perfil" method="POST" action="">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label-admin" for="cfg-nombre">Nombre completo</label>
                                        <input class="form-input-admin" type="text" id="cfg-nombre" name="nombre" placeholder="Nombre completo" value="Administrador">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label-admin" for="cfg-correo">Correo electrónico</label>
                                        <input class="form-input-admin" type="email" id="cfg-correo" name="correo" placeholder="correo@biofarma.com" value="admin@biofarma.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label-admin" for="cfg-telefono">Teléfono</label>
                                        <input class="form-input-admin" type="tel" id="cfg-telefono" name="telefono" placeholder="305-6305">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label-admin" for="cfg-rol">Rol</label>
                                        <input class="form-input-admin" type="text" id="cfg-rol" name="rol" placeholder="Administrador" value="Administrador" readonly>
                                    </div>
                                </div>
                                <button type="submit" class="btn-admin mt-2" id="btn-guardar-perfil">
                                    <i class="fas fa-save"></i> Guardar cambios
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Cambiar contraseña -->
                    <div class="admin-panel mt-4">
                        <div class="admin-panel-header">
                            <span class="admin-panel-title"><i class="fas fa-lock"></i> Cambiar Contraseña</span>
                        </div>
                        <div class="admin-panel-body">
                            <!-- Formulario listo para conectar con PHP -->
                            <form id="form-password" method="POST" action="">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label-admin" for="cfg-pass-actual">Contraseña actual</label>
                                        <input class="form-input-admin" type="password" id="cfg-pass-actual" name="password_actual" placeholder="••••••••">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label-admin" for="cfg-pass-nueva">Nueva contraseña</label>
                                        <input class="form-input-admin" type="password" id="cfg-pass-nueva" name="password_nueva" placeholder="••••••••">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label-admin" for="cfg-pass-confirm">Confirmar contraseña</label>
                                        <input class="form-input-admin" type="password" id="cfg-pass-confirm" name="password_confirmar" placeholder="••••••••">
                                    </div>
                                </div>
                                <button type="submit" class="btn-admin mt-2" id="btn-cambiar-password">
                                    <i class="fas fa-key"></i> Cambiar contraseña
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </main><!-- .admin-main -->

</div><!-- .admin-layout -->

<!-- ════════════════════════════════════════════════
     FOOTER
════════════════════════════════════════════════ -->
<footer class="admin-footer">
    Sistema Administrativo &ndash; Hospital BioFarma &copy; 2026
</footer>

<!-- ════════════════════════════════════════════════
     MODAL: NUEVO PRODUCTO
     Todos los inputs tienen id y name listos para PHP
════════════════════════════════════════════════ -->
<div class="modal fade" id="modalProducto" tabindex="-1" aria-labelledby="modalProductoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalProductoLabel">
                    <i class="fas fa-plus me-2"></i> Nuevo Producto
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <!-- Formulario listo para conectar con PHP -->
            <form id="form-producto" method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label-admin" for="prod-nombre">Nombre del producto *</label>
                            <input class="form-input-admin" type="text" id="prod-nombre" name="nombre" placeholder="Ej: Paracetamol 500mg" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-admin" for="prod-categoria">Categoría *</label>
                            <select class="form-input-admin" id="prod-categoria" name="categoria" required>
                                <option value="">Seleccionar categoría</option>
                                <option value="analgésico">Analgésico</option>
                                <option value="antibiótico">Antibiótico</option>
                                <option value="antiinflamatorio">Antiinflamatorio</option>
                                <option value="vitamina">Vitamina</option>
                                <option value="gastro">Gastro</option>
                                <option value="cardiovascular">Cardiovascular</option>
                                <option value="dermatología">Dermatología</option>
                                <option value="respiratorio">Respiratorio</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label-admin" for="prod-precio">Precio ($) *</label>
                            <input class="form-input-admin" type="number" id="prod-precio" name="precio" placeholder="0.00" step="0.01" min="0" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label-admin" for="prod-stock">Stock *</label>
                            <input class="form-input-admin" type="number" id="prod-stock" name="stock" placeholder="0" min="0" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label-admin" for="prod-estado">Estado *</label>
                            <select class="form-input-admin" id="prod-estado" name="estado" required>
                                <option value="disponible">Disponible</option>
                                <option value="poco">Poco Stock</option>
                                <option value="agotado">Agotado</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label-admin" for="prod-descripcion">Descripción</label>
                            <textarea class="form-input-admin" id="prod-descripcion" name="descripcion" rows="3" placeholder="Descripción del producto..." style="resize:vertical;"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label-admin" for="prod-imagen">Imagen del producto</label>
                            <input class="form-input-admin" type="file" id="prod-imagen" name="imagen" accept="image/*" style="padding:6px 12px;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-accion cancelar" data-bs-dismiss="modal" style="padding:8px 18px;border-radius:22px;">
                        Cancelar
                    </button>
                    <button type="submit" class="btn-admin" id="btn-guardar-producto">
                        <i class="fas fa-save"></i> Guardar Producto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ════════════════════════════════════════════════
     MODAL: NUEVO USUARIO
════════════════════════════════════════════════ -->
<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUsuarioLabel">
                    <i class="fas fa-user-plus me-2"></i> Nuevo Usuario
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <!-- Formulario listo para conectar con PHP -->
            <form id="form-usuario" method="POST" action="">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label-admin" for="usr-nombre">Nombre completo *</label>
                            <input class="form-input-admin" type="text" id="usr-nombre" name="nombre" placeholder="Nombre completo" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label-admin" for="usr-correo">Correo electrónico *</label>
                            <input class="form-input-admin" type="email" id="usr-correo" name="correo" placeholder="correo@ejemplo.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-admin" for="usr-rol">Rol *</label>
                            <select class="form-input-admin" id="usr-rol" name="rol" required>
                                <option value="">Seleccionar rol</option>
                                <option value="admin">Administrador</option>
                                <option value="doctor">Doctor</option>
                                <option value="paciente">Paciente</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-admin" for="usr-estado">Estado *</label>
                            <select class="form-input-admin" id="usr-estado" name="estado" required>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label-admin" for="usr-password">Contraseña *</label>
                            <input class="form-input-admin" type="password" id="usr-password" name="password" placeholder="Mínimo 8 caracteres" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-accion cancelar" data-bs-dismiss="modal" style="padding:8px 18px;border-radius:22px;">
                        Cancelar
                    </button>
                    <button type="submit" class="btn-admin" id="btn-guardar-usuario">
                        <i class="fas fa-save"></i> Registrar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ════════════════════════════════════════════════
     SCRIPTS
════════════════════════════════════════════════ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    /* ──────────────────────────────────────────────
       NAVEGACIÓN ENTRE SECCIONES
       Para conectar con PHP solo cambia el contenido
       de cada <tbody> con echo de PHP.
    ────────────────────────────────────────────── */
    function mostrarSeccion(id, btnActivo) {
        // Ocultar todas las secciones
        document.querySelectorAll('.admin-section').forEach(s => s.classList.remove('active'));
        // Quitar active del sidebar
        document.querySelectorAll('.sidebar-item').forEach(b => b.classList.remove('active'));

        // Mostrar sección seleccionada
        const sec = document.getElementById('sec-' + id);
        if (sec) sec.classList.add('active');

        // Marcar botón activo
        if (btnActivo) {
            btnActivo.classList.add('active');
        } else {
            // Si se llamó sin botón (ej: desde dashboard)
            document.querySelectorAll('.sidebar-item').forEach(b => {
                if (b.textContent.trim().toLowerCase().includes(id)) {
                    b.classList.add('active');
                }
            });
        }

        // Cerrar sidebar en móvil
        cerrarSidebar();
    }

    /* ──────────────────────────────────────────────
       SIDEBAR RESPONSIVE (móvil)
    ────────────────────────────────────────────── */
    const sidebar  = document.getElementById('adminSidebar');
    const overlay  = document.getElementById('sidebarOverlay');
    const btnToggle = document.getElementById('btnToggleSidebar');

    btnToggle.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        overlay.classList.toggle('open');
    });

    overlay.addEventListener('click', cerrarSidebar);

    function cerrarSidebar() {
        sidebar.classList.remove('open');
        overlay.classList.remove('open');
    }
</script>
</body>
</html>
