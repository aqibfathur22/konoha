<?php  

class Kategori_model {
    private $conn;
    private $table_name = 'kategoripengaduan';

    public function __construct() {
        $this->conn = new Database;
    }

    public function getAllKategori() {
        try {
            $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_kategori ASC";
    
            $this->conn->query($query);

            return $this->conn->getAll();

        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  
    }

    public function create($data) {
        try {
            $namaKategori = htmlspecialchars(strip_tags($data['nama_kategori']));
    
            $query = "INSERT INTO " . $this->table_name . " (nama_kategori) VALUES (:nama_kategori)";
    
            $this->conn->query($query);
            $this->conn->bindParam(':nama_kategori', $namaKategori);
            $this->conn->execute();

            return $this->conn->rowCount();
        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  
    }

    public function delete($idKategori) {
        try {
            $query = "DELETE FROM " . $this->table_name . " WHERE id_kategori = :id_kategori";
    
            $this->conn->query($query);
            $this->conn->bindParam(':id_kategori', $idKategori);
            $this->conn->execute();

            return $this->conn->rowCount();
        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }
    }     
    
}
?>
