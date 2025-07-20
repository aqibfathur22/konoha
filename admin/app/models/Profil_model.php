<?php 

class Profil_model {
    private $conn;
    private $table_name = "profil_desa";

    public function __construct() {
        $this->conn = new Database();
    }

    public function getAllProfil() {
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

    public function getProfilById($id_profil) {
        try {
            $query = "SELECT * FROM " . $this->table_name . " WHERE id_profil = :id_profil";
    
            $this->conn->query($query);
            $this->conn->bind(':id_profil', $id_profil);
    
            return $this->conn->single();

        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  
    }

    public function update($data) {
        try {
            if (!isset($data['id_profil'])) {
                throw new Exception("ID profil tidak ditemukan");
            }
    
            $oldData = $this->getProfilById($data['id_profil']);
            $gambarProfil = $oldData['gambar']; 
    
            if (!empty($_FILES['gambar']['name'])) {
                $gambarBaru = $this->upload();
                if (!$gambarBaru) {
                    return false;
                }

                $gambarProfil = $gambarBaru;

                if (!empty($oldData['gambar'])) {
                    $this->deleteFile($oldData['gambar']);
                }
            }
    
            $deskripsiProfil = htmlspecialchars(strip_tags($data['deskripsi']));
            $idProfil = htmlspecialchars(strip_tags($data['id_profil']));
            
            $query = "UPDATE " . $this->table_name . " SET
                        deskripsi = :deskripsi";

            if (!empty($_FILES['gambar']['name'])) {
                $query .= ", gambar = :gambar";
            }
            
            $query .= " WHERE id_profil = :id_profil";
    
            $this->conn->query($query);

            $this->conn->bind(":deskripsi", $deskripsiProfil);
            if (!empty($_FILES['gambar']['name'])) {
                $this->conn->bind(":gambar", $gambarProfil);
            }
            $this->conn->bind(":id_profil", $idProfil);
    
            $this->conn->execute();

            return $this->conn->rowCount();
            
        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            return false;
        }       
    }

    private function deleteFile($filePath) {
        $fullPath = $_SERVER['DOCUMENT_ROOT'] . '/konoha/images/profil/' . $filePath;
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

                    //cek apakah tidak ada gambar yang diupload
            if( $error === 4 ) {
                echo "<script>
                        alert('pilih gambar terlebih dahulu!');
                    </script>";
                return false;
            }

            //cek apakah yang diupload adalah gambar
            $formatGambarValid = ['jpg', 'jpeg', 'png'];
            $formatGambar = explode('.', $namaFile);
            $formatGambar = strtolower(end($formatGambar));
            if( !in_array($formatGambar, haystack: $formatGambarValid) ) {
                echo "<script>
                        alert('yang anda upload bukan gambar!');
                    </script>";
                return false;
            }

            //cek jika ukuran gambar terlalu besars
            if( $ukuranFile > 2000000 ) {
                echo "<script>
                        alert('ukuran gambar terlalu besar!');
                    </script>";
                return false;
            }

            //lolos pengecekan, gambar siap diupload
            //generate nama gambar baru
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $formatGambar;
            $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/konoha/images/profil/' . $namaFileBaru;

            if (!move_uploaded_file($tmpName, $uploadPath)) {
                echo "<script>alert('Upload gagal: tidak bisa simpan ke folder img!');</script>";
                return false;
            }

            return $namaFileBaru;
        } catch (Exception $e) {
            header("Location: " . BASEURL . "/Error_controller");
        }
    }    
}

?>