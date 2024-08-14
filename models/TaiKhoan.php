<?php
class TaiKhoan {
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function checkLogin($email, $mat_khau){
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute (['email'=>$email]);

            $user = $stmt->fetch();

            if ($user && password_verify($mat_khau,$user['mat_khau'])) {
                
                if ($user['chuc_vu_id'] == 2 ) {
                    
                    if ($user['trang_thai'] == 1) {
                        return $user['email'];
                    }else{
                        
                    return 'Tài Khoản Bị Cấm!!!!!';
                    }
                    
                } else {
                    return 'Tài Khoản không có quyền đăng nhập !!!!!';
                }
                
            }else{
                return 'Bạn nhập sai tài khoản hoặc mật khẩu !!!!!';
            }
        }catch(\Exception $e){
            echo 'failed' . $e->getMessage();
            return false;
        }
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

    public function getTaiKhoanFromEmail($email){
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);

            return $stmt ->fetch();
        } catch (Exception $e)   {
            echo 'failed' . $e->getMessage();
        }
    }
    
}