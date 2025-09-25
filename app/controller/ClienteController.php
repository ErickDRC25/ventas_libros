<?php

require 'app/models/Cliente.php';


class ClienteController
{
    public function index()
    {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php");
            exit();
        }

        $cliente = new Cliente();
        $clientes = $cliente->listar();
        $vista = "app/views/cliente/index.php";
        $titulo = "Listado de Clientes";

        require 'app/views/layout.php';
    }


    public function desactivar()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();}


            $id = $_GET['id'] ?? null;

            if (!$id) {
                echo "ID no encontrado";
                return;
            }

            $cliente = new Cliente();
            $cliente->desactivar($id);
            header("Location: index.php?controller=Cliente&action=index");
            exit();
        }
    


    public function activar()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();}


            $id = $_GET['id'] ?? null;

            if (!$id) {
                echo "ID no encontrado";
                return;
            }

            $cliente = new Cliente();
            $cliente->activar($id);
            header("Location: index.php?controller=Cliente&action=index");
            exit();
        }
    

    public function cambiarRolAdmin()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "ID no encontrado";
            return;
        }
        $cliente = new Cliente();
        $cliente->cambiarRolAdmin($id);
        header("Location: index.php?controller=Cliente&action=index");
    }

    public function cambiarRolCliente()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "ID no encontrado";
            return;
        }
        $cliente = new Cliente();
        $cliente->cambiarRolCliente($id);
        header("Location: index.php?controller=Cliente&action=index");
    }
}
