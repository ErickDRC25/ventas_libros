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
}
