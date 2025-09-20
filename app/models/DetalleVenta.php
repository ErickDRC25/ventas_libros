<?php
require_once 'app/config/database.php';

class DetalleVenta
{
    private $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    public function crear($data)
    {
        $sql = "INSERT INTO detalle_venta (id_venta, id_libro, cantidad, precio_unitario, subtotal) 
                VALUES (:id_venta, :id_libro, :cantidad, :precio_unitario, :subtotal)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id_venta' => $data['id_venta'],
            ':id_libro' => $data['id_libro'],
            ':cantidad' => $data['cantidad'],
            ':precio_unitario' => $data['precio_unitario'],
            ':subtotal' => $data['subtotal']
        ]);

        return $this->db->lastInsertId();
    }

    public function obtenerPorVenta($id_venta)
    {
        $sql = "SELECT dv.*, l.titulo, l.imagen 
                FROM detalle_venta dv 
                JOIN libro l ON dv.id_libro = l.id_libro 
                WHERE dv.id_venta = :id_venta";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id_venta' => $id_venta]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
