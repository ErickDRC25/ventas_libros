<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'Panel de Administración' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.php?controller=Dashboard&action=index">
                <i class="bi bi-book"></i> Panel Admin
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['controller'] ?? '') === 'Dashboard' ? 'active' : '' ?>"
                            href="index.php?controller=Dashboard&action=index">
                            <i class="bi bi-house"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['controller'] ?? '') === 'Cliente' ? 'active' : '' ?>"
                            href="index.php?controller=Cliente&action=index">
                            <i class="bi bi-people"></i> Usuarios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['controller'] ?? '') === 'Venta' ? 'active' : '' ?>"
                            href="index.php?controller=Venta&action=index">
                            <i class="bi bi-cart-check"></i> Ventas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['controller'] ?? '') === 'Autor' ? 'active' : '' ?>"
                            href="index.php?controller=Autor&action=index">
                            <i class="bi bi-person-badge"></i> Autores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['controller'] ?? '') === 'Editorial' ? 'active' : '' ?>"
                            href="index.php?controller=Editorial&action=index">
                            <i class="bi bi-building"></i> Editoriales
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['controller'] ?? '') === 'Libro' ? 'active' : '' ?>"
                            href="index.php?controller=Libro&action=index">
                            <i class="bi bi-book"></i> Libros
                        </a>
                    </li>
                </ul>

                <div class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['controller'] ?? '') === 'Catalogo' ? 'active' : '' ?>"
                            href="index.php?controller=Catalogo&action=index" target="_blank">
                            <i class="bi bi-globe"></i> Vista Cliente
                        </a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link text-light">
                            <i class="bi bi-person"></i> <?= $_SESSION['usuario'] ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=Auth&action=cerrar_sesion">
                            <i class="bi bi-box-arrow-right"></i> Salir
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <!-- Header de la página -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <?php if (isset($btn_agregar) && $btn_agregar): ?>
                        <a href="<?= $btn_agregar_url ?? '#' ?>" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> <?= $btn_agregar_texto ?? 'Agregar' ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Contenido específico de cada vista -->
                <?php require $vista; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>