<?php

class Register extends Controllers {
    public function index(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['nama'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $hasil = $this->model('Register_model')->register($username, $password);

            if ($hasil) {
                header('Location: ' . BASEURL . '/login');
                exit;
            } else {
                $data['error'] = 'Username sudah digunakan.';
            }
        }

        $this->view("register/index", $data ?? []);
    }
}
