<?php

class Login extends Controllers {
    public function index(): void {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['nama'];
            $password = $_POST['password'];

            $user = $this->model('Login_model')->findByUsername($username);

            if (!$user) {
                $data['error_username'] = 'Nama pengguna tidak ditemukan.';
            } elseif (!password_verify($password, $user['password'])) {
                $data['error_password'] = 'Kata sandi salah.';
            } else {
                $_SESSION['user'] = $user;
                $_SESSION['login_time'] = time();
                header('Location: ' . BASEURL . '/admin_beranda');
                exit;
            }
        }

        $this->view('login/index', $data);
    }
}