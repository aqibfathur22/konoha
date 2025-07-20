<?php 

class Profil_model {
    private $conn;
    private $table_name = 'profil_desa';

    public function __construct() {
        $this->conn = new Database();
    }
    public function getProfilAll() {
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
}

?>