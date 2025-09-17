<div class="d-flex justify-content-between mb-3">
    <h3>Listado de Autores</h3>
    <a href="index.php?controller=Producto&action=crear" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle me-1"></i>
        Agregar Productos
    </a>
</div>
<table class="table table-bordered table-hover">

    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $p) :  ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['codigo'] ?></td>
                <td><?= $p['nombre'] ?></td>
                <td><?= $p['descripcion'] ?></td>
                <td><?= $p['precio'] ?></td>
                <td>
                    <span class="badge bg-<?= $p['estado'] === 'Activo' ? 'success' : 'secondary' ?>">
                        <?= $p['estado'] ?>
                    </span>
                </td>

                <td>
                    <a href="index.php?controller=Producto&action=editar&id=<?= $p['id'] ?>" class="btn btn-warning me-1">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="index.php?controller=Producto&action=eliminar&id=<?= $p['id'] ?>"
                        class="btn btn-danger me-1"
                        onclick="return confirm('¿Estas seguro de que deseas eliminar este producto?')">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>

</table>