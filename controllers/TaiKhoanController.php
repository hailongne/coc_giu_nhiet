<?php
class TaiKhoanController {
    public $modelTaiKhoan;
    
    public function __construct(){
        $this->modelTaiKhoan = new TaiKhoan();
    }


    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $password = $_POST['password'] ?? '';
    
            $errors = [];
    
            // Kiểm tra dữ liệu đầu vào
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
    
            // Lưu lỗi vào session nếu có
            $_SESSION['errors'] = $errors;
    
            if (empty($errors)) {
                // Gọi phương thức đăng ký từ model
                $result = $this->modelTaiKhoan->register($ho_ten, $email, $so_dien_thoai, $password);
    
                if ($result) {
                    // Đăng ký thành công, chuyển hướng đến trang đăng nhập
                    header("Location: " . BASE_URL . "?act=dang-nhap-tai-khoan");
                    exit;
                } else {
                    // Nếu email đã tồn tại
                    $_SESSION['errors']['email'] = 'Email đã tồn tại.';
                    header("Location: " . BASE_URL . "?act=dang-ky-tai-khoan");
                    exit;
                }
            } else {
                // Nếu có lỗi, chuyển hướng về trang đăng ký
                header("Location: " . BASE_URL . "?act=dang-ky-tai-khoan");
                exit;
            }
        }
    
        // Hiển thị form đăng ký nếu không phải là POST
        require './views/account/dangky.php';
    }
    


    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['login-email'] ?? '';
            $password = $_POST['login-password'] ?? '';
    
            $errors = [];
    
            // Kiểm tra dữ liệu đầu vào
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($password)) {
                $errors['password'] = 'Mật khẩu không được để trống';
            }
    
            // Lưu lỗi vào session nếu có
            $_SESSION['errors'] = $errors;
    
            if (empty($errors)) {
                // Gọi phương thức đăng nhập từ model
                $user = $this->modelTaiKhoan->login($email, $password);
    
                if ($user) {
                    // Đăng nhập thành công, lưu thông tin vào session và chuyển hướng về trang chủ
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_email'] = $user['email'];
                    header("Location: " . BASE_URL);
                    exit;
                } else {
                    // Nếu thông tin đăng nhập không đúng
                    $_SESSION['errors']['login'] = 'Email hoặc mật khẩu không chính xác.';
                    header("Location: " . BASE_URL . "?act=dang-nhap-tai-khoan");
                    exit;
                }
            } else {
                // Nếu có lỗi, chuyển hướng về trang đăng nhập
                header("Location: " . BASE_URL . "?act=dang-nhap-tai-khoan");
                exit;
            }
        }
    
        // Hiển thị form đăng nhập nếu không phải là POST
        require './views/account/dangnhap.php';
    }

      // Phương thức kiểm tra quyền
      public function checkRole($requiredRole) {
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == $requiredRole) {
            return true;
        }
        return false;
    }
    
}