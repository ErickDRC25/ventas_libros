<div class="d-flex justify-content-between mb-3">
    <h3>Listado de Editoriales</h3>

</div>

<div class="container text-center">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE C.</th>
                <th scope="col">APELLIDO</th>
                <th scope="col">CORREO</th>
                <th scope="col">CONTRASEÑA</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">DIRECCION</th>
                <th scope="col">ROL</th>
                <th scope="col">ESTADO</th>
                <th scope="col">ACCIONES</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente) { ?>
                <tr>
                    <td><?= $cliente['id_cliente'] ?></td>
                    <td><?= $cliente['nombre'] ?></td>
                    <td><?= $cliente['apellido'] ?></td>
                    <td><?= $cliente['correo'] ?></td>
                    <td><?= $cliente['password'] ?></td>
                    <td><?= $cliente['telefono'] ?></td>
                    <td><?= $cliente['direccion'] ?></td>
                    <td>
                        <?php if ($cliente['id_rol'] === 2): ?>
                            <span class="badge bg-primary">Cliente</span>
                        <?php elseif ($cliente['id_rol'] === 1): ?>
                            <span class="badge bg-danger">Admin</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Desconocido</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $cliente['estado'] ?></td>
                    <td>
                        <?php if ($cliente['id_rol'] === 2) : ?>
                            <div class="d-flex gap-2">
                                <a href="index.php?controller=Cliente&action=cambiarRolAdmin&id=<?= $cliente['id_cliente'] ?>"
                                    class="btn btn-warning" role="button">Rol Admin</a>

                                <?php if ($cliente['estado'] == 'Activo'): ?>
                                    
                                    <a href="index.php?controller=Cliente&action=desactivar&id=<?= $cliente['id_cliente'] ?>"
                                        class="btn btn-danger" role="button">Desactivar</a>
                                <?php else: ?>
                                    
                                    <a href="index.php?controller=Cliente&action=activar&id=<?= $cliente['id_cliente'] ?>"
                                        class="btn btn-success" role="button">Activar</a>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div class="d-flex gap-2">
                                <a href="index.php?controller=Cliente&action=cambiarRolCliente&id=<?= $cliente['id_cliente'] ?>"
                                    class="btn btn-success" role="button">Rol Cliente</a>

                                <?php if ($cliente['estado'] == 'Activo'): ?>
                                    <a href="index.php?controller=Cliente&action=desactivar&id=<?= $cliente['id_cliente'] ?>"
                                        class="btn btn-danger" role="button">Desactivar</a>
                                <?php else: ?>
                                    <a href="index.php?controller=Cliente&action=activar&id=<?= $cliente['id_cliente'] ?>"
                                        class="btn btn-success" role="button">Activar</a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>