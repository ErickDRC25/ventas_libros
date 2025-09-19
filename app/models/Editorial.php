<?php
require_once 'app/config/database.php';

class Editorial{

    private $db ;

    public function __construct()
    {
        $this->db=Database::conectar();
    }

    public function listar(){
        $stmt = $this->db->query("SELECT * FROM editorial");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function guardar($data){
        $sql= "INSERT INTO editorial (nombre_editorial ,telefono,correo,direccion,estado )
         values (:nombre_editorial,:telefono,:correo,:direccion,Activo)";

         $stmt=$this->db->prepare($sql);

         return $stmt->execute([
            ":nombre_editorial" => $data['nombre_editorial'],
            ":telefono" => $data['telefono'],
            ":correo" => $data["correo"],
            ":direccion" =>$data ["direccion"]
         ]);
    }


    public function obtenerId($id){
        $sql = "SELECT * FROM editorial where id_editorial=:id_edi";
        $stmt= $this->db->prepare($sql);
        $stmt->execute([
            ":id_edi"=> $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($data){
        $sql = "UPDATE editorial set nombre_editorial=:nombre_editorial , telefono=:telefono , correo=:correo , direccion=:direccion
                where id_editorial =:id_editorial";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function desactivar($id){
        $sql = "UPDATE editorial set estado='Inactivo' where id_editorial=:id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ":id" => $id
        ]);
    }


    public function activar($id){
        $sql = "UPDATE editorial set estado = 'Activo' where id_editorial=:id";
        $stmt= $this->db->prepare($sql);
        return $stmt->execute([
            ":id" => $id
        ]);
    }


}

?>