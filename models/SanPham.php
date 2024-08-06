<?php
class SanPham{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllSanPham()
    {
        try {
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id";
            
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh)
    {
        try {
            $sql = 'INSERT INTO san_phams(ten_san_pham, gia_san_pham, gia_khuyen_mai, so_luong, ngay_nhap, danh_muc_id, trang_thai, mo_ta, hinh_anh) VALUES (:ten_san_pham, :gia_san_pham, :gia_khuyen_mai, :so_luong, :ngay_nhap, :danh_muc_id, :trang_thai, :mo_ta, :hinh_anh)';
            
            $stmt = $this->conn->prepare($sql);
            
            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh,
           
            ]);
           
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }

    public function insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh)
    {
        try {
            $sql = 'INSERT INTO hinh_anh_san_phams(san_pham_id, link_hinh_anh) VALUES (:san_pham_id, :link_hinh_anh)';
            
            $stmt = $this->conn->prepare($sql);
            
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':link_hinh_anh' => $link_hinh_anh,
            ]);
            
            return true;
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }

    public function getDetailSanPham($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id WHERE san_phams.id = :id';
            
            $stmt = $this->conn->prepare($sql);
            
            $stmt->execute([':id' => $id]);
            
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }

    public function getListAnhSanPham($id)
    {
        try {
            
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id';
            
            $stmt = $this->conn->prepare($sql);
           
            $stmt->execute([':id' => $id]);
           
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
    public function search() {
        // Lấy giá trị tìm kiếm từ biến GET, nếu không có giá trị thì đặt thành chuỗi rỗng
        $search = isset($_GET['search']) ? $_GET['search'] : '';
    
        // Kiểm tra nếu có từ khóa tìm kiếm
        if ($search) {
            // Chuẩn bị câu truy vấn SQL với điều kiện tìm kiếm
            $sql = "SELECT * FROM san_phams WHERE ten_san_pham LIKE :search";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['search' => '%' . $search . '%']);
            
            // Lấy tất cả các kết quả tìm kiếm
            $listSanPham = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Trả về danh sách sản phẩm tìm được
            return $listSanPham;
        } else {
            // Nếu không có từ khóa tìm kiếm, trả về thông báo không có sản phẩm
            return 'không tồn tại sản phẩm nào';
        }
    }
    
}