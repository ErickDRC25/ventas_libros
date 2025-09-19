<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'Panel de Administración' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
 
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Mi App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($_GET['controller'] ?? '') === 'Dashboard' ? 'active' : '' ?>"
                        href="index.php?controller=Dashboard&action=index">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($_GET['controller'] ?? '') === 'Autor' ? 'active' : '' ?>"
                        href="index.php?controller=Autor&action=index">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($_GET['controller'] ?? '') === 'Editorial' ? 'active' : '' ?>"
                        href="index.php?controller=Editorial&action=index">Editorial</a>
                </li>
 
            </ul>
        </div>
        <span class="navbar-text text-white me-3">
            Bienvenido , <?= $_SESSION['usuario']['correo'] ?? 'Usuario' ?>
        </span>
        <a href="index.php?controller=Auth&action=cerrar_sesion" class="btn btn-outline-light">Cerrar Sesión</a>
 
    </nav>
    <div class="container mt-4">
        <?php require $vista; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
 
</html>