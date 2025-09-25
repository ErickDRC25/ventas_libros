<div class="card shadow">
    <div class="card-header bg-info text-white">
        <h2 class="card-title mb-0">
            <i class="bi bi-people"></i> Listado de Usuarios
        </h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente) { ?>
                        <tr>
                            <td><strong>#<?= $cliente['id_cliente'] ?></strong></td>
                            <td><?= $cliente['nombre'] ?></td>
                            <td><?= $cliente['apellido'] ?></td>
                            <td><?= $cliente['correo'] ?></td>
                            <td><?= $cliente['telefono'] ?: 'N/A' ?></td>
                            <td>
                                <?php if ($cliente['id_rol'] == 1): ?>
                                    <span class="badge bg-danger">Admin</span>
                                <?php else: ?>
                                    <span class="badge bg-primary">Cliente</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge bg-<?= $cliente['estado'] === 'Activo' ? 'success' : 'secondary' ?>">
                                    <?= $cliente['estado'] ?>
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <?php if ($cliente['id_rol'] == 2): ?>
                                        <a href="index.php?controller=Cliente&action=cambiarRolAdmin&id=<?= $cliente['id_cliente'] ?>"
                                            class="btn btn-warning btn-sm" title="Hacer Admin"
                                            onclick="return confirm('¿Hacer administrador?')">
                                            <i class="bi bi-person-gear"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="index.php?controller=Cliente&action=cambiarRolCliente&id=<?= $cliente['id_cliente'] ?>"
                                            class="btn btn-success btn-sm" title="Hacer Cliente"
                                            onclick="return confirm('¿Hacer cliente?')">
                                            <i class="bi bi-person"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if ($cliente['estado'] == 'Activo'): ?>
                                        <a href="index.php?controller=Cliente&action=desactivar&id=<?= $cliente['id_cliente'] ?>"
                                            class="btn btn-danger btn-sm" title="Desactivar"
                                            onclick="return confirm('¿Desactivar usuario?')">
                                            <i class="bi bi-person-x"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="index.php?controller=Cliente&action=activar&id=<?= $cliente['id_cliente'] ?>"
                                            class="btn btn-success btn-sm" title="Activar"
                                            onclick="return confirm('¿Activar usuario?')">
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