<?php
// require_once dirname(__DIR__) . '/config/database.php';

class Pengaduan_model {
    private $conn;
    private $table_name = "pengaduan";

    public function __construct() {
        $this->conn = new Database();
    }

    public function create($data) {
        try {
            $namaPelapor = htmlspecialchars(strip_tags($data['nama_pelapor']));
            $nomorTelepon = htmlspecialchars(strip_tags($data['nomor_telepon']));
            $kategoriPengaduan = htmlspecialchars(strip_tags($data['id_kategori']));
            $judulPengaduan = htmlspecialchars(strip_tags($data['judul_pengaduan']));
            $detailPengaduan = htmlspecialchars(strip_tags($data['detail_pengaduan']));

            $pathLampiran = null;
            if (!empty($_FILES['path_lampiran']['name'])) {
                $pathLampiran = $this->upload();
                if (!$pathLampiran) {
                    return false;
                }
            }
            
            $query = "INSERT INTO " . $this->table_name . "
                    (nama_pelapor, nomor_telepon, id_kategori, judul_pengaduan, detail_pengaduan, path_lampiran)
                    VALUES (:nama_pelapor, :nomor_telepon, :id_kategori, :judul_pengaduan, :detail_pengaduan, :path_lampiran)";

            $this->conn->query($query);

            $this->conn->bind(":nama_pelapor", $namaPelapor);
            $this->conn->bind(":nomor_telepon", $nomorTelepon);
            $this->conn->bind(":id_kategori", $kategoriPengaduan);
            $this->conn->bind(":judul_pengaduan", $judulPengaduan);
            $this->conn->bind(":detail_pengaduan", $detailPengaduan);
            $this->conn->bind(":path_lampiran", $pathLampiran);

            $this->conn->execute();

            return $this->conn->rowCount();

        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASEURL . "/Error_controller");
            exit;
        }  


    }

    public function getKategori() {
        try {
            $query = "SELECT * FROM kategoripengaduan ORDER BY id_kategori";

            $this->conn->query($query);
            return $this->conn->getAll();
        } catch (Exception $e) {
            header("Location: " . BASEURL . "/Error_controller");
        }        
    }

    public function upload() {       
        try {
            $namaFile = $_FILES['path_lampiran']['name'];
            $ukuranFile = $_FILES['path_lampiran']['size'];
            $error = $_FILES['path_lampiran']['error'];
            $tmpName = $_FILES['path_lampiran']['tmp_name']; 

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
            $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/konoha/images/pengaduan/' . $namaFileBaru;

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
