<?php 

class Kategori_controller extends Controllers {
    public function index() {
        $data['title'] = "Admin - Kategori";

        $data['berandaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['penggunaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['beritaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['profilNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['kategoriNav'] = 'flex items-center gap-2 p-2 mt-2 rounded-lg bg-white text-gray-800 font-semibold';

        $data['dataKategori'] = $this->model('Kategori_model')->getAllKategori();

        $this->view("templates/header", $data);
        $this->view("kategori/index", $data);
        $this->view("templates/footer");
    }

    public function createKategori() {
        if ($this->model('Kategori_Model')->create($_POST) > 0) {
            header("Location: " . BASEURL . "/kategori");
            exit;
        }
    }
}

?>