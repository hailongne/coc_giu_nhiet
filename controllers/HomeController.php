<?php
require_once './models/SanPham.php';

class HomeController {
    private $modelSanPham;
    private $modelTaiKhoan;
    private $modelGioHang;
    private $modelDonHang;

    public function __construct() {
        
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
    }

    public function home() {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require './views/home.php';
    }

    public function detailSanPham()
    {
        $id = $_GET['id_san_pham'] ?? null;
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $listSanPhamFromDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            // Nếu không tìm thấy sản phẩm hoặc không có ID, chuyển hướng về danh sách sản phẩm
            header('Location: ' . BASE_URL . '?act=san-pham');
            exit();
        }
    }

    public function formLogin(){
        require_once './views/auth/formLogin.php';

        deleteSessionError();
    }

    public function formRegister(){
        require_once './views/auth/formRegister.php';

        deleteSessionError();
    }

    public function postlogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->modelTaiKhoan->checklogin($email, $password);
            // var_dump($email);die;

            if($user == $email) {
                $_SESSION['user_client'] = $user;
                header ("Location: " . BASE_URL);
                exit();
            }else{
                $_SESSION['error'] = $user;
                // var_dump($_SESSION['error']);die;
                $_SESSION['flash'] = true;
                header ("Location:" . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $password = $_POST['password'] ?? '';
    
            $errors = [];
    
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
            }
            if (empty($password)) {
                $errors['password'] = 'Mật khẩu không được để trống';
            }
    
            $_SESSION['errors'] = $errors;
    
            if (empty($errors)) {
                $result = $this->modelTaiKhoan->checkRegister($ho_ten, $email, $so_dien_thoai, $password);
    
                if ($result) {
                    header("Location: " . BASE_URL . "?act=login");
                    exit;
                } else {
                    $_SESSION['errors']['email'] = 'Email đã tồn tại.';
                    header("Location: " . BASE_URL . "?act=register");
                    exit;
                }
            } else {
                header("Location: " . BASE_URL . "?act=register");
                exit;
            }
        }
    
        require './views/auth/formRegister.php';
    }

    public function logout(){
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            header("Location:" . BASE_URL . '?act=login');
        }
    }

    public function chinhSachBaoMat(){
        require_once './views/pages/chinhsach/chinhsachbaomat.php';
    }
    
    public function chinhSachThongBao(){
        require_once './views/pages/chinhsach/chinhsachthongbao.php';
    }

    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
                // lấy dữ liệu giỏ hàng của người dùng
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }

                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;

                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }
                header("Location: " . BASE_URL . '?act=gio-hang');
            } else {
                var_dump('Chưa đăng nhập');
                die;
            }
        }
    }

    public function gioHang() {
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            // lấy dữ liệu giỏ hàng của người dùng
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/gioHang.php';

        } else {
            var_dump('Chưa đăng nhập');
            die;
        }
    }

    public function thanhToan() {

        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            // lấy dữ liệu giỏ hàng của người dùng
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/thanhToan.php';

        } else {
            header('Location:' . BASE_URL . '?act=login');
        }
    }


    public function postThanhToan(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            $ngay_dat = date('d-m-Y');
            $trang_thai_id = 1;

            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $ma_don_hang= 'PL-' . rand(100,999);

            $this->modelDonHang->addDonHang($tai_khoan_id,
                                            $ten_nguoi_nhan, 
                                            $email_nguoi_nhan, 
                                            $sdt_nguoi_nhan, 
                                            $dia_chi_nguoi_nhan, 
                                            $ghi_chu, 
                                            $tong_tien, 
                                            $phuong_thuc_thanh_toan_id, 
                                            $ngay_dat,
                                            $ma_don_hang,
                                            $trang_thai_id
            );

            var_dump('them thanh cong');die;
        }
    }
}