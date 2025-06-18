<?php

class Register_controller extends Controllers {
    public function index(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['nama'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $result = $this->model('Register_model')->register($username, $password);

            if ($result) {
                header('Location: ' . BASEURL . '/login');
                exit;
            } else {
                $data['error'] = 'Pendaftaran gagal. Username mungkin sudah terdaftar.';
            }
        }

        $this->view('register/index', $data ?? []);
    }
}
