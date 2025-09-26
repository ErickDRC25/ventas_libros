<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="app/assets/css/login-style.css">
</head>

<body>
    <div class="login-container">
        <div class="login-form-section">
            <h2 class="text-center mb-2">LOGIN</h2>
            <p class="text-center text-muted mb-4">¡Bienvenido de nuevo!</p>

            <form method="POST" action="index.php?controller=Auth&action=autenticar">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="correo" class="form-control" id="email" placeholder="email@ejemplo.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label d-flex justify-content-between">
                        <span>Password</span>
                    </label>
                    <div class="input-group">
                        <input type="password" name="contraseña" class="form-control" id="password" placeholder="••••••••">
                    </div>
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary login-button">INGRESAR</button>
                </div>
                <div class="d-grid mb-3">
                    <a href="index.php?controller=Catalogo&action=index" class="btn btn-primary login-button">CANCELAR</a>
                </div>

                <p class="text-center mt-3">
                    ¿No tienes cuenta? <a href="index.php?controller=Auth&action=registrar">Regístrate</a>
                </p>

            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9fTU+INsYdYd+Q+2c5i/K2z4Z" crossorigin="anonymous"></script>
        <script>
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');

            if (togglePassword) {
                togglePassword.addEventListener('click', function(e) {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('bi-eye');
                    this.querySelector('i').classList.toggle('bi-eye-slash');
                });
            }
        </script>
</body>

</html>