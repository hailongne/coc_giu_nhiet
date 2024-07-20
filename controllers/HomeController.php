<?php 

class HomeController
{

    public $modelSanPham;

    public function __construct(){
       $this->modelSanPham = new SanPham();
    }

    public function home(){
        echo "Trang Home";
    }

    public function trangChu(){
        echo "Trang Chu";
    }

    public function listProduct(){
        $listProduct = $this -> modelSanPham->getAllProduct();
        // var_dump($listProduct);die();
        require_once './views/listProduct.php';
    }
}