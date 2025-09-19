<?php

require 'app/models/Cliente.php';


    class ClienteController{
        public function index(){
            if(!isset($_SESSION['usuario'])){
                header("Location: index.php");
                exit();
            }

            $cliente = new Cliente();
            $clientes = $cliente->listar();
            $vista="app/views/cliente/index.php";
            $titulo="Listado de Clientes";

            require 'app/views/layout.php';

        }


        public function desactivar($id){
            if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();


            $id = $_GET['id'] ??null;

            if(!$id){
                echo "ID no encontrado";
                return;
            }

            $cliente = new Cliente();
            $cliente->desactivar();
            header("Location: index.php?controller=Cliente&action=index");
            exit();
        }
        }



    }






?>