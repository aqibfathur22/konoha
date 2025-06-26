<?php 

class Beranda_model {
    private $conn;
    private $table_name = "pengaduan";

    public function __construct() {
        $this->conn = new Database();
    }

    public function getStatistik($data) {
        try {
            $query = "SELECT
                        COUNT(*) as total,
                        SUM(CASE WHEN status = 'menunggu' THEN 1 ELSE 0 END) as menunggu,
                        SUM(CASE WHEN status = 'diproses' THEN 1 ELSE 0 END) as diproses,
                        SUM(CASE WHEN status = 'selesai' THEN 1 ELSE 0 END) as selesai,
                        SUM(CASE WHEN status = 'ditolak' THEN 1 ELSE 0 END) as ditolak
                      FROM " . $this->table_name;

            $this->conn->query($query);
            $this->conn->execute();   

            $result = $this->conn->get();
            
            $data = [
                'total' => $result['total'],
                'menunggu' => $result['menunggu'],
                'diproses' => $result['diproses'],
                'selesai' => $result['selesai'],
                'ditolak' => $result['ditolak']
            ];
    
            return $data;
            
        } catch(Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            return false;
        }
    }

    public function getAllStatistik() {
        try {
            $query = "SELECT p.*, k.nama_kategori
                      FROM " . $this->table_name . " p
                      LEFT JOIN kategoripengaduan k ON p.id_kategori = k.id_kategori";
    
            $this->conn->query($query);

            return $this->conn->getAll();

        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  
    }

    public function getStatistikById($id) {
        try {
            $query = "SELECT p.*, k.nama_kategori
                      FROM " . $this->table_name . " p
                      LEFT JOIN kategoripengaduan k ON p.id_kategori = k.id_kategori
                      WHERE p.id_pengaduan = :id";
    
            $this->conn->query($query);
            $this->conn->bindParam(':id', $id);
    
            return $this->conn->get();

        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  
    }

    public function getMenungguStatistik() {
        try {
            $query = "SELECT p.*, k.nama_kategori
                      FROM " . $this->table_name . " p
                      LEFT JOIN kategoripengaduan k ON p.id_kategori = k.id_kategori 
                      WHERE p.status = 'menunggu'";
    
            $this->conn->query($query);

            return $this->conn->getAll();

        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  

    }
    
    public function getDiprosesStatistik() {
        try {
            $query = "SELECT p.*, k.nama_kategori
                      FROM " . $this->table_name . " p
                      LEFT JOIN kategoripengaduan k ON p.id_kategori = k.id_kategori 
                      WHERE p.status = 'diproses'";
    
            $this->conn->query($query);

            return $this->conn->getAll();

        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  
    }

    public function getSelesaiStatistik() {
        try {
            $query = "SELECT p.*, k.nama_kategori
                      FROM " . $this->table_name . " p
                      LEFT JOIN kategoripengaduan k ON p.id_kategori = k.id_kategori 
                      WHERE p.status = 'selesai'";
    
            $this->conn->query($query);

            return $this->conn->getAll();

        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  
    }

    public function getDitolakStatistik() {
        try {
            $query = "SELECT p.*, k.nama_kategori
                      FROM " . $this->table_name . " p
                      LEFT JOIN kategoripengaduan k ON p.id_kategori = k.id_kategori 
                      WHERE p.status = 'ditolak'";
    
            $this->conn->query($query);
    
            return $this->conn->getAll();

        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  

    }

    public function updateStatus($idPengaduan, $newStatus) {
        try {
            $allowedValues = ['menunggu', 'diproses', 'selesai', 'ditolak'];
            if (!in_array($newStatus, $allowedValues)) {
                throw new Exception("Nilai status tidak valid");
            }

            $query = "UPDATE " . $this->table_name . " SET status = :status WHERE id_pengaduan = :id_pengaduan";

            $this->conn->query($query);

            $this->conn->bindParam(':status', $newStatus);
            $this->conn->bindParam(':id_pengaduan', $idPengaduan);
            
            return $this->conn->execute();
            
        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  
    }

    public function delete($idPengaduan) {
        try {
            $query = "DELETE FROM " . $this->table_name . " WHERE id_pengaduan = :id_pengaduan";
    
            $this->conn->query($query);
            $this->conn->bindParam(':id_pengaduan', $idPengaduan);   
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