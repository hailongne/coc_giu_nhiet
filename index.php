<?php 
session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/SanPhamController.php';
require_once './controllers/TaiKhoanController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    '/' => (new HomeController())->home(),
    'danh-sach-san-pham' => (new SanPhamController())->danhSachSanPham(),
    'chinh-sach-bao-mat' => (new HomeController())->chinhSachBaoMat(),
    'chinh-sach-thong-bao' => (new HomeController())->chinhSachThongBao(),
    'chi-tiet-san-pham'=> (new SanPhamController())->DetailSanPham(),
    'dang-ky-tai-khoan'=> (new TaiKhoanController())->register(),
    'dang-nhap-tai-khoan'=> (new TaiKhoanController())->login(),
};