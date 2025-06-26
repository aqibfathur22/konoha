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
}
