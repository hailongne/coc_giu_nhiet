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
                    <h1>Quản Lý Danh Mục Sản Phẩm</h1>
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
                            <a href="<?= BASE_URL_ADMIN . '?act=form-add-danh-muc'?>">
                                <button class="btn btn-success">Thêm Danh Mục</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Danh Mục</th>
                                        <th>Mô Tả</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($listDanhMuc as $key=>$danhMuc): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $danhMuc['ten_danh_muc'] ?></td>
                                        <td><?= $danhMuc['mo_ta'] ?></td>
                                        <td>
                                            <a
                                                href="<?= BASE_URL_ADMIN . '?act=form-edit-danh-muc&id_danh_muc=' . $danhMuc['id']?>">
                                                <button class="btn btn-success">Edit</button>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=delete-danh-muc&id_danh_muc=' . $danhMuc['id']?>"
                                                onclick="return confirm('are u sure?')">
                                                <button class="btn btn-danger">Delete</button>
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