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
            'password'=>$password
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
