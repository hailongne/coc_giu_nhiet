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
                <div class="col-6">
                    <img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" alt="" width="70%" onerror=" this.onerror=null;
                        this.src='https://i.pinimg.com/originals/fc/04/73/fc047347b17f7df7ff288d78c8c281cf.png'">
                </div>
                <div class="col-4">
                    <table class="table table-borderless">
                        <tbody style="font-size: large;">
                            <tr>
                                <th>Họ Tên:</th>
                                <th><?= $khachHang['ho_ten'] ?? ' ' ?></th>
                            </tr>
                            <tr>
                                <th>Ngày Sinh:</th>
                                <th><?= $khachHang['ngay_sinh'] ?? '' ?></th>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <th><?= $khachHang['email'] ?? ''?></th>
                            </tr>
                            <tr>
                                <th>Số Điện Thoại:</th>
                                <th><?= $khachHang['so_dien_thoai'] ?? ''?></th>
                            </tr>
                            <tr>
                                <th>Giới Tính:</th>
                                <th><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ'?></th>
                            </tr>
                            <tr>
                                <th>Địa Chỉ:</th>
                                <th><?= $khachHang['dia_chi'] ?? ''?></th>
                            </tr>
                            <tr>
                                <th>Trạng Thái:</th>
                                <th><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive'?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="col-12">
                    <hr>
                    <hr>
                    <h2>Lịch sử mua hàng</h2>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã đơn hàng</th>
                                <th>Tên người nhận</th>
                                <th>Số điện thoại</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listDonHang as $key => $donHang): ?>
                            <tr>
                                <td><?= $key + 1 ?> </td>
                                <td> <?= $donHang['ma_don_hang'] ?></td>
                                <td> <?= $donHang['ten_nguoi_nhan'] ?></td>
                                <td> <?= $donHang['sdt_nguoi_nhan'] ?></td>
                                <td> <?= $donHang['ngay_dat'] ?></td>
                                <td> <?= $donHang['tong_tien'] ?></td>
                                <td> <?= $donHang['ten_trang_thai'] ?></td>

                                <td>
                                    <div class="btn-group">
                                        <a
                                            href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donHang['id'] ?>">
                                            <button class="btn btn-primary"> <i class="far fa-eye"></i></button>

                                        </a>
                                        <a
                                            href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>">
                                            <button class="btn btn-warning"><i class="fas fa-edit"></i></button>

                                        </a>

                                    </div>


                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <hr>
                    <hr>
                    <h2>Lịch sử bình luận</h2>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Sản Phẩm</th>
                                <th>Nội Dung</th>
                                <th>Ngày Bình Luận</th>
                                <th>Trạng Thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listBinhLuan as $key => $binhLuan): ?>
                            <tr>
                                <td><?= $key + 1 ?> </td>
                                <td> <a target="_blank"
                                        href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id']?>"><?= $binhLuan['ten_san_pham'] ?></a>
                                </td>
                                <td> <?= $binhLuan['noi_dung'] ?></td>
                                <td> <?= $binhLuan['ngay_dang'] ?></td>
                                <td> <?= $binhLuan['trang_thai'] == 1 ? 'Hiển Thị' : 'Ẩn'?></td>
                                <td>
                                    <div class="btn-group">
                                        <form id="hide-comment-form"
                                            action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>"
                                            method="POST">
                                            <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                                            <input type="hidden" name="name_view" value="detail_khach">
                                            <button type="button" class="btn btn-danger" id="hide-comment-button">
                                                <?= $binhLuan['trang_thai'] == 1 ? ' Ẩn' : 'Hiển Thị'?> Bình Luận
                                            </button>
                                        </form>
                                    </div>


                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php
include './views/layout/footer.php';
?>
<!-- end footer -->

</body>

<script>
document.getElementById('hide-comment-button').addEventListener('click', function() {
    Swal.fire({
        title: 'Bạn có muốn <?= $binhLuan['trang_thai'] == 1 ? ' ẩn' : 'hiển thị'?> Bình Luận này không?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Có!',
        cancelButtonText: 'Không, hủy!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('hide-comment-form').submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire('Hủy', 'Bình luận vẫn được hiển thị :)', 'error');
        }
    })
});
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
    });
});
</script>

</html>