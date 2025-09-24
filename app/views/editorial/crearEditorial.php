<div class="container mt-4">
    <div class="card shadow mb-4">
        <div class="mt-5">
            <h2 class="text-center mb-5"><b>Registrar Editorial</b></h2>
        </div>

        <div class="container ">
            <form action="index.php?controller=Autor&action=guardar" method="POST">
                <div class=" row">
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label"><b>Nombre de Editorial</b></label>
                        <input type="text" class="form-control" id="nombre" name="nombre_editorial" placeholder="EditorialName">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="Telefono" class="form-label"><b>Telefono</b></label>
                        <input type="text" class="form-control" id="Telefono" name="telefono" placeholder="Varga LLosa">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label"><b>Correo</b></label>
                        <input type="text" class="form-control" id="email" name="correo" placeholder="Peruano">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="dir" class="form-label"><b>Direccion</b></label>
                        <input type="text" class="form-control" name="direccion" id="dir">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col mb-4">
                        <button type="submit" class="btn btn-primary w-100">REGISTRAR</button>
                    </div>
                    <div class="col mb-4">
                        <a href="index.php?controller=Autor&action=index" class="btn btn-secondary w-100" role="button">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>