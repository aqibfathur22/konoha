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
        $this->conn->bindParam(":nama", $username);
        if ($this->conn->get()) {
            return false; // Username sudah ada
        }

        // Insert user baru
        $this->conn->query("INSERT INTO {$this->table_name} (nama, password) VALUES (:nama, :password)");
        $this->conn->bindParam(":nama", $username);
        $this->conn->bindParam(":password", $password); // sudah hash dari controller

        return $this->conn->execute(); // return true jika berhasil
    }
}
?>
