<?php
require 'app/models/Libro.php';

class CatalogoController{
    public function index(){
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        }

        $libro = new Libro();
        $libros = $libro->obtenerTodos();
        $vista = 'app/views/catalogo/index.php';
        require 'app/views/catalogo/index.php';
    }
}

?>