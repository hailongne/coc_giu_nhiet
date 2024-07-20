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
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.container {
    padding: 50px;
    text-align: center;
}

h2 {
    color: crimson;
}

.buttons {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    margin-top: 20px;
}

.button-row {
    display: flex;
    justify-content: center;
    gap: 20px;
    width: 100%;
}


.content {
    text-align: left;
    margin-top: 30px;
    color: #f9f9f9;
}

.content h3 {
    color: crimson;
    margin-bottom: 20px;
}

.content p {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 10px;
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
    <div class="container">
        <h2>Trang Quản Lý Admin</h2>
        <div class="button">
            <div class="button-row">
                <a href="<?= BASE_URL_ADMIN . '?act=danh-muc'?>" class="btn btn-primary ">Quản lý danh mục</a>
                <a href="<?= BASE_URL_ADMIN . '?act=san-pham'?>" class="btn btn-primary ">Quản lý sản phẩm</a>
                <a href="<?= BASE_URL_ADMIN . '?act=don-hang'?>" class="btn btn-primary ">Quản lý đơn hàng</a>
            </div>
            <div class="content mt-5">
                <h3>Giới Thiệu</h3>
                <p>Trang quản lý admin cung cấp các công cụ và tính năng cần thiết để quản lý cửa hàng thể thao của bạn
                    một
                    cách hiệu quả và tiện lợi.</p>
                <p>Chức năng quản lý danh mục giúp bạn tạo, chỉnh sửa và xóa các danh mục sản phẩm một cách dễ dàng.</p>
                <p>Chức năng quản lý sản phẩm cho phép bạn thêm mới, cập nhật thông tin và quản lý tồn kho sản phẩm của
                    cửa
                    hàng.</p>
                <p>Chức năng quản lý đơn hàng giúp bạn theo dõi và xử lý các đơn đặt hàng của khách hàng một cách nhanh
                    chóng và chính xác.</p>
                <p>Với giao diện thân thiện và dễ sử dụng, trang quản lý admin là công cụ không thể thiếu để điều hành
                    cửa
                    hàng thể thao của bạn một cách hiệu quả nhất.</p>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<!-- footer -->
<?php
include './views/layout/footer.php';
?>
<!-- end footer -->

</body>

</html>