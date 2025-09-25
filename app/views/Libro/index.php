<div class="card shadow">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h2 class="card-title mb-0">
            <i class="bi bi-book"></i> Listado de Libros
        </h2>
        <a href="index.php?controller=Libro&action=crear" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle"></i> Agregar Libro
        </a>
    </div>
    <div class="card-body">
        <!-- Buscador -->
        <form action="index.php" method="get" class="mb-4">
            <input type="hidden" name="controller" value="Libro">
            <input type="hidden" name="action" value="buscarLibro">
            <div class="input-group">
                <input type="text" class="form-control" name="titulo" placeholder="Buscar libros por título...">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i> Buscar
                </button>
                <a href="index.php?controller=Libro&action=index" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-clockwise"></i> Mostrar Todos
                </a>
            </div>
        </form>

        <!-- Tabla -->
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>ISBN</th>
                        <th>Autor</th>
                        <th>Editorial</th>
                        <th>Género</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($libros as $p) : ?>
                        <tr>
                            <td><strong>#<?= $p['id_libro'] ?></strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <?php if ($p['imagen']): ?>
                                        <img src="<?= $p['imagen'] ?>" alt="<?= $p['titulo'] ?>"
                                            class="rounded me-2" width="40" height="50" style="object-fit: cover;">
                                    <?php endif; ?>
                                    <span><?= $p['titulo'] ?></span>
                                </div>
                            </td>
                            <td><?= $p['isbn'] ?: 'N/A' ?></td>
                            <td><?= $p['autor'] ?></td>
                            <td><?= $p['nombre_editorial'] ?></td>
                            <td><?= $p['genero'] ?: 'N/A' ?></td>
                            <td class="fw-bold text-success">S/ <?= number_format($p['precio'], 2) ?></td>
                            <td>
                                <span class="badge bg-<?= $p['stock'] > 0 ? 'primary' : 'danger' ?>">
                                    <?= $p['stock'] ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-<?= $p['estado'] === 'Activo' ? 'success' : 'secondary' ?>">
                                    <?= $p['estado'] ?>
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="index.php?controller=Libro&action=editar&id_libro=<?= $p['id_libro'] ?>"
                                        class="btn btn-warning btn-sm" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="index.php?controller=Libro&action=eliminar&id_libro=<?= $p['id_libro'] ?>"
                                        class="btn btn-danger btn-sm" title="Eliminar"
                                        onclick="return confirm('¿Eliminar este libro?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>