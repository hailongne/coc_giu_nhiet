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
                    </div>
                    <div class="col-12">
                        <hr>
                        <hr>
                        <h2>Bình luận</h2>
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
                                            href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id']?>"><?= $binhLuan['ho_ten'] ?></a>
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
                                                <input type="hidden" name="name_view" value="detail_sanpham">
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