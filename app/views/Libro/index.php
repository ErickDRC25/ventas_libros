<div class="container mt-4">
    <div class="card shadow mb-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h1 class="card-title text-center my-0 w-100">LISTA DE LIBROS</h1>
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
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" name="titulo" placeholder="Buscar libros...">
                    <button type="submit" class="btn btn-primary me-2">BUSCAR</button>
                    <a href="index.php?controller=Libro&action=index" class="btn btn-secondary">ATRAS</a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">ID LIBRO</th>
                            <th scope="col">TÍTULO</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">AUTOR</th>
                            <th scope="col">ID EDITORIAL</th>
                            <th scope="col">GENERO</th>
                            <th scope="col">AÑO PUBLICACION</th>
                            <th scope="col">PRECIO</th>
                            <th scope="col">STOCK</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($libros  as $p) : ?>
                            <tr>
                                <td><?= $p['id_libro'] ?></td>
                                <td><?= $p['titulo'] ?></td>
                                <td><?= $p['isbn'] ?></td>
                                <td><?= $p['id_autor'] ?></td>
                                <td><?= $p['id_editorial'] ?></td>
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
                                    <a href="index.php?controller=Libro&action=editar&id_libro=<?= $p['id_libro'] ?>" class="btn btn-warning me-1">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="index.php?controller=Libro&action=eliminar&id_libro=<?= $p['id_libro'] ?>"
                                        class="btn btn-danger me-1"
                                        onclick="return confirm('¿Estas seguro de que deseas eliminar este producto?')">
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