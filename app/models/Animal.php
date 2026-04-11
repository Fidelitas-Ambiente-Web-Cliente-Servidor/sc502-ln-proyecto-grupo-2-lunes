<?php

class Animal
{
    private $conn;
    private $table = "animales";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function obtenerTodosDisponibles()
    {
        $sql = "SELECT * FROM {$this->table} WHERE estado = 'Disponible para adopción' ORDER BY id DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerTodos()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function insertar($nombre, $especie, $edad, $tamano, $estado, $descripcion, $imagen)
    {
        $sql = "INSERT INTO {$this->table} (nombre, especie, edad, tamano, estado, descripcion, imagen)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssss", $nombre, $especie, $edad, $tamano, $estado, $descripcion, $imagen);
        return $stmt->execute();
    }

    public function contarDisponibles()
    {
        $sql = "SELECT COUNT(*) AS total FROM {$this->table} WHERE estado = 'Disponible para adopción'";
        $result = $this->conn->query($sql);
        $fila = $result->fetch_assoc();
        return $fila['total'] ?? 0;
    }
    public function cambiarEstado($id, $estado)
    {
        $sql = "UPDATE {$this->table} SET estado = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $estado, $id);
        return $stmt->execute();
    }
}