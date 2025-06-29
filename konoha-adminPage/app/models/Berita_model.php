<?php 

class Berita_model {
    private $conn;
    private $table_name = "tb_berita";

    public function __construct() {
        $this->conn = new Database();
    }

    public function getAllBerita() {
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

    public function getBeritaById($id_berita) {
        try {
            $query = "SELECT * FROM " . $this->table_name . " WHERE id_berita = :id_berita";
    
            $this->conn->query($query);
            $this->conn->bind(':id_berita', $id_berita);
    
            return $this->conn->single();

        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  
    }

    public function create($data) {
        try {
            $gambarBerita = null;
            if (!empty($_FILES['gambar']['name'])) {
                $gambarBerita = $this->upload();
                if (!$gambarBerita) {
                    return false;
                }
            }

            $judulBerita = htmlspecialchars(strip_tags($data['judul']));
            $deskripsiBerita = htmlspecialchars(strip_tags($data['deskripsi']));
            
            $query = "INSERT INTO " . $this->table_name . "
                    (gambar, judul, deskripsi)
                    VALUES (:gambar, :judul, :deskripsi)";

            $this->conn->query($query);

            $this->conn->bind(":gambar", $gambarBerita);
            $this->conn->bind(":judul", $judulBerita);
            $this->conn->bind(":deskripsi", $deskripsiBerita);

            $this->conn->execute();

            return $this->conn->rowCount();

        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }       
    }

    public function update($data) {
        try {
            if (!isset($data['id_berita'])) {
                throw new Exception("ID Berita tidak ditemukan");
            }
    
            $oldData = $this->getBeritaById($data['id_berita']);
            $gambarBerita = $oldData['gambar']; 
    
            if (!empty($_FILES['gambar']['name'])) {
                $gambarBaru = $this->upload();
                if (!$gambarBaru) {
                    return false;
                }

                $gambarBerita = $gambarBaru;

                if (!empty($oldData['gambar'])) {
                    $this->deleteFile($oldData['gambar']);
                }
            }
    
            $judulBerita = htmlspecialchars(strip_tags($data['judul']));
            $deskripsiBerita = htmlspecialchars(strip_tags($data['deskripsi']));
            $idBerita = htmlspecialchars(strip_tags($data['id_berita']));
            
            $query = "UPDATE " . $this->table_name . " SET
                        judul = :judul,
                        deskripsi = :deskripsi";

            if (!empty($_FILES['gambar']['name'])) {
                $query .= ", gambar = :gambar";
            }
            
            $query .= " WHERE id_berita = :id_berita";
    
            $this->conn->query($query);

            $this->conn->bind(":judul", $judulBerita);
            $this->conn->bind(":deskripsi", $deskripsiBerita);
            if (!empty($_FILES['gambar']['name'])) {
                $this->conn->bind(":gambar", $gambarBerita);
            }
            $this->conn->bind(":id_berita", $idBerita);
    
            $this->conn->execute();

            return $this->conn->rowCount();
            
        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            return false;
        }       
    }

    public function delete($idBerita) {
        try {
            $querySel = "SELECT gambar FROM " . $this->table_name . " WHERE id_berita = :id_berita";

            $this->conn->query($querySel);
            $this->conn->bind(":id_berita", $idBerita);
            $this->conn->execute(); 

            $result = $this->conn->single();

            if (!$result) {
                return false; 
            }
    
            $gambar = $result['gambar'];
            
            $queryDel = "DELETE FROM " . $this->table_name . " WHERE id_berita = :id_berita";

            $this->conn->query($queryDel);
            $this->conn->bind(":id_berita", $idBerita);
            $this->conn->execute();

            $rowCount = $this->conn->rowCount();

            if ($rowCount > 0 && !empty($gambar)) {
                $pathGambar = $_SERVER['DOCUMENT_ROOT'] . '/konoha/images/berita/' . $gambar;
                if (file_exists($pathGambar)) {
                    unlink($pathGambar);
                }
            }

            return $rowCount;
            
        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }   
    }

    private function deleteFile($filePath) {
        $fullPath = $_SERVER['DOCUMENT_ROOT'] . '/konoha/images/berita/' . $filePath;
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    public function upload() {       
        try {
            $namaFile = $_FILES['gambar']['name'];
            $ukuranFile = $_FILES['gambar']['size'];
            $error = $_FILES['gambar']['error'];
            $tmpName = $_FILES['gambar']['tmp_name']; 

            if( $error === 4 ) {
                echo "<script>
                        alert('pilih gambar terlebih dahulu!');
                    </script>";
                return false;
            }

            $formatGambarValid = ['jpg', 'jpeg', 'png'];
            $formatGambar = explode('.', $namaFile);
            $formatGambar = strtolower(end($formatGambar));
            if( !in_array($formatGambar, haystack: $formatGambarValid) ) {
                echo "<script>
                        alert('yang anda upload bukan gambar!');
                    </script>";
                return false;
            }

            if( $ukuranFile > 4000000 ) {
                echo "<script>
                        alert('ukuran gambar terlalu besar!');
                    </script>";
                return false;
            }

            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $formatGambar;
            $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/konoha/images/berita/' . $namaFileBaru;

            if (!move_uploaded_file($tmpName, $uploadPath)) {
                echo "<script>alert('Upload gagal: tidak bisa simpan ke folder img!');</script>";
                return false;
            }

            return $namaFileBaru;
        } catch (Exception $e) {
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }
    }    
}

?>