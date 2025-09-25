<div class="container mt-4">
    <div class="card shadow mb-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h1 class="card-title my-0">LISTA DE LIBROS</h1>
            <a href="index.php?controller=Libro&action=crear" class="btn btn-success btn-sm">
                <i class="bi bi-plus-circle me-1"></i>
                AÑADIR LIBRO
            </a>
        </div>
        <div class="card-body">
            <form action="index.php" method="get">
                <input type="hidden" name="controller" value="Libro">
                <input type="hidden" name="action" value="buscarLibro">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="titulo" placeholder="Buscar libros...">
                    <button type="submit" class="btn btn-primary">BUSCAR</button>
                    <a href="index.php?controller=Libro&action=index" class="btn btn-secondary ms-2">ATRAS</a>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">TÍTULO</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">AUTOR</th>
                            <th scope="col">EDITORIAL</th>
                            <th scope="col">GÉNERO</th>
                            <th scope="col">AÑO PUBLICACIÓN</th>
                            <th scope="col">PRECIO</th>
                            <th scope="col">STOCK</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($libros as $p) : ?>
                            <tr>
                                <td><?= $p['id_libro'] ?></td>
                                <td><?= $p['titulo'] ?></td>
                                <td><?= $p['isbn'] ?></td>
                                <td><?= $p['nombre_autor'] ?></td>
                                <td><?= $p['nombre_editorial'] ?></td>
                                <td><?= $p['genero'] ?></td>
                                <td><?= $p['anio_publicacion'] ?></td>
                                <td><?= $p['precio'] ?></td>
                                <td><?= $p['stock'] ?></td>
                                <td>
                                    <span class="badge bg-<?= $p['estado'] === 'Activo' ? 'success' : 'secondary' ?>">
                                        <?= $p['estado'] ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="index.php?controller=Libro&action=editar&id_libro=<?= $p['id_libro'] ?>" class="btn btn-warning btn-sm me-1">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="index.php?controller=Libro&action=eliminar&id_libro=<?= $p['id_libro'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>