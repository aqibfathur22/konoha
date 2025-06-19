<?php  

class Kategori_model {
    private $conn;
    private $table = 'kategoripengaduan';

    public function __construct() {
        $this->conn = new Database;
    }

    public function getAllKategori() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id_kategori ASC";

        $this->conn->query($query);
        return $this->conn->getAll();
    }

    public function create($data) {
        $namaKategori = htmlspecialchars(strip_tags($data['nama_kategori']));

        $query = "INSERT INTO " . $this->table . " (nama_kategori) VALUES (:nama_kategori)";

        $this->conn->query($query);

        $this->conn->bindParam(':nama_kategori', $namaKategori);

        $this->conn->execute();
        return $this->conn->rowCount();
    }
}
?>
