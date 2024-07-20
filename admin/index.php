<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';

// Require toàn bộ file Models
require_once './models/AdminSanPham.php';
require_once './models/AdminDanhMuc.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    'admin' =>(new AdminDanhMucController())->admin(),
    '/' =>(new AdminDanhMucController())->admin(),
    'danh-muc' =>(new AdminDanhMucController())->danhSachDanhMuc(),
    'add-danh-muc' =>(new AdminDanhMucController())->postAddDanhMuc(),
    'form-add-danh-muc' =>(new AdminDanhMucController())->formAddDanhMuc(),
    'edit-danh-muc' =>(new AdminDanhMucController())->postEditDanhMuc(),
    'form-edit-danh-muc' =>(new AdminDanhMucController())->formEditDanhMuc(),
    'delete-danh-muc' =>(new AdminDanhMucController())->deleteDanhMuc(),

    'san-pham' =>(new AdminSanPhamController())->danhSachSanPham(),
    'add-san-pham' =>(new AdminSanPhamController())->postAddSanPham(),
    'form-add-san-pham' =>(new AdminSanPhamController())->formAddSanPham(),
    // 'edit-san-pham' =>(new AdminSanPhamController())->postEditSanPham(),
    // 'form-edit-san-pham' =>(new AdminSanPhamController())->formEditSanPham(),
    // 'delete-san-pham' =>(new AdminSanPhamController())->deleteSanPham(),
};