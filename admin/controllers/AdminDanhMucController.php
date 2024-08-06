<?php 

class AdminDanhMucController {

    public function admin(){
        require_once './views/layout/admin.php';
    }
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    
    public function danhSachDanhMuc(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }

    // Add Danh Muc

    public function formAddDanhMuc(){
        require_once './views/danhmuc/addDanhMuc.php';
        
    }

    public function postAddDanhMuc(){
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD']== 'POST') {
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            if (empty($errors)) {
                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            }else{
                require_once './views/danhmuc/addDanhMuc.php';
            }
        }
        
    }

    // End Add Danh Muc

    // Edit Danh Muc


    public function formEditDanhMuc(){

        $id=$_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id); 
        // var_dump($danhMuc);
        if ($danhMuc) {
            require_once './views/danhmuc/editDanhMuc.php';
        }else{
            header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
        
    }

    public function postEditDanhMuc(){
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD']== 'POST') {
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            if (empty($errors)) {
                $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
                header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            }else{
                $danhMuc= ['id'=>$id, 'ten_danh_muc'=>$ten_danh_muc, 'mo_ta'=>$mo_ta];
                require_once './views/danhmuc/editDanhMuc.php';
            }
        }
        
    }

    // End Edit Danh Muc

    // Delete Danh Muc

    public function deleteDanhMuc(){
        $id=$_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id); 

        if ($danhMuc) {
            $this->modelDanhMuc->detroyDanhMuc($id);
        }
        header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
    }

}