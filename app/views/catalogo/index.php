<!-- app/views/catalogo/index.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Catálogo de libros</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="index.php?controller=Catalogo&action=index">📚 Librería</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" 
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php?controller=Catalogo&action=index">Catálogo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=Auth&action=login">Ingresar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- CATÁLOGO -->
<div class="container my-5">
  <h2 class="text-center mb-4">Catálogo de libros</h2>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 justify-content-center g-4">
    <?php foreach ($libros as $libro): ?>
      <div class="col">
        <div class="card h-100 shadow-sm text-center">
          <img src="<?php echo $libro['imagen']; ?>" 
               class="card-img-top" 
               alt="<?php echo $libro['titulo']; ?>" 
               style="height: 250px; object-fit: cover;">
          <div class="card-body d-flex flex-column">
            <h6 class="card-title fw-bold"><?php echo $libro['titulo']; ?></h6>
            <p class="text-muted mb-1"><?php echo $libro['autor']; ?></p> <!-- Autor -->
            <p class="card-text text-primary fw-semibold">
              S/ <?php echo number_format($libro['precio'], 2); ?>
            </p>
            <a href="index.php?controller=Carrito&action=agregar&id=<?php echo $libro['id_libro']; ?>" 
               class="btn btn-primary mt-auto">
               Agregar
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
