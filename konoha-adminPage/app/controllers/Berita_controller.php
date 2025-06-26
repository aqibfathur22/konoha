<?php 

class Berita_controller extends Controllers {
    public function index() {
        $data['title'] = "Admin - Berita";
        $data['dataBerita'] = $this->model('Berita_model')->getAllBerita();

        $data['berandaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['penggunaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['beritaNav'] = 'flex items-center gap-2 p-2 mt-2 rounded-lg bg-white text-gray-800 font-semibold';
        $data['profilNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['kategoriNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';

        $this->view("templates/header", $data);
        $this->view("berita/index", $data);
        $this->view("templates/footer");
    }

    public function createBerita() {
        if ($this->model('Berita_Model')->create($_POST) > 0) {
            Flasher::setFlash('Berita berhasil ditambahkan', 'success');
            header("Location: " . BASEURL . "/Berita_controller");
            exit;
        } else {
            Flasher::setFlash('Berita gagal ditambahkan', 'error');
            header("Location: " . BASEURL . "/Berita_controller");
            exit;
        }
    }

    public function updateBerita() {
        if ($this->model('Berita_Model')->update($_POST) > 0) {
            Flasher::setFlash('Berita berhasil diperbarui', 'success');
            header("Location: " . BASEURL . "/Berita_controller");
            exit;
        } else {
            Flasher::setFlash('Berita gagal diperbarui', 'error');
            header("Location: " . BASEURL . "/Berita_controller");
            exit;
        }
    }

    public function deleteBerita($idberita) {
        if ($this->model('Berita_Model')->delete($idberita) > 0) {
            header("Location: " . BASEURL . "/Berita_controller");
            exit;
        }
    }

    public function detail($id_berita) {
        $data['title'] = 'Admin - Detail Berita';

        $data['berandaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['penggunaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['beritaNav'] = 'flex items-center gap-2 p-2 mt-2 rounded-lg bg-white text-gray-800 font-semibold';
        $data['profilNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['kategoriNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';

        $data['detailBerita'] = $this->model('Berita_model')->getBeritaById($id_berita);

        $this->view('templates/header', $data);
        $this->view('berita/detail', $data);
        $this->view('templates/footer');
    }
}
?>