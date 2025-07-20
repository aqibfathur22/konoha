<?php 

class Home extends Controllers {
    public function index() {
        $data['title'] = "Aduan Masyarakat Konoha";
        $data['kategori'] = $this->model('Pengaduan_model')->getKategori(); 
        $data['dataStatistik'] = $this->model('Statistik_model')->getStatistik($data);
        $data['berita'] = $this->model('Berita_model')->getBeritaAll();
        $data['profil'] = $this->model('Profil_model')->getProfilAll();
 
        $this->view("templates/header", $data);
        $this->view("home/index", $data);
        $this->view("home/statistik", $data);
        $this->view("home/pengaduan", $data);   
        $this->view("home/berita", $data);
        $this->view("home/profil", $data);
        $this->view("home/footer", $data);
        $this->view("templates/footer");
    }    

    public function createPengaduan() 
    {
        if (!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response'])) {
            Flasher::setFlash('Verifikasi captcha diperlukan', 'error');
            header("Location: " . BASEURL . "/Home#pengaduan");
            exit;
        }

        $recaptchaSecret = '6LfmWm4rAAAAAPwye5W9WfXoRuWUSYRS-oPBwFOU'; 
        $recaptchaResponse = $_POST['g-recaptcha-response'];

        $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecret}&response={$recaptchaResponse}");
        $responseData = json_decode($verify);

        if (!$responseData->success) {
            Flasher::setFlash('Verifikasi captcha gagal', 'error');
            header("Location: " . BASEURL . "/Home#pengaduan");
            exit;
        }

        if ($this->model('Pengaduan_model')->create($_POST) > 0) {
            Flasher::setFlash('Aduan berhasil dikirim', 'success');
            header("Location: " . BASEURL . "/Home#pengaduan");
            exit;
        } else {
            Flasher::setFlash('Aduan gagal dikirim', 'error');
            header("Location: " . BASEURL . "/Home#pengaduan");
            exit;
        }
    }
    
    public function detailBerita($id_berita) {
        $data['title'] = "Berita Masyarakat Konoha";
        $data['detailBerita'] = $this->model('Berita_model')->getBerita($id_berita);
        $data['berita'] = $this->model('Berita_model')->getSugestion($id_berita);

        $this->view("templates/header", $data);
        $this->view("home/detailBerita", $data);
        $this->view("home/footer", $data);
        $this->view("templates/footer");
    }
}

?>