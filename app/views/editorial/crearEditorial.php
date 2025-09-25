<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h2 class="card-title mb-0 text-center">
                    <i class="bi bi-building-add"></i> Registrar Nueva Editorial
                </h2>
            </div>
            <div class="card-body">
                <form action="index.php?controller=Editorial&action=guardar" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">
                                <i class="bi bi-building"></i> Nombre de Editorial
                            </label>
                            <input type="text" class="form-control" id="nombre" name="nombre_editorial"
                                placeholder="Ingrese nombre de editorial" required>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">
                                <i class="bi bi-telephone"></i> Teléfono
                            </label>
                            <input type="text" class="form-control" id="telefono" name="telefono"
                                placeholder="Ej: 987654321">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope"></i> Correo Electrónico
                            </label>
                            <input type="email" class="form-control" id="email" name="correo"
                                placeholder="ejemplo@editorial.com">
                        </div>
                        <div class="col-md-6">
                            <label for="direccion" class="form-label">
                                <i class="bi bi-geo-alt"></i> Dirección
                            </label>
                            <input type="text" class="form-control" id="direccion" name="direccion"
                                placeholder="Dirección completa">
                        </div>
                        <div class="col-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="index.php?controller=Editorial&action=index" class="btn btn-secondary me-md-2">
                                    <i class="bi bi-arrow-left"></i> Volver al Listado
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg"></i> Registrar Editorial
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>