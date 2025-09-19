<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center mb-0">ACTUALIZAR LIBRO</h2>
                </div>
                <div class="card-body">
                    <form action="index.php?controller=Libro&action=actualizar" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" name="id" id="codigo" class="form-control" value="<?= $libro['id_libro'] ?>">
                            <input type="hidden" name="imagen_actual" value="<?= $libro['imagen'] ?>"> <!-- Imagen actual -->
                        </div>
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="txtTitulo" value="<?= $libro['titulo']?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="txtIbsn"  value="<?= $libro['isbn']?>" required>
                        </div>
                        <div class="row g-3 mt-3">
                            <div class="col mb-3">
                                <label for="autor_id" class="form-label">Autor</label>
                                <select class="form-select" id="autor_id" name="txtAutorId" required>
                                    <?php foreach ($autores as $autor): ?>
                                        <option value="<?= $autor['id_autor'] ?>" <?= $libro['id_autor'] == $autor['id_autor'] ? 'selected' : '' ?>>
                                            <?= $autor['nombre_autor'] . ' ' . $autor['apellido_autor'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="editorial_id" class="form-label">Editorial</label>
                                <select class="form-select" id="editorial_id" name="txtEditorialId" required>
                                    <?php foreach ($editoriales as $editorial): ?>
                                        <option value="<?= $editorial['id_editorial'] ?>" <?= $libro['id_editorial'] == $editorial['id_editorial'] ? 'selected' : '' ?>>
                                            <?= $editorial['nombre_editorial'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col mt-3">
                                <label for="genero" class="form-label">Género</label>
                                <input type="text" class="form-control" id="genero" name="txtGenero"  value="<?= $libro['genero']?>" required>
                            </div>
                            <div class="col mt-3">
                                <label for="anio_publicacion" class="form-label">Año Publicación</label>
                                <input type="number" class="form-control" id="anio_publicacion" name="txtAnioPublicacion"  value="<?= $libro['anio_publicacion']?>" required>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col mt-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="precio" name="txtPrecio" step="0.01" required  value="<?= $libro['precio']?>">
                            </div>
                            <div class="col mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" name="txtStock"  value="<?= $libro['stock']?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen del libro</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                        </div>
                        <div class="row g-3 mt-4">
                            <div class="col mt-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-save me-1"></i>
                                    Actualizar
                                </button>
                            </div>
                            <div class="col mt-4">
                                <a href="index.php?controller=Libro&action=index" class="btn btn-secondary w-100">
                                    <i class="bi bi-x-circle me-1"></i>
                                    Cancelar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
