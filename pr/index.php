<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer prog</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome para los íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php
session_start(); // Iniciar la sesión

// Mostrar el mensaje si existe
if (isset($_SESSION['mensaje'])) {
    echo "<script>alert('" . $_SESSION['mensaje'] . "');</script>";
    unset($_SESSION['mensaje']); // Eliminar el mensaje después de mostrarlo
}
?>


    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Inicio</a>
            </li>
        </ul>      
    </nav>
    
    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">Dashboard</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="registrar-datos">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Registrar datos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="mostrar-datos">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Mostrar datos</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid" id="contenido">
                <h1 class="text-center">Bienvenido al Dashboard</h1>
                <div class="row">
                    <!-- Ajuste para que el contenido sea responsive -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>Dashboard</h3>
                                <p>Información</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Añade más cajas o contenido según sea necesario -->
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="main-footer text-center">
        <strong>Dashboard &copy; 2024</strong>
    </footer>

</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

<script>
    $(document).ready(function() {
        $('#mostrar-datos').click(function(e) {
            e.preventDefault(); // Prevenir el comportamiento por defecto del enlace
            $('#contenido').load('mostrar.php'); // Cargar el contenido de mostrar.php en el contenedor
        });

        $('#registrar-datos').click(function(e) {
            e.preventDefault(); // Prevenir el comportamiento por defecto del enlace
            $('#contenido').load('formulario.php'); // Cargar el contenido de formulario.php en el contenedor
        });
    });
</script>

</body>
</html>
