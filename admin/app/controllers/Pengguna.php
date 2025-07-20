<?php 

class Pengguna extends Controllers {
    public function index() {
        session_status();

        $data['title'] = "Admin - Pengguna";

        $data['berandaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['penggunaNav'] = 'flex items-center gap-2 p-2 mt-2 rounded-lg bg-white text-gray-800 font-semibold';
        $data['beritaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['profilNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['kategoriNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';

        $data['profil'] = $this->model('Pengguna_model')->getProfilById($_SESSION['user']['id_admin']);

        $this->view("templates/header", $data);
        $this->view("pengguna/index", $data);
        $this->view("templates/footer");
    }

    public function gantiPassword() {
        session_status();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id_admin'];
            $password_lama = $_POST['password_lama'];
            $password_baru = password_hash($_POST['password_baru'], PASSWORD_DEFAULT);
    
            $data = $this->model('Pengguna_model')->getProfilById($id);
    
            if (password_verify($password_lama, $data['password'])) {
                $this->model('Pengguna_model')->updatePassword($id, $password_baru);
                Flasher::setFlash('Password berhasil diubah', '', 'success');
            } else {
                Flasher::setFlash('Password lama salah', '', 'error');
            }
    
            header("Location: " . BASEURL . "/Pengguna/editPengguna/" . $id);
            exit;
        }
    }
    

    public function hapusAkun() {
        session_status();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id_admin'];

            if ($this->model('Pengguna_model')->delete($id)) {
                // Jika admin menghapus dirinya sendiri, logout
                if ($_SESSION['user']['id_admin'] == $id) {
                    session_destroy();
                    header('Location: ' . BASEURL . '/Login');
                    exit;
                }

                Flasher::setFlash('Akun berhasil dihapus', '', 'success');
            } else {
                Flasher::setFlash('Gagal menghapus akun', '', 'error');
            }

            header('Location: ' . BASEURL . '/Pengguna');
            exit;
        }
    }

    public function editPengguna($id_pengguna){
        $data['title'] = "Admin - Pengguna";

        $data['berandaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['penggunaNav'] = 'flex items-center gap-2 p-2 mt-2 rounded-lg bg-white text-gray-800 font-semibold';
        $data['beritaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['profilNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition'; 
        $data['kategoriNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';

        $data['editProfil'] = $this->model('Pengguna_model')->getProfilById($id_pengguna);

        $this->view("templates/header", $data);
        $this->view("pengguna/edit", $data);
        $this->view("templates/footer");
    }
    
    public function updatePengguna() {
        session_status();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id_admin'];
            $namaDepan = $_POST['nama_depan'];
            $namaBelakang = $_POST['nama_belakang'];
            $email = $_POST['email'];
    
            if ($this->model('Pengguna_model')->updateProfil($id, $namaDepan, $namaBelakang, $email)) {
                Flasher::setFlash('Profil berhasil diperbarui', '', 'success');
            } else {
                Flasher::setFlash('Gagal memperbarui profil', '', 'error');
            }
    
            header('Location: ' . BASEURL . '/Pengguna');
            exit;
        }
    }
    
}

?>