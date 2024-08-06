<?php

class GioHangController {
    public $modelGioHang;

    public function __construct()
    {
        $this->modelGioHang = new GioHang();
    }


    public function getAllGioHang() {
        require_once './views/cart/giohang.php';
    }

}