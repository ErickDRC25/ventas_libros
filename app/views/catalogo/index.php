<!-- app/views/catalogo/index.php -->
<h2>Catálogo de libros</h2>
<div class="row">
<?php foreach ($libros as $libro): ?>
  <div class="col-md-3 mb-4">
    <div class="card">
      <img src="uploads/<?php echo $libro['imagen']; ?>" class="card-img-top" alt="">
      <div class="card-body">
        <h5 class="card-title"><?php echo $libro['titulo']; ?></h5>
        <p class="card-text">S/ <?php echo number_format($libro['precio'],2); ?></p>
        <a href="index.php?controller=Carrito&action=agregar&id=<?php echo $libro['id_libro']; ?>" class="btn btn-primary">Agregar</a>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
