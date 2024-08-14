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
                
                if ($user['chuc_vu_id'] == 2 | 1) {
                    
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

    public function checkRegister($ho_ten, $email, $password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Kiểm tra xem email đã tồn tại chưa
        $sql = "SELECT id FROM tai_khoans WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            return false; // Email đã tồn tại
        }

        // Thêm người dùng vào cơ sở dữ liệu
        $sql = "INSERT INTO tai_khoans (ho_ten, email, mat_khau, chuc_vu_id, trang_thai) 
                VALUES (?, ?, ?, 2, 1)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$ho_ten, $email, $hashed_password]);
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

    public function insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id){
        try {
            $sql = 'INSERT INTO tai_khoans(ho_ten, email, mat_khau, chuc_vu_id)
            VALUES (:ho_ten, :email, :password, :chuc_vu_id)';

            $stmt = $this->conn->prepare($sql);
            
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':password' => $password,
                ':chuc_vu_id' => $chuc_vu_id,
            ]);
            
            return true;
        } catch (Exception $e) {
            echo "failed" . $e ->getMessage();
        }
    }
    
}