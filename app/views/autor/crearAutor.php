<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h2 class="card-title mb-0 text-center">
                    <i class="bi bi-person-plus"></i> Registrar Autor
                </h2>
            </div>
            <div class="card-body">
                <form action="index.php?controller=Autor&action=guardar" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre del Autor</label>
                            <input type="text" class="form-control" id="nombre" name="nombre_autor" required>
                        </div>
                        <div class="col-md-6">
                            <label for="apellido" class="form-label">Apellido del Autor</label>
                            <input type="text" class="form-control" id="apellido" name="apellido_autor" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nacionalidad" class="form-label">Nacionalidad</label>
                            <input type="text" class="form-control" id="nacionalidad" name="nacionalidad">
                        </div>
                        <div class="col-md-6">
                            <label for="fnacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" name="fecha_nacimiento" id="fnacimiento">
                        </div>
                        <div class="col-12">
                            <label for="Biografia" class="form-label">Biografía</label>
                            <textarea class="form-control" id="Biografia" name="biografia" rows="4"
                                placeholder="Breve biografía del autor..."></textarea>
                        </div>
                        <div class="col-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="index.php?controller=Autor&action=index" class="btn btn-secondary me-md-2">
                                    <i class="bi bi-arrow-left"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg"></i> Guardar Autor
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>