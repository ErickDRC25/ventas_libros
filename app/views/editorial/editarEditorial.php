<div class="container mt-4">
    <div class="mt-5">
        <h2 class="text-center mb-5">Actualizar Editorial</h2>
    </div>

    <div class="container ">
        <form action="index.php?controller=Editorial&action=actualizar" method="POST">
            <div class=" row">
                <div class="col-md-6 mb-3">
                    <label for="id" class="form-label">Id Editorial</label>
                    <input type="text" class="form-control" id="id" name="id_editorial" placeholder="EditorialName" value="<?=$editorial['id_editorial']?>" readonly>

                </div>
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre de Editorial</label>
                    <input type="text" class="form-control" id="nombre" name="nombre_editorial" placeholder="EditorialName" value="<?=$editorial['nombre_editorial']?>">

                </div>
                
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="Telefono" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="Telefono" name="telefono" placeholder="958471584" value="<?=$editorial['telefono']?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input type="text" class="form-control" id="email" name="correo" placeholder="correo@gmail.com" value="<?=$editorial['correo']?>">
                </div>

                
            </div>

            
        <div class="row">

            <div class="col-md-6 mb-3">
                    <label for="dir" class="form-label">Direccion</label>
                    <input type="text" class="form-control" name="direccion" id="dir" value="<?=$editorial['direccion']?>">
                </div>

             <div class="text-center mt-5 col-md-6 mb-3">
                <button type="submit" class="btn btn-primary ">Submit</button>
                <a href="index.php?controller=Editorial&action=index" class="btn btn-secondary" role="button">Cancelar</a>
             </div>

</div>

        </form>
    </div>

</div>