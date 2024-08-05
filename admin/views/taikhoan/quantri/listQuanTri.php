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
/* Đặt chiều rộng của bảng */
.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
}

/* Đặt đường viền cho bảng */
.table-bordered {
    border: 1px solid #dee2e6;
}

/* Đặt đường viền cho các ô trong bảng */
.table-bordered th,
.table-bordered td {
    border: 1px solid #dee2e6;
}

/* Đặt nền cho tiêu đề bảng */
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}

/* Đặt khoảng cách giữa các ô */
.table td,
.table th {
    padding: 0.75rem;
    vertical-align: top;
}

/* Căn chỉnh văn bản trong ô */
.table td {
    text-align: center;
    vertical-align: middle;
}

/* Căn chỉnh văn bản trong tiêu đề */
.table thead th {
    text-align: center;
    vertical-align: middle;
}

.btn {
    margin-right: 5px;
}

/* Đặt màu nền và đường viền cho các nút */
.btn-success {
    border-color: #28a745;
}

.btn-danger {
    border-color: #dc3545;
}

/* Đặt khoảng cách giữa các nút */
.card-body a {
    margin-right: 5px;
}

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
                    <h1>Quản Lý Tài Khoản Quản Trị Viên</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card">
                        <div class="card-header">
                            <a href="<?= BASE_URL_ADMIN . '?act=form-them-quan-tri'?>">
                                <button class="btn btn-success">Thêm Tài Khoản</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ Tên</th>
                                        <th>Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Trạng Thái</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($listQuanTri as $key=>$quanTri): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $quanTri['ho_ten'] ?></td>
                                        <td><?= $quanTri['email'] ?></td>
                                        <td><?= $quanTri['so_dien_thoai'] ?></td>
                                        <td><?= $quanTri['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                                        <td>
                                            <a
                                                href="<?= BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quanTri['id']?>">
                                                <button class="btn btn-success"><i class="fas fa-edit"></i>
                                                    Edit</button>
                                            </a>
                                            <a href="#" onclick="confirmResetPassword(<?= $quanTri['id'] ?>)">
                                                <button class="btn btn-danger">Reset Password</button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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
<script>
function confirmResetPassword(id) {
    Swal.fire({
        title: 'Bạn có muốn reset password của tài khoản không?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Có, reset nó!',
        cancelButtonText: 'Không, hủy!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '<?= BASE_URL_ADMIN ?>?act=reset-password&id_quan_tri=' + id;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Hủy',
                'Tài khoản vẫn an toàn :)',
                'error'
            )
        }
    })
}
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "language": {
            "search": "_INPUT_",
            "searchPlaceholder": "Search..."
        },
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
</body>

</html>