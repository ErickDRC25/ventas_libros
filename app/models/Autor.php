<?php
require 'app/config/database.php';

class Autor
{
    private $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }


    public function listar(){
        $stmt=$this->db->query("SELECT * FROM autor");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function guardar($data){
        $sql="INSERT INTO autor (nombre_autor,apellido_autor,nacionalidad,fecha_nacimiento,biografia,estado)
        values(:nombre_autor,:apellido_autor,:nacionalidad,:fecha_nacimiento,:biografia,'Activo')";

        $stmt=$this->db->prepare($sql);
        return $stmt->execute([
        ':nombre_autor'     => $data['nombre_autor'],
        ':apellido_autor'   => $data['apellido_autor'],
        ':nacionalidad'     => $data['nacionalidad'],
        ':fecha_nacimiento' => $data['fecha_nacimiento'],
        ':biografia'        => $data['biografia'],
    ]);
    }

    public function obtenerId($id){
        $sql = "SELECT * FROM autor where id_autor=:id_autor";
        $stmt=$this->db->prepare($sql);
        $stmt->execute([
            ":id_autor"=>$id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function actualizar($data){
        $sql = "UPDATE autor set nombre_autor=:nombre_autor, apellido_autor=:apellido_autor,nacionalidad=:nacionalidad,
        fecha_nacimiento=:fecha_nacimiento,biografia=:biografia";

        $stmt=$this->db->prepare($sql);
        return $stmt->execute([$data]);
    }

    
    public function desactivar($id){
        $sql= "UPDATE autor set estado='Inactivo' where id=:id";
        $stmt=$this->db->prepare($sql);
        return $stmt->execute([
            "id"=>$id
        ]);
    }

    public function activar($id){
        $sql = "UPDATE autor set estado='Activo' where id=:id";
        $stmt= $this->db->prepare($sql);
        return $stmt->execute([
            "id"=>$id
        ]);
    }

}
