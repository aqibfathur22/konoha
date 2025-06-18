<?php

class Login_controller extends Controllers {
    public function index(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['nama'];
            $password = $_POST['password'];

            $user = $this->model('Login_model')->login($username, $password);

            if ($user) {
                // Set session
                $_SESSION['user'] = $user;
                header('Location: ' . BASEURL . '/admin_beranda');
                exit;
            } else {
                $data['error'] = 'Username atau password salah.';
            }
        }

        $this->view('login/index', $data ?? []);
    }
}
