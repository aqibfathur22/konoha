<?php  

class Pengguna_model {
    private $conn;
    private $table_name = "log_admin";

    public function __construct() {
        $this->conn = new Database();
    }

    public function updatePassword($id, $newPassword) {
        $this->conn->query("UPDATE {$this->table_name} SET password = :password WHERE id_admin = :id");
        $this->conn->bind(":password", $newPassword);
        $this->conn->bind(":id", $id);
        return $this->conn->execute();
    }

    public function delete($id) {
        $this->conn->query("DELETE FROM {$this->table_name} WHERE id_admin = :id");
        $this->conn->bind(":id", $id);
        return $this->conn->execute();
    }

    public function getProfilById($id) {
        $this->conn->query("SELECT * FROM {$this->table_name} WHERE id_admin = :id");
        $this->conn->bind(":id", $id);
        return $this->conn->single();
    }
    
    public function updateProfil($id, $namaDepan, $namaBelakang, $email) {
        $this->conn->query("UPDATE {$this->table_name} SET nama_depan = :depan, nama_belakang = :belakang, email = :email WHERE id_admin = :id");
        $this->conn->bind(':depan', $namaDepan);
        $this->conn->bind(':belakang', $namaBelakang);
        $this->conn->bind(':email', $email);
        $this->conn->bind(':id', $id);
        return $this->conn->execute();
    }
} 
   
?>