<?php 
session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';

// Route
$act = $_GET['act'] ?? '/';
if ($act !== 'dang-ky-tai-khoan' && $act !== 'dang-nhap-tai-khoan') {
    checkLoginUser();
}
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    '/' => (new HomeController())->home(),
    'chinh-sach-bao-mat' => (new HomeController())->chinhSachBaoMat(),
    'chinh-sach-thong-bao' => (new HomeController())->chinhSachThongBao(),

    'chi-tiet-san-pham'=> (new HomeController())->detailSanPham(),
    
    'login'=> (new HomeController())->formLogin(),
    'check-login'=> (new HomeController())->postLogin(),
    'register'=> (new HomeController())->formRegister(),
    'logout'=> (new HomeController())->logout(),

    'them-gio-hang'=> (new HomeController())-> addGioHang(),
    'gio-hang'=> (new HomeController())-> gioHang(),
    'thanh-toan'=> (new HomeController())-> thanhToan(),
    'xu-ly-thanh-toan'=> (new HomeController())-> postThanhToan(),

};