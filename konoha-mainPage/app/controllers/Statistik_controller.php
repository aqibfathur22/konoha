<?php 

class Statistik_controller extends Controllers {
    public function index() {
        $data['title'] = "Statistik Pengaduan";
        $data['dataStatistik'] = $this->model('Statistik_model')->getStatistik($data);
        $data['dataPengaduan'] = $this->model('Statistik_model')->getAllStatistik(50, null, 'total');
        $data['menunggu'] = $this->model('Statistik_model')->getMenungguStatistik();
        $data['diproses'] = $this->model('Statistik_model')->getDiprosesStatistik();    
        $data['selesai'] = $this->model('Statistik_model')->getSelesaiStatistik();
        $data['ditolak'] = $this->model('Statistik_model')->getDitolakStatistik();

        if (isset($_POST['total'])) {
            $data['dataPengaduan'] = $this->model('Statistik_model')->getAllStatistik(50, null, 'total');
        } elseif (isset($_POST['menunggu'])) {
            $data['dataPengaduan'] = $this->model('Statistik_model')->getMenungguStatistik();
        } elseif (isset($_POST['diproses'])) {
            $data['dataPengaduan'] = $this->model('Statistik_model')->getDiprosesStatistik();
        } elseif (isset($_POST['selesai'])) {
            $data['dataPengaduan'] = $this->model('Statistik_model')->getSelesaiStatistik();
        } elseif (isset($_POST['ditolak'])) {
            $data['dataPengaduan'] = $this->model('Statistik_model')->getDitolakStatistik();
        }

        $this->view("templates/header", $data);
        $this->view("statistik/index", $data);
        $this->view("templates/footer");
    }    
}


?>