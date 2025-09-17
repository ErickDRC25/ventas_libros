<?php

class Database {
    public static function conectar() {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=bd_ventas_libro", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}

?>
