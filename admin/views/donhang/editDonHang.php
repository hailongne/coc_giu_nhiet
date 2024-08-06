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
                    <h1>Quản lý thông tin đơn hàng</h1>
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
                            <h3 class="card-title">Sửa thông tin đơn hàng: <?= $donHang['ma_don_hang']?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action=" <?= BASE_URL_ADMIN . '?act=sua-don-hang'?>" method="POST">
                            <input type="text" name="don_hang_id" value="<?= $donHang['id'] ?>" hidden>
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Tên Người Nhận</label>
                                    <input type="text" class="form-control" name="ten_nguoi_nhan"
                                        value="<?= $donHang['ten_nguoi_nhan'] ?>">
                                    <?php if (isset($errors['ten_nguoi_nhan'])) {?>
                                    <p class="text-danger"><?= $errors['ten_nguoi_nhan'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Số Điện Thoại</label>
                                    <input type="number" class="form-control" name="sdt_nguoi_nhan"
                                        value="<?= $donHang['sdt_nguoi_nhan'] ?>">
                                    <?php if (isset($errors['sdt_nguoi_nhan'])) {?>
                                    <p class="text-danger"><?= $errors['sdt_nguoi_nhan'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email_nguoi_nhan"
                                        value="<?= $donHang['email_nguoi_nhan'] ?>">
                                    <?php if (isset($errors['email_nguoi_nhan'])) {?>
                                    <p class="text-danger"><?= $errors['email_nguoi_nhan'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Địa Chỉ</label>
                                    <input type="text" class="form-control" name="dia_chi_nguoi_nhan"
                                        value="<?= $donHang['dia_chi_nguoi_nhan'] ?>">
                                    <?php if (isset($errors['dia_chi_nguoi_nhan'])) {?>
                                    <p class="text-danger"><?= $errors['dia_chi_nguoi_nhan'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Ghi Chú</label>
                                    <textarea name="ghi_chu" id="" class="form-control"
                                        placeholder="Nhập Mô Tả"><?= $donHang['ghi_chu'] ?></textarea>
                                </div>

                                <hr>


                                <div class="form-group col-6">
                                    <label for="trang_thai">Trạng Thái Đơn Hàng</label>
                                    <select id="trang_thai" name="trang_thai_id" class="form-control custom-select">
                                        <?php foreach ($listTrangThaiDonHang as $trangThai): ?>
                                        <option <?php 
                                        if ($donHang['trang_thai_id'] >  $trangThai['id'] 
                                        || $donHang['trang_thai_id'] == 9
                                        || $donHang['trang_thai_id'] == 10
                                        || $donHang['trang_thai_id'] == 11
                                        ) {
                                            echo 'disabled';
                                        }
                                        ?> <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : '' ?>
                                            value="<?= $trangThai['id']?>">
                                            <?= $trangThai['ten_trang_thai']?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="<?= BASE_URL_ADMIN . '?act=don-hang'?>" class="btn btn-primary"><i
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