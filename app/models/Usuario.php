<?php

class Usuario
{
    private $conn;
    private $table = "usuarios";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function buscarPorUsuarioOCorreo($dato)
    {
        $sql = "SELECT * FROM {$this->table} WHERE usuario = ? OR correo = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $dato, $dato);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
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

    public function actualizarPerfil($id, $nombre, $correo, $telefono, $direccion, $vivienda, $experiencia)
    {
        $sql = "UPDATE {$this->table}
                SET nombre = ?, correo = ?, telefono = ?, direccion = ?, vivienda = ?, experiencia = ?
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssi", $nombre, $correo, $telefono, $direccion, $vivienda, $experiencia, $id);
        return $stmt->execute();
    }
}