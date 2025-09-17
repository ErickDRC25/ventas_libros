<div class="container mt-4">
    <div class="mt-5">
        <h2 class="text-center mb-5">Registrar autor</h2>
    </div>

    <div class="container ">
        <form action="index.php?controller=Autor&action=crearAutor" method="POST">
            <div class=" row">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre del Autor</label>
                    <input type="text" class="form-control" id="nombre" name="nombre_autor" placeholder="Mario">

                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido" class="form-label">Apellido del Autor</label>
                    <input type="text" class="form-control" id="apellido" name="apellido_autor" placeholder="Varga LLosa">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nacionalidad" class="form-label">Nacionalidad</label>
                    <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="Peru">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fnacimiento">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" id="fnacimiento">
                </div>
            </div>

            <div class="form-floating">
                <textarea class="form-control" placeholder="Escritor, novelista ..." id="Biografia"></textarea>
                <label for="Biografia">Biografia</label>
            </div>

             <div class="text-center mt-5">
                <button type="submit" class="btn btn-primary ">Submit</button>
                <a href="index.php?controller=Autor&action=index" class="btn btn-secondary" role="button">Cancelar</a>
             </div>

        </form>
    </div>

</div>