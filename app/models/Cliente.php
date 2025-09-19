<?php
require_once 'app/config/database.php';

class Cliente{
    private $db;

    public function __construct()
    {
        $this->db=Database::conectar();
    }

    public function login($correo,$password){
        $sql = "SELECT * FROM cliente Where correo=:correo and password=SHA2(:password,256)";
        $stmt=$this->db->prepare($sql);
        $stmt->execute([
            'correo'=>$correo,
            'password'=>$password
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function listar(){
        $stmt=$this->db->query("SELECT * FROM cliente");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function desactivar($id){
        $sql = "UPDATE cliente set estado='Inactivo' where id_cliente=:id_cliente";
        $stmt=$this->db->prepare($sql);
        return $stmt->execute([
            "id_cliente" =>$id
        ]);
    }

    public function activar($id){
        $sql = "UPDATE cliente set estao='Activo' where id_cliente=:id_cliente";
        $stmt=$this->db->prepare($sql);
        return $stmt->execute([
            "id_cliente"=>$id
        ]);
    }
}

?>