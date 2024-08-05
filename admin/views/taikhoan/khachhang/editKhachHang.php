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
                    <h1>Quản Lý Tài Khoản Khách Hàng</h1>
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
                            <h3 class="card-title">Sửa Tài Khoản Khách Hàng: <?= $khachHang['ho_ten'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action=" <?= BASE_URL_ADMIN . '?act=sua-khach-hang'?>" method="POST">
                            <input type="hidden" name="khach_hang_id" value="<?= $khachHang['id'] ?>">

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Họ Tên</label>
                                    <input type="text" class="form-control" name="ho_ten"
                                        value="<?= $khachHang['ho_ten'] ?>" placeholder="Nhập Họ Tên">
                                    <?php if (isset($_SESSION['error']['ho_ten'])) {?>
                                    <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email"
                                        value="<?= $khachHang['email'] ?>" placeholder="Nhập Email">
                                    <?php if (isset($_SESSION['error']['email'])) {?>
                                    <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Số Điện Thoại</label>
                                    <input type="text" class="form-control" name="so_dien_thoai"
                                        value="<?= $khachHang['so_dien_thoai'] ?>" placeholder="Nhập Số Điện Thoại">
                                    <?php if (isset($_SESSION['error']['so_dien_thoai'])) {?>
                                    <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Ngày Sinh</label>
                                    <input type="date" class="form-control" name="ngay_sinh"
                                        value="<?= $khachHang['ngay_sinh'] ?>">
                                    <?php if (isset($_SESSION['error']['ngay_sinh'])) {?>
                                    <p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Giới Tính</label>
                                    <select id="gioi_tinh" name="gioi_tinh" class="form-control custom-select">
                                        <option <?= $khachHang['gioi_tinh'] == 1 ? 'selected' : ''?> value="1">Nam
                                        </option>
                                        <option <?= $khachHang['gioi_tinh'] !== 1 ? 'selected' : ''?> value="2">
                                            Nữ
                                        </option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['gioi_tinh'])) {?>
                                    <p class="text-danger"><?= $_SESSION['error']['gioi_tinh'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Địa Chỉ</label>
                                    <input type="text" class="form-control" name="dia_chi"
                                        value="<?= $khachHang['dia_chi'] ?>" placeholder="Nhập Số Địa Chỉ">
                                    <?php if (isset($_SESSION['error']['dia_chi'])) {?>
                                    <p class="text-danger"><?= $_SESSION['error']['dia_chi'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label for="trang_thai">Trạng Thái Tài Khoản</label>
                                    <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                                        <option <?= $khachHang['trang_thai'] == 1 ? 'selected' : ''?> value="1">Active
                                        </option>
                                        <option <?= $khachHang['trang_thai'] !== 1 ? 'selected' : ''?> value="2">
                                            Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang'?>"
                                    class="btn btn-primary"><i class="fas fa-backward"> </i> Back</a>
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