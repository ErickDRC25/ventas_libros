<div class="d-flex justify-content-between mb-3">
  <h3>Listado de Editoriales</h3>
  <a href="index.php?controller=Editorial&action=crearEditorial" class="btn btn-success mb-3">

    Agregar Editorial
  </a>
</div>

<div class="container text-center">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NOMBRE E.</th>
        <th scope="col">TELEFONO</th>
        <th scope="col">CORREO</th>
        <th scope="col">DIRECCION</th>
        <th scope="col">ESTADO</th>
        <th scope="col">ACCIONES</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($editoriales as $editorial) { ?>
        <tr>
          <td><?= $editorial['id_editorial'] ?></td>
          <td><?= $editorial['nombre_editorial'] ?></td>
          <td><?= $editorial['telefono'] ?></td>
          <td><?= $editorial['correo'] ?></td>
          <td><?= $editorial['direccion'] ?></td>
          <td>
            <span class="badge bg-<?= $editorial['estado'] === 'Activo' ? 'success' : 'secondary' ?>">
              <?= $editorial['estado'] ?>
            </span>
          </td>

          <td>
            <?php
            if ($editorial['estado'] === 'Activo') : ?>
              <div class="d-flex gap-2">
                <a href="index.php?controller=Editorial&action=editarEditorial&id=<?= $editorial['id_editorial'] ?>" class="btn btn-warning" role="button">Editar</a>
                <a href="index.php?controller=Editorial&action=desactivarEditorial&id=<?= $editorial['id_editorial'] ?>" class="btn btn-danger" role="button">Eliminar</a>
              </div>
            <?php else:  ?>
              <a href="index.php?controller=Editorial&action=activarEditorial&id=<?= $editorial['id_editorial'] ?>" class="btn btn-success" role="button">Activar</a>
            <?php endif;  ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>