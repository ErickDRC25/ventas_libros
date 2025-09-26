<?php
require_once 'app/config/database.php';

class Cliente
{
    private $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    public function login($correo, $password)
    {
        $sql = "SELECT * FROM cliente Where correo=:correo and password=SHA2(:password,256)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'correo' => $correo,
            'password' => $password
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function listar()
    {
        $stmt = $this->db->query("SELECT * FROM cliente");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function desactivar($id)
    {
        $sql = "UPDATE cliente set estado='Inactivo' where id_cliente=:id_cliente";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            "id_cliente" => $id
        ]);
    }

    public function activar($id)
    {
        $sql = "UPDATE cliente set estado='Activo' where id_cliente=:id_cliente";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            "id_cliente" => $id
        ]);
    }

    public function cambiarRolAdmin($id)
    {
        $sql = "UPDATE cliente set id_rol=1 where id_cliente=:id_cliente";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            "id_cliente" => $id
        ]);
    }

    public function cambiarRolCliente($id)
    {
        $sql = "UPDATE cliente set id_rol=2 where id_cliente=:id_cliente";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            "id_cliente" => $id
        ]);
    }


    public function registrar($nombre, $apellido, $correo, $telefono, $direccion, $password)
    {
        $sql = "INSERT INTO cliente 
            (nombre, apellido, correo, telefono, direccion, password, estado, id_rol) 
            VALUES (:nombre, :apellido, :correo, :telefono, :direccion, SHA2(:password,256), 'Activo', 2)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            "nombre" => $nombre,
            "apellido" => $apellido,
            "correo" => $correo,
            "telefono" => $telefono,
            "direccion" => $direccion,
            "password" => $password
        ]);
    }
}
