<?php
require_once 'app/config/database.php';

class Libro
{
    private $db;

    public function  __construct()
    {
        $this->db = Database::conectar();
    }
    public function obtenerTodos()
    {
        $sql = "SELECT l.id_libro, l.titulo, l.isbn, l.id_autor, l.id_editorial,
            l.genero, l.anio_publicacion, l.precio, l.stock, l.imagen, l.estado,
            CONCAT(a.nombre_autor, ' ', a.apellido_autor) AS autor,
            e.nombre_editorial
        FROM libro l
        INNER JOIN autor a ON l.id_autor = a.id_autor
        INNER JOIN editorial e ON l.id_editorial = e.id_editorial
        ORDER BY l.id_libro ASC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarTitulo($titulo)
    {
        $buscar = "SELECT l.id_libro, l.titulo, l.isbn, l.id_autor, l.id_editorial,
                      l.genero, l.anio_publicacion, l.precio, l.stock, l.imagen, l.estado,
                      CONCAT(a.nombre_autor, ' ', a.apellido_autor) AS autor,
                      e.nombre_editorial
                FROM libro l
                INNER JOIN autor a ON l.id_autor = a.id_autor
                INNER JOIN editorial e ON l.id_editorial = e.id_editorial
                WHERE l.titulo LIKE :titulo";

        $st = $this->db->prepare($buscar);
        $st->execute(['titulo' => "%$titulo%"]);
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerId($id)
    {
        $sql = "SELECT l.*, 
                   CONCAT(a.nombre_autor, ' ', a.apellido_autor) AS autor,
                   e.nombre_editorial
            FROM libro l
            INNER JOIN autor a ON l.id_autor = a.id_autor
            INNER JOIN editorial e ON l.id_editorial = e.id_editorial
            WHERE l.id_libro = :id_libro";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_libro' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function guardar($data)
    {
        $sql = "INSERT INTO Libro(titulo, isbn, id_autor, id_editorial, genero, anio_publicacion, precio, stock,imagen) 
    VALUES(:titulo, :isbn, :id_autor, :id_editorial, :genero, :anio_publicacion, :precio, :stock,:imagen)";

        $st = $this->db->prepare($sql);

        return $st->execute($data);
    }

    public function actualizar($data)
    {
        $sql = "UPDATE Libro SET titulo = :titulo, isbn = :isbn, id_autor = :id_autor, id_editorial = :id_editorial, 
                genero = :genero,anio_publicacion=:anio_publicacion,precio= :precio, stock=:stock, imagen=:imagen
         WHERE id_libro = :id_libro";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }


    public function eliminar($id)
    {
        $sql = "DELETE FROM Libro WHERE id_libro = :id_libro";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id_libro' => $id]);
    }
    public function inactivar($id)
    {
        $sql = "UPDATE Libro SET estado = 'Inactivo' WHERE id_libro = :id_libro";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id_libro' => $id]);
    }
    public function activar($id)
    {
        $sql = "UPDATE Libro SET estado = 'Activo' WHERE id_libro = :id_libro";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id_libro' => $id]);
    }

    // Una funcion para actualizar los libros:
    public function actualizarStock($id_libro, $cantidad)
    {
        $sql = "UPDATE libro SET stock = stock + :cantidad WHERE id_libro = :id_libro";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':cantidad' => $cantidad,
            ':id_libro' => $id_libro
        ]);
    }
}
