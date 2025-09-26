<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="app/assets/css/login-style.css"> <!-- mismo estilo del login -->
</head>

<body>
    <div class="login-container">
        <div class="login-form-section">
            <h2 class="text-center mb-2">REGISTRO</h2>
            <p class="text-center text-muted mb-4">Crea tu cuenta de cliente</p>

            <form method="POST" action="index.php?controller=Auth&action=registrar">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Tu nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Tu apellido" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" name="correo" class="form-control" id="correo" placeholder="email@ejemplo.com" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Opcional">
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <textarea name="direccion" class="form-control" id="direccion" rows="2" placeholder="Opcional"></textarea>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="••••••••" required>
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="password2" class="form-control" id="password2" placeholder="••••••••" required>
                </div>

                
                <input type="hidden" name="id_rol" value="2"> 
                <input type="hidden" name="estado" value="activo">

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary login-button">REGISTRARME</button>
                </div>
                <div class="d-grid mb-3">
                    <a href="index.php?controller=Auth&action=login" class="btn btn-primary login-button">CANCELAR</a>
                </div>

                <p class="text-center mt-3">
                    ¿Ya tienes cuenta? <a href="index.php?controller=Auth&action=login">Inicia Sesión</a>
                </p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
