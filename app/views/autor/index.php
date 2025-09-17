<div class="d-flex justify-content-between mb-3">
    <h3>Listado de Autores</h3>
    <a href="index.php?controller=Autor&action=crearAutor" class="btn btn-success mb-3">
        
        Agregar Libros
    </a>
</div>

<div class="container text-center">
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre A.</th>
      <th scope="col">Apellido A.</th>
      <th scope="col">Nacionalidad</th>
      <th scope="col">Fecha Nacimiento</th>
      <th scope="col">Biografia</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($autores as $autor) { ?>
        <tr>
            <td><?=$autor['id_autor']?></td>
            <td><?=$autor['nombre_autor']?></td>
            <td><?=$autor['apellido_autor']?></td>
            <td><?=$autor['nacionalidad']?></td>
            <td><?=$autor['fecha_nacimiento']?></td>
            <td><?=$autor['biografia']?></td>
            <td><?=$autor['estado']?></td>
            <td>
    <div class="d-flex gap-2">
        <a href="index.php?controller=Autor&action=editar&id=<?=$autor['id_autor']?>" class="btn btn-warning" role="button">Editar</a>
        <a href="index.php?controller=Autor&action=desactivar&id=<?=$autor['id_autor']?>" class="btn btn-danger" role="button">Eliminar</a>
    </div>
</td>
        </tr>
        <?php }?>
  </tbody>
</table>
</div>