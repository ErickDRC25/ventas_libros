<?php

require_once 'app/models/Libro.php';

class LibroController
{
    public function index()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        }
        //creamos una variable que va a contener un objeto tipo libro
        $libroModel = new Libro();
        $libros = $libroModel->obtenerTodos();
        $vista = 'app/views/Libro/index.php';
        $titulo = 'listado de libros';

        require 'app/views/layout.php';
    }

    public function buscarLibro()
    {
        $titulo_busqueda = $_GET['titulo'] ?? '';

        $libroModel = new Libro();
        $libros = $libroModel->buscarTitulo($titulo_busqueda);

        $titulo_vista = 'Resultados de Búsqueda';
        $vista = 'app/views/Libro/index.php';

        require_once 'app/views/layout.php';
    }

    public function crear()
    {
        require_once 'app/models/Autor.php';
        require_once 'app/models/Editorial.php';

        $autorModel = new Autor();
        $editorialModel = new Editorial();

        $autores = $autorModel->listar();
        $editoriales = $editorialModel->listar();
        $vista = 'app/views/Libro/crear.php';
        $titulo = "Agregar Libros";
        require 'app/views/layout.php';
    }


    public function guardar()
    {

        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        }

        $rutaImagen = null;
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $directorio = "public/imagenes/libros/";

            // Crear carpeta si no existe
            if (!file_exists($directorio)) {
                mkdir($directorio, 0777, true);
            }

            // Nombre único
            $nombreArchivo = time() . "_" . basename($_FILES['imagen']['name']);
            $rutaDestino = $directorio . $nombreArchivo;

            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
                $rutaImagen = $rutaDestino;
            }
        }

        $data = [
            'titulo' => $_POST['txtTitulo'] ?? '',
            'isbn' => $_POST['txtIsbn'] ?? '', // Nota: este sigue siendo un error de ortografía
            'id_autor' => $_POST['txtAutorId'] ?? '',
            'id_editorial' => $_POST['txtEditorialId'] ?? '',
            'genero' => $_POST['txtGenero'] ?? '',
            'anio_publicacion' => $_POST['txtAnioPublicacion'] ?? '',
            'precio' => $_POST['txtPrecio'] ?? '',
            'stock' => $_POST['txtStock'] ?? '',
            'imagen' => $rutaImagen ?? '',
        ];
        $libro =  new Libro();

        if ($libro->guardar($data)) {
            header('Location: index.php?controller=Libro&action=index');
            exit();
        } else {
            echo "<script>alert('Error al guardar el producto');windows.history.back();</script>";
        }
    }


    public function editar()
    {
        $id = $_GET['id_libro'] ?? null;

        if (!$id) {
            echo "ID no identificado";
            return;
        }
        $libroModel = new Libro();
        $libro = $libroModel->obtenerId($id);

        if (!$libro) {
            echo "Libro no encontrado";
            return;
        }

        // Traer autores y editoriales para el formulario
        require_once 'app/models/Autor.php';
        require_once 'app/models/Editorial.php';
        $autorModel = new Autor();
        $editorialModel = new Editorial();
        $autores = $autorModel->listar(); // Método para listar autores
        $editoriales = $editorialModel->listar(); // Método para listar editoriales

        $vista = 'app/views/Libro/editar.php';
        $titulo = "Editar Libro";
        require 'app/views/layout.php';
    }

    //falta
    public function actualizar()
{
    // Verificar si el archivo de imagen fue subido
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        // Procesar la nueva imagen
        $directorio = "public/imagenes/libros/";

        // Crear carpeta si no existe
        if (!file_exists($directorio)) {
            mkdir($directorio, 0777, true);
        }

        // Nombre único para el archivo
        $nombreArchivo = time() . "_" . basename($_FILES['imagen']['name']);
        $rutaDestino = $directorio . $nombreArchivo;

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            // Si la imagen se sube correctamente, actualizamos la URL
            $rutaImagen = $rutaDestino;
        } else {
            // Si no se pudo cargar la imagen, mantener la imagen actual (en caso de no querer cambiarla)
            $rutaImagen = $_POST['imagen_actual']; // Usar la imagen anterior
        }
    } else {
        // Si no hay imagen nueva, usamos la imagen que ya está
        $rutaImagen = $_POST['imagen_actual']; // Usar la imagen anterior
    }

    $data = [
        'id_libro' => $_POST['id'] ?? '',
        'titulo' => $_POST['txtTitulo'] ?? '',
        'isbn' => $_POST['txtIbsn'] ?? '',
        'id_autor' => $_POST['txtAutorId'] ?? '',
        'id_editorial' => $_POST['txtEditorialId'] ?? '',
        'genero' => $_POST['txtGenero'] ?? '',
        'anio_publicacion' => $_POST['txtAnioPublicacion'] ?? '',
        'precio' => $_POST['txtPrecio'] ?? '',
        'stock' => $_POST['txtStock'] ?? '',
        'imagen' => $rutaImagen, // Aquí está la URL de la nueva imagen o la anterior
    ];

    $libro = new Libro();
    $libro->actualizar($data);  // Actualizamos el libro con los nuevos datos

    header('Location: index.php?controller=Libro&action=index');
    exit();
}


    //hasta aqui
    public function eliminar()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        }
        $id = $_GET['id_libro'] ?? null;

        if (!$id) {
            echo "ID no identificado";
            return;
        }
        $producto = new Libro();
        $producto->inactivar($id);
        header('Location: index.php?controller=Libro&action=index');
        exit();
    }
}
