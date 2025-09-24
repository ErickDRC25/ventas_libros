<?php
require_once 'app/config/database.php';

class Venta
{
    private $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    public function crear($data)
    {
        $sql = "INSERT INTO venta (id_cliente, monto_total) VALUES (:id_cliente, :monto_total)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id_cliente' => $data['id_cliente'],
            ':monto_total' => $data['monto_total']
        ]);

        return $this->db->lastInsertId();
    }

    public function obtenerPorCliente($id_cliente)
    {
        $sql = "SELECT v.*, COUNT(dv.id_detalle) as total_items 
                FROM venta v 
                LEFT JOIN detalle_venta dv ON v.id_venta = dv.id_venta 
                WHERE v.id_cliente = :id_cliente 
                GROUP BY v.id_venta 
                ORDER BY v.fecha_venta DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id_cliente' => $id_cliente]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
