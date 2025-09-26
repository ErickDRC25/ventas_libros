<?php
require_once 'app/models/Cliente.php';

class AuthController
{
    public function login()
    {
        require 'app/views/login.php';
    }

    public function autenticar()
    {
        $cliente = new Cliente();
        $data = $cliente->login($_POST['correo'], $_POST['contraseña']);

        if ($data) {
            if ($data['estado'] == 'Inactivo') { // inactivo
                echo "<script>alert('Tu cuenta está desactivada. Contacta con el administrador.');window.location='index.php?controller=Auth&action=login';</script>";
                exit();
            }
            $_SESSION['id_cliente'] = $data['id_cliente'];
            $_SESSION['usuario'] = $data['nombre'] . ' ' . $data['apellido'];
            $_SESSION['rol'] = $data['id_rol'];

            // Redirigir según rol
            if ($data['id_rol'] == 1) { // Admin
                header("Location: index.php?controller=Dashboard&action=index");
            } else { // Cliente normal
                header("Location: index.php?controller=Catalogo&action=index");
            }
            exit();
        } else {
            echo "<script>alert('Credenciales incorrectas');window.location='index.php?controller=Auth&action=login';</script>";
        }
    }

    public function cerrar_sesion()
    {
        session_destroy();
        header("Location: index.php");
    }


    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'] ?? null;
            $direccion = $_POST['direccion'] ?? null;
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            
            if ($password !== $password2) {
                echo "<script>alert('Las contraseñas no coinciden');window.location='index.php?controller=Auth&action=registrar';</script>";
                exit();
            }

            $cliente = new Cliente();
            $resultado = $cliente->registrar($nombre, $apellido, $correo, $telefono, $direccion, $password);

            if ($resultado) {
                echo "<script>alert('Registro exitoso, ya puedes iniciar sesión');window.location='index.php?controller=Auth&action=login';</script>";
                exit;
            } else {
                echo "<script>alert('Error al registrar usuario');window.location='index.php?controller=Auth&action=registrar';</script>";
                exit;
            }
        } else {
            require_once "app/views/auth/register.php";
        }
    }
}
