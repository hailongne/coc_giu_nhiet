<?php
class SanPhamController{
    public $modelSanPham;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
    }
    
    public function danhSachSanPham(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        
        require_once './views/pages/listSanPham.php';
    }

    public function detailSanPham()
    {
        $id = $_GET['id_san_pham'] ?? null;
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        if ($sanPham) {
            require_once './views/pages/detailSanPham.php';
        } else {
            header('Location: ' . BASE_URL . '?act=danh-sach-san-pham');
            exit();
        }
    }
    public function search(){
        
        $searchSanPham = $this->modelSanPham->search();

        // Kiểm tra và xử lý kết quả
        if (is_string($searchSanPham)) {
            echo $searchSanPham;
        } else {
            // Hiển thị danh sách sản phẩm tìm được
            include './views/danh_sach_san_pham.php';
        }
    }
}