<?php 

class AdminSanPhamController {

    public function admin(){
        require_once './views/layout/admin.php';
    }
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    
    public function danhSachSanPham(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/sanpham/listSanPham.php';
    }


    public function formAddSanPham(){

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/sanpham/addSanPham.php';

        deleteSessionError();
        
    }

    public function postAddSanPham(){
        if ($_SERVER['REQUEST_METHOD']== 'POST') {
            
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            $file_thumb = $hinh_anh ? uploadFile($hinh_anh, './uploads/') : '';     

            $img_array = $_FILES['img_array'];

            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = ' Giá khuyêbs mãi không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh Mục sản phẩm phải chọn';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái phải chọn';
            }
            if (empty($hinh_anh['error']===0)) {
                $errors['hinh_anh'] = 'Phải chọn ảnh sản phẩm';
            }

            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                $san_pham_id = $this->modelSanPham->insertSanPham($ten_san_pham, 
                                                    $gia_san_pham, 
                                                    $gia_khuyen_mai, 
                                                    $so_luong, 
                                                    $ngay_nhap, 
                                                    $danh_muc_id, 
                                                    $trang_thai, 
                                                    $mo_ta, 
                                                    $file_thumb
                                                );

                if (!empty($img_array['name'])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name'=> $img_array['name'][$key],
                            'type'=> $img_array['type'][$key],
                            'tmp_name'=> $img_array['tmp_name'][$key],
                            'error'=> $img_array['error'][$key],
                            'size'=> $img_array['size'][$key],
                        ];
                        $link_hinh_anh = uploadFile($file, './uploads/');
                        $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }


                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            }else{
                $_SESSION['flash'] = true;

                header("Location:" . BASE_URL_ADMIN . "?act=form-add-san-pham");
                exit();
                
            }
        }
        
    }



    public function formEditSanPham(){

        $id=$_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id); 
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        // var_dump($SanPham);
        if ($sanPham) {
            require_once './views/sanpham/editSanPham.php';
            deleteSessionError();
        }else{
            header("location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
        
    }

    public function postEditSanPham(){
        if ($_SERVER['REQUEST_METHOD']== 'POST') {

            $san_pham_id = $_POST['san_pham_id'] ?? '';

            $sanPhamOld=$this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh'];
            
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;


            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = ' Giá khuyêbs mãi không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh Mục sản phẩm phải chọn';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái phải chọn';
            }

            $_SESSION['error'] = $errors;

            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                $new_file = uploadFile($hinh_anh, './uploads/');

                if (!empty($old_file)) {
                    deleteFile($old_file);
                }else {
                    $new_file = $old_file;
                }
            }

            if (empty($errors)) {
                $this->modelSanPham->updateSanPham($ten_san_pham,
                                                    $san_pham_id, 
                                                    $gia_san_pham, 
                                                    $gia_khuyen_mai, 
                                                    $so_luong, 
                                                    $ngay_nhap, 
                                                    $danh_muc_id, 
                                                    $trang_thai, 
                                                    $mo_ta, 
                                                    $new_file
                                                );

                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            }else{
                $_SESSION['flash'] = true;

                header("Location:" . BASE_URL_ADMIN . "?act=form-edit-san-pham&id_san_pham=" . $san_pham_id);
                exit();
                
            }
        }
        
    }


    // public function deleteSanPham(){
    //     $id=$_GET['id_danh_muc'];
    //     $SanPham = $this->modelSanPham->getDetailSanPham($id); 

    //     if ($SanPham) {
    //         $this->modelSanPham->detroySanPham($id);
    //     }
    //     header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
    //         exit();
    // }

}