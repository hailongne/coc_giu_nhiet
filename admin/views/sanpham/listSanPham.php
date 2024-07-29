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


                    <div class="card">
                        <div class="card-header">
                            <a href="<?= BASE_URL_ADMIN . '?act=form-them-san-pham'?>">
                                <button class="btn btn-success">Thêm Sản Phẩm</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Giá tiền</th>
                                        <th>Giá khuyến mãi</th>
                                        <th>Số lượng</th>
                                        <th>Danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listSanPham as $key => $sanPham): ?>
                                    <tr>
                                        <td><?= $key + 1 ?> </td>
                                        <td> <?= $sanPham['ten_san_pham'] ?></td>
                                        <td> <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt=""
                                                style="width:100px"
                                                onerror="this.onerror=null; this.src='https://cdn3.vectorstock.com/i/1000x1000/91/27/error-icon-vector-19829127.jpg'">
                                        </td>

                                        <td> <?= $sanPham['gia_san_pham'] ?></td>
                                        <td> <?= $sanPham['gia_khuyen_mai'] ?></td>
                                        <td> <?= $sanPham['so_luong'] ?></td>
                                        <td> <?= $sanPham['ten_danh_muc'] ?></td>
                                        <td> <?= $sanPham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán'; ?></td>

                                        <td>
                                            <div class="btn-group">
                                                <a
                                                    href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                                    <button class="btn btn-primary"> <i class="far fa-eye"></i></button>

                                                </a>
                                                <a
                                                    href="<?= BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                                    <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>

                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id_san_pham=' . $sanPham['id'] ?>"
                                                    onclick="return confirm('Bạn có muốn xóa không?')">
                                                    <button class="btn btn-danger"><i
                                                            class="far fa-trash-alt"></i></button>

                                                </a>
                                            </div>


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