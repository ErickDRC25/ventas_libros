<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form method="POST" action="index.php?controller=Auth&action=autenticar">
            <h1 class="text-center">Iniciar Session</h1>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="correo" class="form-control" id="email" aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="contraseña" class="form-control" id="password">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <!-- Botón Cancelar para regresar al catálogo -->
            <a href="index.php?controller=Catalogo&action=index" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

</body>

</html>