<?php

class Statistik_model {
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
                        SUM(CASE WHEN status = 'selesai' THEN 1 ELSE 0 END) as selesai
                      FROM " . $this->table_name;
    
    
            $this->conn->query($query);
            $this->conn->execute();   

            $result = $this->conn->get();
            
            $data = [
                'total' => $result['total'],
                'menunggu' => $result['menunggu'],
                'diproses' => $result['diproses'],
                'selesai' => $result['selesai']
            ];
    
            return $data;
            
        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  
    }

    public function count() {
        $limit = 15;

        $countQuery = "SELECT COUNT(*) as total FROM " . $this->table_name;
        $this->conn->query($countQuery);
        $countResult = $this->conn->get();
        $count = isset($countResult['total']) ? $countResult['total'] : 0;
        $totalPages = ceil($count / $limit);
        $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

        return [
            'count' => $count,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage
        ];
    }

    public function getAllStatistik() {
        try {
            $this->count();
            $limit = 15;

            $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

            $offset = ($limit * $currentPage) - $limit;

            $query = "SELECT p.*, k.nama_kategori
                      FROM " . $this->table_name . " p
                      LEFT JOIN kategoripengaduan k ON p.id_kategori = k.id_kategori
                      ORDER BY p.id_pengaduan DESC
                      LIMIT $offset, $limit";
    
            $this->conn->query($query);

            return $this->conn->getAll();

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

    public function searchPengaduan($keyword) {
        try {
            $query = "SELECT p.*, k.nama_kategori
                      FROM " . $this->table_name . " p
                      LEFT JOIN kategoripengaduan k ON p.id_kategori = k.id_kategori 
                      WHERE p.nama_pelapor LIKE :keyword OR p.judul_pengaduan LIKE :keyword
                      ORDER BY p.id_pengaduan DESC
                      LIMIT 15";
    
            $this->conn->query($query);
            $this->conn->bind(':keyword', '%' . $keyword . '%');

            return $this->conn->getAll();

        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  
    }
}
