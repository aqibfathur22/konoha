<?php 

class Berita_model {
    private $conn;
    private $table_name = "tb_berita";

    public function __construct() {
        $this->conn = new Database();
    }

    public function getBeritaAll() {
        try {
            $query = "SELECT * FROM " . $this->table_name;  
    
            $this->conn->query($query);

            return $this->conn->getAll();    

        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  
    }

    public function getBerita($id_berita) {
        try {
            $query = "SELECT * FROM " . $this->table_name . " WHERE id_berita = :id_berita LIMIT 4";
    
            $this->conn->query($query); 
            $this->conn->bindParam(':id_berita', $id_berita);

            return $this->conn->get();   

        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  
    }
    
    public function getSugestion($id_berita) {
        try {
            $query = "SELECT * FROM " . $this->table_name . " WHERE id_berita != :id_berita LIMIT 2";
        
            $this->conn->query($query);
            $this->conn->bindParam(':id_berita', $id_berita); // <--- ini WAJIB
            
            return $this->conn->getAll();    
            
        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  
    }
}

?>