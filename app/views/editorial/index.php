<div class="card shadow">
    <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
        <h2 class="card-title mb-0">
            <i class="bi bi-building"></i> Listado de Editoriales
        </h2>
        <a href="index.php?controller=Editorial&action=crearEditorial" class="btn btn-dark btn-sm">
            <i class="bi bi-plus-circle"></i> Agregar Editorial
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($editoriales as $editorial) { ?>
                        <tr>
                            <td><strong>#<?= $editorial['id_editorial'] ?></strong></td>
                            <td><?= $editorial['nombre_editorial'] ?></td>
                            <td><?= $editorial['telefono'] ?: 'N/A' ?></td>
                            <td><?= $editorial['correo'] ?: 'N/A' ?></td>
                            <td><?= $editorial['direccion'] ?: 'N/A' ?></td>
                            <td>
                                <span class="badge bg-<?= $editorial['estado'] === 'Activo' ? 'success' : 'secondary' ?>">
                                    <?= $editorial['estado'] ?>
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="index.php?controller=Editorial&action=editarEditorial&id=<?= $editorial['id_editorial'] ?>"
                                        class="btn btn-warning btn-sm" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <?php if ($editorial['estado'] === 'Activo') : ?>
                                        <a href="index.php?controller=Editorial&action=desactivarEditorial&id=<?= $editorial['id_editorial'] ?>"
                                            class="btn btn-danger btn-sm" title="Desactivar"
                                            onclick="return confirm('¿Desactivar esta editorial?')">
                                            <i class="bi bi-building-x"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="index.php?controller=Editorial&action=activarEditorial&id=<?= $editorial['id_editorial'] ?>"
                                            class="btn btn-success btn-sm" title="Activar"
                                            onclick="return confirm('¿Activar esta editorial?')">
                                            <i class="bi bi-building-check"></i>
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
