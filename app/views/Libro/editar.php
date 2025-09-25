<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h2 class="card-title mb-0 text-center">
                    <i class="bi bi-pencil-square"></i> Actualizar Libro
                </h2>
            </div>
            <div class="card-body">
                <form action="index.php?controller=Libro&action=actualizar" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $libro['id_libro'] ?>">
                    <input type="hidden" name="imagen_actual" value="<?= $libro['imagen'] ?>">

                    <div class="row g-3">
                        <!-- Información Básica -->
                        <div class="col-md-8">
                            <label for="titulo" class="form-label">
                                <i class="bi bi-bookmark"></i> Título del Libro
                            </label>
                            <input type="text" class="form-control" id="titulo" name="txtTitulo"
                                value="<?= $libro['titulo'] ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="isbn" class="form-label">
                                <i class="bi bi-upc-scan"></i> ISBN
                            </label>
                            <input type="text" class="form-control" id="isbn" name="txtIbsn"
                                value="<?= $libro['isbn'] ?>" required>
                        </div>

                        <!-- Autor y Editorial -->
                        <div class="col-md-6">
                            <label for="autor_id" class="form-label">
                                <i class="bi bi-person"></i> Autor
                            </label>
                            <select class="form-select" id="autor_id" name="txtAutorId" required>
                                <?php foreach ($autores as $autor): ?>
                                    <option value="<?= $autor['id_autor'] ?>"
                                        <?= $libro['id_autor'] == $autor['id_autor'] ? 'selected' : '' ?>>
                                        <?= $autor['nombre_autor'] . ' ' . $autor['apellido_autor'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="editorial_id" class="form-label">
                                <i class="bi bi-building"></i> Editorial
                            </label>
                            <select class="form-select" id="editorial_id" name="txtEditorialId" required>
                                <?php foreach ($editoriales as $editorial): ?>
                                    <option value="<?= $editorial['id_editorial'] ?>"
                                        <?= $libro['id_editorial'] == $editorial['id_editorial'] ? 'selected' : '' ?>>
                                        <?= $editorial['nombre_editorial'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Detalles del Libro -->
                        <div class="col-md-4">
                            <label for="genero" class="form-label">
                                <i class="bi bi-tags"></i> Género
                            </label>
                            <input type="text" class="form-control" id="genero" name="txtGenero"
                                value="<?= $libro['genero'] ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="anio_publicacion" class="form-label">
                                <i class="bi bi-calendar"></i> Año Publicación
                            </label>
                            <input type="number" class="form-control" id="anio_publicacion" name="txtAnioPublicacion"
                                value="<?= $libro['anio_publicacion'] ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="stock" class="form-label">
                                <i class="bi bi-box"></i> Stock
                            </label>
                            <input type="number" class="form-control" id="stock" name="txtStock"
                                value="<?= $libro['stock'] ?>">
                        </div>

                        <!-- Precio -->
                        <div class="col-md-6">
                            <label for="precio" class="form-label">
                                <i class="bi bi-currency-dollar"></i> Precio (S/)
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">S/</span>
                                <input type="number" class="form-control" id="precio" name="txtPrecio"
                                    step="0.01" value="<?= $libro['precio'] ?>" required>
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="col-md-6">
                            <label for="imagen" class="form-label">
                                <i class="bi bi-image"></i> Imagen del Libro
                            </label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                            <?php if ($libro['imagen']): ?>
                                <div class="mt-2">
                                    <small class="text-muted">Imagen actual:</small>
                                    <img src="<?= $libro['imagen'] ?>" alt="Imagen actual"
                                        class="img-thumbnail mt-1" width="60">
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Botones -->
                        <div class="col-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="index.php?controller=Libro&action=index" class="btn btn-secondary me-md-2">
                                    <i class="bi bi-arrow-left"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg"></i> Actualizar Libro
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>