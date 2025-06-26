<?php 

class error_controller extends Controllers {
    public function index() {

        $this->view("404/index");
    }
}
?>