<?php

class Cita
{
    private $conn;
    private $table = "citas";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function insertar($usuarioId, $nombre, $contacto, $fecha, $hora, $personas, $motivo, $comentarios)
    {
        $sql = "INSERT INTO {$this->table}
                (usuario_id, nombre, contacto, fecha, hora, personas, motivo, comentarios)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issssiss", $usuarioId, $nombre, $contacto, $fecha, $hora, $personas, $motivo, $comentarios);
        return $stmt->execute();
    }
}