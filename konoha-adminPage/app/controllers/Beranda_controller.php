<?php 

class Beranda_controller extends Controllers {
    public function index() {
        session_status();
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASEURL . "/Login_controller");
            exit;
        }

        $data['title'] = 'Admin - Beranda';
        $data['dataStatistik'] = $this->model('Beranda_model')->getStatistik($data);
        $data['dataPengaduan'] = $this->model('Beranda_model')->getAllStatistik();
        $data['menunggu'] = $this->model('Beranda_model')->getMenungguStatistik();
        $data['diproses'] = $this->model('Beranda_model')->getDiprosesStatistik();    
        $data['selesai'] = $this->model('Beranda_model')->getSelesaiStatistik();
        $data['ditolak'] = $this->model('Beranda_model')->getDitolakStatistik();

        if (isset($_POST['total'])) {
            $data['dataPengaduan'] = $this->model('Beranda_model')->getAllStatistik();
        } elseif (isset($_POST['menunggu'])) {
            $data['dataPengaduan'] = $this->model('Beranda_model')->getMenungguStatistik();
        } elseif (isset($_POST['diproses'])) {
            $data['dataPengaduan'] = $this->model('Beranda_model')->getDiprosesStatistik();
        } elseif (isset($_POST['selesai'])) {
            $data['dataPengaduan'] = $this->model('Beranda_model')->getSelesaiStatistik();
        } elseif (isset($_POST['ditolak'])) {
            $data['dataPengaduan'] = $this->model('Beranda_model')->getDitolakStatistik();
        }

        $data['berandaNav'] = 'flex items-center gap-2 p-2 mt-2 rounded-lg bg-white text-gray-800 font-semibold';
        $data['penggunaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['beritaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['profilNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['kategoriNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';

        $this->view('templates/header', $data);
        $this->view('beranda/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id) {
        $data['title'] = 'Admin - Detail Beranda';

        $data['berandaNav'] = 'flex items-center gap-2 p-2 mt-2 rounded-lg bg-white text-gray-800 font-semibold';
        $data['penggunaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['beritaNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['profilNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';
        $data['kategoriNav'] = 'flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition';

        $data['detailPengaduan'] = $this->model('Beranda_model')->getStatistikById($id);

        $this->view('templates/header', $data);
        $this->view('beranda/detail', $data);
        $this->view('templates/footer');
    }

    public function updateStatus() {
        if (!isset($_POST['id_pengaduan']) || !isset($_POST['status'])) {
            header("Location: " . BASEURL . "/Beranda_controller?error=missing_params");
            exit;
        }

        $idPengaduan = $_POST['id_pengaduan'];
        $status = $_POST['status'];

        $this->model('Beranda_model')->updateStatus($idPengaduan, $status);
        header("Location: " . BASEURL . "/Beranda_controller");
        exit;
    }

    public function deleteAduan($idPengaduan){
        if ($this->model('Beranda_model')->delete($idPengaduan) > 0) {
            header("Location: " . BASEURL . " /Beranda_controller");
            exit;
        }
    }
}

?>