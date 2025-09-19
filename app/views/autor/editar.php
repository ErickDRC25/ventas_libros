<div class="container mt-4">
    <div class="mt-5">
        <h2 class="text-center mb-5">Actualizar Autor</h2>
    </div>

    <div class="container ">
        <form action="index.php?controller=Autor&action=actualizar" method="POST">
            <div class=" row">

                <div class="col-md-6 mb-3">
                    <label for="id" class="form-label">ID AUTOR</label>
                    <input type="text" class="form-control" id="id" name="id_autor" placeholder="Mario" value="<?= $autor['id_autor'] ?>" readonly>

                </div>

                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre del Autor</label>
                    <input type="text" class="form-control" id="nombre" name="nombre_autor" placeholder="Mario" value="<?= $autor['nombre_autor'] ?>">

                </div>

            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="apellido" class="form-label">Apellido del Autor</label>
                    <input type="text" class="form-control" id="apellido" name="apellido_autor" placeholder="Varga LLosa" value="<?= $autor['apellido_autor'] ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nacionalidad" class="form-label">Nacionalidad</label>
                    <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="Peruano" value="<?= $autor['nacionalidad'] ?>">
                </div>


            </div>



            <div class="form-floating row">
                <div class="col-md-6 mb-3">
                    <label for="fnacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="fecha_nacimiento" id="fnacimiento" value="<?= $autor['fecha_nacimiento'] ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Biografia">Biografia</label>
                    <textarea class="form-control" placeholder="Escritor, novelista ..." id="Biografia" name="biografia"><?= $autor['biografia'] ?></textarea>
                    
                </div>
            </div>

            <div class="text-center mt-5">
                <button type="submit" class="btn btn-primary ">Submit</button>
                <a href="index.php?controller=Autor&action=index" class="btn btn-secondary" role="button">Cancelar</a>
            </div>

        </form>
    </div>

</div>