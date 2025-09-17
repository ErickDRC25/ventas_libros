<?php
    require_once 'app/models/Cliente.php';
    
    class AuthController{
        public function login(){
            require 'app/views/login.php';
        }

        public function autenticar(){
        $cliente = new Cliente();
        $data = $cliente->login($_POST['correo'],$_POST['contraseña']);

        if($data){
            $_SESSION['usuario'] = $data;
            header("Location: index.php?controller=Dashboard&action=index");
        }else{
            echo "<script>alert('credenciales incorrectas');window.location='index.php';</script>";
        }

    }

    }

     
    
?>