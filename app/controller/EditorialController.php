<?php
require 'app/models/Editorial.php';

class EditorialController{
    public function index(){
        if(!isset($_SESSION['usuario'])){
            header("Location: index.php");
            exit();
        }

        $editorial = new Editorial();
        $editoriales=$editorial->listar();
        $vista="app/views/editorial/index.php";
        $titulo="Listado de Editoriales";
        require 'app/views/layout.php';
    }

    public function crearEditorial(){ //Componentes de vista
        $vista = "app/views/editorial/crearEditorial.php";
        $titulo= "Agregar Editorial";
        require 'app/views/layout.php';
    }

    public function guardar(){
        if(!isset($_SESSION['usuario'])){
            header("Location: index.php");
            exit();
        }

        $data=[
            "nombre_editorial" => $_POST["nombre_editorial"] ?? '',
            "telefono"=> $_POST["telefono"] ?? '',
            "correo" => $_POST["correo"] ?? '',
            "direccion" => $_POST['direccion'] ?? ''
        ];

        $editorial = new Editorial();

        if($editorial->guardar($data)){
            header("Location: index.php?controller=Editorial&action=index");
            exit();
        } else {
            echo "<script>alert('Error al guardar el editorial'); windows.history.back();</script>";
        }
    }

    public function editarEditorial(){
        $id=$_GET['id'] ?? '';

        if(!$id){
            echo "ID no identificado";
            return;
        }

        $editorial = new Editorial();
        $editorial= $editorial->obtenerId($id);

        if(!$editorial){
            echo "Editorial no encontrado";
            return;
        }

        $vista = 'app/views/editorial/editarEditorial.php';
        $titulo='Actualizar Editorial';
        require 'app/views/layout.php';
    }


    public function actualizar(){
        $data=[
            "id_editorial" =>$_POST['id_editorial'],
            "nombre_editorial" =>$_POST['nombre_editorial'],
            "telefono" =>$_POST['telefono'],
            "correo" =>$_POST['correo'],
            "direccion" =>$_POST['direccion']
        ];

        $editorial = new Editorial();
        $editorial->actualizar($data);
        header("Location: index.php?controller=Editorial&action=index");
    }

    public function desactivarEditorial(){
        $id = $_GET['id'] ??'';

        if(!$id){
            echo "Id no identificado";
            return;
        }


        $editorial= new Editorial();
        $editorial->desactivar($id);
        header("Location: index.php?controller=Editorial&action=index");
        exit();
    }

    public function activarEditorial(){
        $id=$_GET['id'] ?? '';

        if(!$id){
            echo "Id no identificado";
            return;
        }

        $editorial = new Editorial;
        $editorial->activar($id);
        header("Location: index.php?controller=Editorial&action=index");
        exit();
    }

}



?>