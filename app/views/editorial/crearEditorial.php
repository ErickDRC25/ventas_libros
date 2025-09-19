<div class="container mt-4">
    <div class="mt-5">
        <h2 class="text-center mb-5">Registrar Editorial</h2>
    </div>

    <div class="container ">
        <form action="index.php?controller=Autor&action=guardar" method="POST">
            <div class=" row">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre de Editorial</label>
                    <input type="text" class="form-control" id="nombre" name="nombre_editorial" placeholder="EditorialName">

                </div>
                <div class="col-md-6 mb-3">
                    <label for="Telefono" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="Telefono" name="telefono" placeholder="Varga LLosa">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input type="text" class="form-control" id="email" name="correo" placeholder="Peruano">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="dir" class="form-label">Direccion</label>
                    <input type="text" class="form-control" name="direccion" id="dir">
                </div>
            </div>

            

             <div class="text-center mt-5">
                <button type="submit" class="btn btn-primary ">Submit</button>
                <a href="index.php?controller=Autor&action=index" class="btn btn-secondary" role="button">Cancelar</a>
             </div>

        </form>
    </div>

</div>