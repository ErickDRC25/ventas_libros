<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="card-title mb-0 text-center">
                    <i class="bi bi-book-plus"></i> Registrar Nuevo Libro
                </h2>
            </div>
            <div class="card-body">
                <form action="index.php?controller=Libro&action=guardar" method="post" enctype="multipart/form-data">
                    <div class="row g-3">
                        <!-- Información Básica -->
                        <div class="col-md-8">
                            <label for="titulo" class="form-label">
                                <i class="bi bi-bookmark"></i> Título del Libro
                            </label>
                            <input type="text" class="form-control" id="titulo" name="txtTitulo" required>
                        </div>
                        <div class="col-md-4">
                            <label for="isbn" class="form-label">
                                <i class="bi bi-upc-scan"></i> ISBN
                            </label>
                            <input type="text" class="form-control" id="isbn" name="txtIsbn" placeholder="Código ISBN">
                        </div>

                        <!-- Autor y Editorial -->
                        <div class="col-md-6">
                            <label for="autor_id" class="form-label">
                                <i class="bi bi-person"></i> Autor
                            </label>
                            <select class="form-select" id="autor_id" name="txtAutorId" required>
                                <option value="">Seleccione un autor</option>
                                <?php foreach ($autores as $autor): ?>
                                    <option value="<?= $autor['id_autor'] ?>">
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
                                <option value="">Seleccione una editorial</option>
                                <?php foreach ($editoriales as $editorial): ?>
                                    <option value="<?= $editorial['id_editorial'] ?>">
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
                            <input type="text" class="form-control" id="genero" name="txtGenero" placeholder="Ej: Novela, Ciencia Ficción">
                        </div>
                        <div class="col-md-4">
                            <label for="anio_publicacion" class="form-label">
                                <i class="bi bi-calendar"></i> Año Publicación
                            </label>
                            <input type="number" class="form-control" id="anio_publicacion" name="txtAnioPublicacion"
                                min="1900" max="<?= date('Y') ?>" value="<?= date('Y') ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="stock" class="form-label">
                                <i class="bi bi-box"></i> Stock
                            </label>
                            <input type="number" class="form-control" id="stock" name="txtStock" min="0" value="0">
                        </div>

                        <!-- Precio -->
                        <div class="col-md-6">
                            <label for="precio" class="form-label">
                                <i class="bi bi-currency-dollar"></i> Precio (S/)
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">S/</span>
                                <input type="number" class="form-control" id="precio" name="txtPrecio"
                                    step="0.01" min="0" placeholder="0.00">
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="col-md-6">
                            <label for="imagen" class="form-label">
                                <i class="bi bi-image"></i> Imagen del Libro
                            </label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                            <div class="form-text">Formatos: JPG, PNG, WEBP. Máx: 2MB</div>
                        </div>

                        <!-- Botones -->
                        <div class="col-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="index.php?controller=Libro&action=index" class="btn btn-secondary me-md-2">
                                    <i class="bi bi-arrow-left"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg"></i> Guardar Libro
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>