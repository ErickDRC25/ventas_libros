<div class="card shadow">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h2 class="card-title mb-0">
            <i class="bi bi-person-badge"></i> Listado de Autores
        </h2>
        <a href="index.php?controller=Autor&action=crearAutor" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle"></i> Agregar Autor
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Nacionalidad</th>
                        <th scope="col">Fecha Nac.</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($autores as $autor) { ?>
                        <tr>
                            <td><strong>#<?= $autor['id_autor'] ?></strong></td>
                            <td><?= $autor['nombre_autor'] ?></td>
                            <td><?= $autor['apellido_autor'] ?></td>
                            <td><?= $autor['nacionalidad'] ?></td>
                            <td><?= date('d/m/Y', strtotime($autor['fecha_nacimiento'])) ?></td>
                            <td>
                                <span class="badge bg-<?= $autor['estado'] === 'Activo' ? 'success' : 'secondary' ?>">
                                    <?= $autor['estado'] ?>
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="index.php?controller=Autor&action=editarAutor&id=<?= $autor['id_autor'] ?>"
                                        class="btn btn-warning btn-sm" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <?php if ($autor['estado'] === 'Activo') : ?>
                                        <a href="index.php?controller=Autor&action=desactivarAutor&id=<?= $autor['id_autor'] ?>"
                                            class="btn btn-danger btn-sm" title="Desactivar"
                                            onclick="return confirm('¿Desactivar este autor?')">
                                            <i class="bi bi-person-x"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="index.php?controller=Autor&action=activarAutor&id=<?= $autor['id_autor'] ?>"
                                            class="btn btn-success btn-sm" title="Activar"
                                            onclick="return confirm('¿Activar este autor?')">
                                            <i class="bi bi-person-check"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>