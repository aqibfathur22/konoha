<?php  

class Register_model {
    private $conn;
    private $table_name = "log_admin"; // sesuaikan dengan nama tabel kamu

    public function __construct() {
        $this->conn = new Database();
    }

    public function register($username, $password) {
        // Cek apakah username sudah ada
        $this->conn->query("SELECT * FROM {$this->table_name} WHERE nama = :nama");
        $this->conn->bind(":nama", $username);
        if ($this->conn->single()) {
            return false; // Username sudah ada
        }

        // Insert user baru
        $this->conn->query("INSERT INTO {$this->table_name} (nama, password) VALUES (:nama, :password)");
        $this->conn->bind(":nama", $username);
        $this->conn->bind(":password", $password); // sudah hash dari controller

        return $this->conn->execute(); // return true jika berhasil
    }
}
?>
