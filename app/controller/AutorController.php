<?php
require "app/models/Autor.php";

class AutorController
{
    public function index()
    {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php");
            exit();
        }

        $autor = new Autor();
        $autores = $autor->listar();
        $vista = "app/views/autor/index.php";
        $titulo = "Listado de autores";

        require 'app/views/layout.php';
    }


    public function crearAutor()
    {
        $vista = 'app/views/autor/crearAutor.php';
        $titulo = 'Agregar Autor';
        require 'app/views/layout.php';
    }

    public function guardar()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        }

        $data=[
            'nombre_autor'=>$_POST['nombre_autor'] ?? '',
            'apellido_autor'=>$_POST['apellido_autor'] ?? '',
            'nacionalidad'=>$_POST['nacionalidad'] ?? '',
            'fecha_nacimiento'=>$_POST['fecha_nacimiento']?? '',
            'biografia'=>$_POST['biografia']
        ];

        $autor = new Autor();

        if($autor->guardar($data)){
            header("Location: index.php?controller=Autor&action=index");
            exit();
        }else{
            echo "<script>alert('Error al guardar el autor'); windows.history.back();</script>";
        }

    }
}
