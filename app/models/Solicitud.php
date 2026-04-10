<?php

class Solicitud
{
    private $conn;
    private $table = "solicitudes";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function insertar($usuarioId, $animalId, $nombre, $contacto, $edad, $direccion, $familia, $experiencia, $vivienda, $motivo)
    {
        $estado = "Pendiente";
        $sql = "INSERT INTO {$this->table}
                (usuario_id, animal_id, nombre, contacto, edad, direccion, familia, experiencia, vivienda, motivo, estado)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iississssss", $usuarioId, $animalId, $nombre, $contacto, $edad, $direccion, $familia, $experiencia, $vivienda, $motivo, $estado);
        return $stmt->execute();
    }

    public function obtenerPorUsuario($usuarioId)
    {
        $sql = "SELECT s.*, a.nombre AS nombre_animal
                FROM {$this->table} s
                INNER JOIN animales a ON s.animal_id = a.id
                WHERE s.usuario_id = ?
                ORDER BY s.id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $usuarioId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerTodas()
    {
        $sql = "SELECT s.*, a.nombre AS nombre_animal
                FROM {$this->table} s
                INNER JOIN animales a ON s.animal_id = a.id
                ORDER BY s.id DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function contarPendientes()
    {
        $sql = "SELECT COUNT(*) AS total FROM {$this->table} WHERE estado = 'Pendiente'";
        $result = $this->conn->query($sql);
        $fila = $result->fetch_assoc();
        return $fila['total'] ?? 0;
    }
}