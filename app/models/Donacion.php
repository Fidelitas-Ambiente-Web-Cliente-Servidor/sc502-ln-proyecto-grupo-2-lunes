<?php

class Donacion
{
    private $conn;
    private $table = "donaciones";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function insertar($nombre, $contacto, $monto, $metodo)
    {
        $sql = "INSERT INTO {$this->table} (nombre, contacto, monto, metodo)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssds", $nombre, $contacto, $monto, $metodo);
        return $stmt->execute();
    }

    public function obtenerTodas()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function sumarDonaciones()
    {
        $sql = "SELECT IFNULL(SUM(monto),0) AS total FROM {$this->table}";
        $result = $this->conn->query($sql);
        $fila = $result->fetch_assoc();
        return $fila['total'] ?? 0;
    }
}