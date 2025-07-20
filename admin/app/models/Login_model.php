<?php  

class Login_model {
    private $conn;
    private $table_name = "log_admin";

    public function __construct() {
        $this->conn = new Database();
    }

    public function login($username, $password) {
        $this->conn->query("SELECT * FROM {$this->table_name} WHERE nama = :nama");
        $this->conn->bind(":nama", $username);
        $user = $this->conn->single(); // atau single() kalau kamu pakai nama itu

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function findByUsername($username) {
        $this->conn->query("SELECT * FROM {$this->table_name} WHERE nama = :nama");
        $this->conn->bind(":nama", $username);
        return $this->conn->single();
    }
}
