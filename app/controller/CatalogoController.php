<?php
require 'app/models/Libro.php';

class CatalogoController
{
    public function index()
    {
        $libro = new Libro();
        $libros = $libro->obtenerTodos();
        $vista = 'app/views/catalogo/index.php';
        require 'app/views/catalogo/index.php';
    }
}
