<!-- header -->
<?php include './views/layout/header.php'; ?>
<!-- end header -->
<!-- Nav Bar -->
<?php include './views/layout/navbar.php'; ?>
<!-- end Nav Bar -->
<!-- slidebar -->
<?php include './views/layout/slidebar.php'; ?>
<!-- end slidebar -->
<style>
.dataTables_wrapper .dataTables_filter {
    float: right;
    text-align: right;
}

.dataTables_wrapper .dataTables_paginate {
    float: right;
    text-align: right;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Danh Sách Sản Phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Sản Phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action=" <?= BASE_URL_ADMIN . '?act=add-san-pham'?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label>Tên Sản Phẩm</label>
                                    <input type="text" class="form-control" name="ten_san_pham"
                                        placeholder="Nhập Tên Sản Phẩm">
                                    <?php if (isset($_SESSION['error']['ten_san_pham'])) {?>
                                    <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                                    <?php } ?>
                                </div>


                                <div class="form-group col-6">
                                    <label>Giá Sản Phẩm</label>
                                    <input type="number" class="form-control" name="gia_san_pham"
                                        placeholder="Nhập Giá Sản Phẩm">
                                    <?php if (isset($_SESSION['error']['gia_san_pham'])) {?>
                                    <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Giá Khuyến Mãi</label>
                                    <input type="number" class="form-control" name="gia_khuyen_mai"
                                        placeholder="Nhập Giá Khuyến Mãi Sản Phẩm">
                                    <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) {?>
                                    <p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Hình Ảnh</label>
                                    <input type="file" class="form-control" name="hinh_anh">
                                    <?php if (isset($_SESSION['error']['hinh_anh'])) {?>
                                    <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Album</label>
                                    <input type="file" class="form-control" name="img_array[]" multiple>
                                    <?php if (isset($_SESSION['error']['hinh_anh'])) {?>
                                    <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Số Lượng</label>
                                    <input type="number" class="form-control" name="so_luong"
                                        placeholder="Nhập Số Lượng ">
                                    <?php if (isset($_SESSION['error']['so_luong'])) {?>
                                    <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Ngày Nhập</label>
                                    <input type="date" class="form-control" name="ngay_nhap"
                                        placeholder="Nhập Ngày Nhập">
                                    <?php if (isset($_SESSION['error']['ngay_nhap'])) {?>
                                    <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Danh Mục</label>
                                    <select class="form-control" name="danh_muc_id" id="exampleFormControlSelect1">
                                        <option selected disabled>Chọn danh mục sản phẩm</option>
                                        <?php foreach($listDanhMuc as $danhMuc):  ?>
                                        <option value="<?= $danhMuc['id']?>"><?= $danhMuc['ten_danh_muc']?></option>
                                        <?php endforeach  ?>
                                    </select>
                                    <?php if (isset($_SESSION['error']['danh_muc_id'])) {?>
                                    <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Trạng Thái</label>
                                    <select class="form-control" name="trang_thai" id="exampleFormControlSelect1">
                                        <option selected disabled>Trạng Thái sản phẩm</option>
                                        <option value="1">Còn hàng</option>
                                        <option value="2">Hết hàng</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['trang_thai'])) {?>
                                    <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-12">
                                    <label>Mô Tả Danh Mục</label>
                                    <textarea name="mo_ta" id="" class="form-control"
                                        placeholder="Nhập Mô Tả"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= BASE_URL_ADMIN . '?act=san-pham'?>" class="btn btn-primary"><i
                                        class="fas fa-backward"> </i> Back</a>
                            </div>

                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- footer -->
<?php
include './views/layout/footer.php';
?>
<!-- end footer -->

</body>

</html>