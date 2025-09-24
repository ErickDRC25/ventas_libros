<?php
require_once 'app/models/Libro.php';
require_once 'app/models/Venta.php';
require_once 'app/models/DetalleVenta.php';

class CarritoController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Inicializar carrito si no existe
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }
    }

    // Agregar libro al carrito
    public function agregar()
    {
        if (!isset($_SESSION['id_cliente'])) {
            echo "<script>alert('Debe iniciar sesión para comprar');window.location='index.php?controller=Auth&action=login';</script>";
            return;
        }

        $id_libro = $_GET['id'] ?? null;
        $cantidad = $_POST['cantidad'] ?? 1;

        if (!$id_libro) {
            header("Location: index.php?controller=Catalogo&action=index");
            return;
        }

        $libroModel = new Libro();
        $libro = $libroModel->obtenerId($id_libro);

        if (!$libro || $libro['estado'] !== 'Activo') {
            echo "<script>alert('Libro no disponible');window.location='index.php?controller=Catalogo&action=index';</script>";
            return;
        }

        // Verificar stock
        if ($libro['stock'] < $cantidad) {
            echo "<script>alert('Stock insuficiente. Disponible: {$libro['stock']}');window.location='index.php?controller=Catalogo&action=index';</script>";
            return;
        }

        // Agregar al carrito
        if (isset($_SESSION['carrito'][$id_libro])) {
            $_SESSION['carrito'][$id_libro]['cantidad'] += $cantidad;
        } else {
            $_SESSION['carrito'][$id_libro] = [
                'id_libro' => $libro['id_libro'],
                'titulo' => $libro['titulo'],
                'precio' => $libro['precio'],
                'imagen' => $libro['imagen'],
                'cantidad' => $cantidad,
                'stock' => $libro['stock']
            ];
        }

        header("Location: index.php?controller=Carrito&action=ver");
    }

    // Ver carrito
    public function ver()
    {
        if (!isset($_SESSION['id_cliente'])) {
            header("Location: index.php?controller=Auth&action=login");
            return;
        }

        $vista = 'app/views/carrito/ver.php';

        // Usar layout específico para cliente
        require 'app/views/layout_cliente.php';
    }

    // Actualizar cantidad
    public function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_POST['cantidad'] as $id_libro => $cantidad) {
                if (isset($_SESSION['carrito'][$id_libro])) {
                    if ($cantidad <= 0) {
                        unset($_SESSION['carrito'][$id_libro]);
                    } else {
                        // Verificar stock máximo
                        $libroModel = new Libro();
                        $libro = $libroModel->obtenerId($id_libro);

                        if ($libro && $cantidad <= $libro['stock']) {
                            $_SESSION['carrito'][$id_libro]['cantidad'] = $cantidad;
                        }
                    }
                }
            }
        }

        header("Location: index.php?controller=Carrito&action=ver");
    }

    // Eliminar item del carrito
    public function eliminar()
    {
        $id_libro = $_GET['id'] ?? null;

        if ($id_libro && isset($_SESSION['carrito'][$id_libro])) {
            unset($_SESSION['carrito'][$id_libro]);
        }

        header("Location: index.php?controller=Carrito&action=ver");
    }

    // Vaciar carrito
    public function vaciar()
    {
        $_SESSION['carrito'] = [];
        header("Location: index.php?controller=Carrito&action=ver");
    }

    // Procesar compra
    public function procesarCompra()
    {
        if (!isset($_SESSION['id_cliente']) || empty($_SESSION['carrito'])) {
            header("Location: index.php?controller=Catalogo&action=index");
            return;
        }

        try {
            $ventaModel = new Venta();
            $detalleModel = new DetalleVenta();
            $libroModel = new Libro();

            // Calcular total
            $total = 0;
            foreach ($_SESSION['carrito'] as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }

            // Crear venta
            $id_venta = $ventaModel->crear([
                'id_cliente' => $_SESSION['id_cliente'],
                'monto_total' => $total
            ]);

            // Crear detalles y actualizar stock
            foreach ($_SESSION['carrito'] as $item) {
                $detalleModel->crear([
                    'id_venta' => $id_venta,
                    'id_libro' => $item['id_libro'],
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $item['precio'],
                    'subtotal' => $item['precio'] * $item['cantidad']
                ]);

                // Actualizar stock
                $libroModel->actualizarStock($item['id_libro'], -$item['cantidad']);
            }

            // Vaciar carrito y mostrar éxito
            $_SESSION['carrito'] = [];

            echo "<script>alert('Compra realizada con éxito! ID de venta: {$id_venta}');window.location='index.php?controller=Catalogo&action=index';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Error en la compra: {$e->getMessage()}');window.location='index.php?controller=Carrito&action=ver';</script>";
        }
    }
}
