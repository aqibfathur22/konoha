<?php

class Register_model {
    private $conn;
    private $table_name = "log_admin";

    public function __construct() {
        $this->conn = new Database(); // pastikan class Database berfungsi
    }

    public function register($username, $password) {
        // Cek apakah nama sudah ada
        $this->conn->query("SELECT * FROM {$this->table_name} WHERE nama = :nama");
        $this->conn->bind(":nama", $username);

        if ($this->conn->single()) {
            return false; // Username sudah terdaftar
        }

        // Masukkan ke DB
        $this->conn->query("INSERT INTO {$this->table_name} (nama, password) VALUES (:nama, :password)");
        $this->conn->bind(":nama", $username);
        $this->conn->bind(":password", $password);

        return $this->conn->execute(); // true jika sukses
    }
}
