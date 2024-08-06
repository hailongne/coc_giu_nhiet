<?php
class TaiKhoan {
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function checkRegister($ho_ten, $email, $so_dien_thoai, $password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Kiểm tra xem email đã tồn tại chưa
        $sql = "SELECT id FROM tai_khoans WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            return false; // Email đã tồn tại
        }

        // Thêm người dùng vào cơ sở dữ liệu
        $sql = "INSERT INTO tai_khoans (ho_ten, email, so_dien_thoai, mat_khau, chuc_vu_id, trang_thai) 
                VALUES (?, ?, ?, ?, 2, 1)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$ho_ten, $email, $so_dien_thoai, $hashed_password]);
        return true;
    }

    public function checkLogin($email, $mat_khau) {
        $sql = "SELECT * FROM tai_khoans WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($mat_khau, $user['mat_khau'])) {
            return $user;
        }

        return false; // Đăng nhập thất bại
    }
}