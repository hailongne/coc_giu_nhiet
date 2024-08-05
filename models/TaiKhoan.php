<?php
class TaiKhoan {
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function register($ho_ten, $email, $so_dien_thoai, $password) {
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

    public function login($email, $mat_khau) {
        $sql = "SELECT * FROM tai_khoans WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($mat_khau, $user['mat_khau'])) {
            return $user;
        }

        return false; // Đăng nhập thất bại
    }

    public function getUserRole($userId) {
        $sql = "SELECT chuc_vu_id FROM tai_khoans WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user['chuc_vu_id'] ?? null;
    }

    public function getRoleName($roleId) {
        $sql = "SELECT ten_chuc_vu FROM chuc_vus WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$roleId]);
        $role = $stmt->fetch(PDO::FETCH_ASSOC);

        return $role['ten_chuc_vu'] ?? 'Chưa xác định';
    }
}