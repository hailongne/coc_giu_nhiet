<!-- header -->
<?php include './views/layout/header.php'; ?>
<!-- end header -->
<!-- Nav Bar -->
<?php include './views/layout/navbar.php'; ?>
<!-- end Nav Bar -->
<!-- slidebar -->
<?php include './views/layout/slidebar.php'; ?>
<!-- end slidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-11">
                    <h1>Quản lý danh sách cốc giữ nhiệt</h1>
                </div>


            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">

                        <div class="col-12">
                            <img style=" width:500px; height:500px" src="<?= BASE_URL . $sanPham ['hinh_anh']?>"
                                class="product-image" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <?php foreach ($listAnhSanPham as $key => $anhSP) :?>

                            <div class="product-image-thumb <?php $anhSP[$key] == 0 ? 'active': ''  ?>"><img
                                    src="<?= BASE_URL . $anhSP['link_hinh_anh']?>" alt="Product Image"></div>
                            <?php endforeach?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">Tên sản phẩm : <?= $sanPham['ten_san_pham']?></h3>
                        <hr>
                        <h4 class="mt-3">Giá tiền: <small><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?>
                                VNĐ</small></h4>
                        <h4 class="mt-3">Giá khuyến mãi:
                            <small><?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?>
                                VNĐ</small>
                        </h4>
                        <h4 class="mt-3">Số lượng: <small><?= $sanPham['so_luong']?></small></h4>
                        <h4 class="mt-3">Lượt xem: <small><?= $sanPham['luot_xem']?></small></h4>
                        <h4 class="mt-3">Ngày nhập: <small><?= $sanPham['ngay_nhap']?></small></h4>
                        <h4 class="mt-3">Danh mục: <small><?= $sanPham['ten_danh_muc']?></small></h4>
                        <h4 class="mt-3">Trạng thái:
                            <small><?= $sanPham['trang_thai'] == 1 ? 'còn bán' : 'dừng bán'?></small>
                        </h4>
                        <h4 class="mt-3">Mô tả: <small><?= $sanPham['mo_ta']?></small></h4>
                        <br>
                        <div class="col-mt-1">
                            <a href="<?= BASE_URL_ADMIN . '?act=san-pham'?>" class="btn btn-secondary w-50">Quay
                                Lại</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="row mt-4">
      <nav class="w-100">
        <div class="nav nav-tabs" id="product-tab" role="tablist">
          <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#binh-luan" role="tab" aria-controls="product-desc" aria-selected="true">bình luận sản phẩm</a>
          
        </div>
      </nav>
      <div class="tab-content p-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="binh-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
           <div class="container">
           
           </div>
      
        </div>
       
      </div>
    </div> -->
                <ul class="nav nav-tabs row mt-4" id="product-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Bình luận sản
                            phẩm</button>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>tên người bình luận</th>
                                    <th> Nội dung</th>
                                    <th>Ngày đăng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Hải Long</td>
                                    <td>Sản phẩm hơi cũ</td>
                                    <td>20/07/2024</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#"><button class=" btn btn-warning">ẩn</button></a>
                                            <a href="#"><button class=" btn btn-danger">xóa</button></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- footer -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer -->
<!-- Page specific script -->
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print",
        //     "colvis"
        //]
    }).buttons().container().appendTo(
        '#example1_wrapper .col-md-6:eq(0)');
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
<!-- Code injected by live-server -->

</body>
<script>
$(document).ready(function() {
    $('.product-image-thumb').on('click', function() {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
    })
})
</script>

</html>