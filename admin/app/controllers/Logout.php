<?php

class Logout extends Controllers {
    public function index() {
        session_start();
        session_unset(); 
        session_destroy(); 

        header('Location: ' . BASEURL . '/login'); 
        exit;
    }
}
