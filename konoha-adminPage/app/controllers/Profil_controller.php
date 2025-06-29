<?php 

class Profil_controller extends Controllers {
    public function index() {
        session_status();

        $data['title'] = "Admin - Profil";
        
        $data['dataProfil'] = $this->model('Profil_model')->getAllProfil();

        $data['berandaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['penggunaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['beritaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['profilNav'] = 'flex items-center gap-2 p-2 mt-2 rounded-lg bg-white text-gray-800 font-semibold';
        $data['kategoriNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';

        $this->view("templates/header", $data);
        $this->view("profil/index", $data);
        $this->view("templates/footer");
    }

    public function updateProfil() {
        if ($this->model('Profil_Model')->update($_POST) > 0) {
            Flasher::setFlash('Profil Desa berhasil diperbarui', 'success');
            header("Location: " . BASEURL . "/Profil_controller");
            exit;
        } else {
            Flasher::setFlash('Profil Desa gagal diperbarui', 'error');
            header("Location: " . BASEURL . "/Profil_controller");
            exit;
        }
    }

    public function editProfil($id_profil){
        $data['title'] = "Admin - Profil";

        $data['berandaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['penggunaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['beritaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['profilNav'] = 'flex items-center gap-2 p-2 mt-2 rounded-lg bg-white text-gray-800 font-semibold';
        $data['kategoriNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';

        $data['editProfil'] = $this->model('Profil_model')->getProfilById($id_profil);

        $this->view("templates/header", $data);
        $this->view("profil/edit", $data);
        $this->view("templates/footer");
    }
}

?>