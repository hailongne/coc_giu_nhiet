<?php
require_once './models/SanPham.php';

class HomeController {
    private $model;

    public function __construct() {
        $this->model = new SanPham();
    }

    public function home() {
        require './views/pages/home.php';
    }

    public function trangChu() {
        require './views/pages/home.php';
    }

    public function chinhSachBaoMat(){
        require_once './views/pages/chinhsach/chinhsachbaomat.php';
    }
    
    public function chinhSachThongBao(){
        require_once './views/pages/chinhsach/chinhsachthongbao.php';
    }
}