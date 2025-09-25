<?php
require_once 'app/models/Venta.php';
require_once 'app/models/DetalleVenta.php';

class VentaController
{
    public function index()
    {
        if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
            header("Location: index.php");
            exit();
        }

        $ventaModel = new Venta();
        $ventas = $ventaModel->obtenerTodas();

        $vista = "app/views/venta/index.php";
        $titulo = "Historial de Ventas";
        $icono = "cart-check";
        
        require 'app/views/layout.php';
    }

    public function detalle()
    {
        if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
            header("Location: index.php");
            exit();
        }

        $id_venta = $_GET['id'] ?? null;
        if (!$id_venta) {
            header("Location: index.php?controller=Venta&action=index");
            return;
        }

        $detalleModel = new DetalleVenta();
        $detalles = $detalleModel->obtenerPorVenta($id_venta);

        $vista = "app/views/venta/detalle.php";
        $titulo = "Detalle de Venta #" . $id_venta;
        $icono = "receipt";
        
        require 'app/views/layout.php';
    }
}