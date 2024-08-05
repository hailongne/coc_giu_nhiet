<?php include './views/layout/header.php'; ?>
<style>
/* Overall styling for product section */
.content {
    padding: 20px;
}

.card-solid {
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: box-shadow 0.3s ease;
}

.card-solid:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* Card body styling */
.card-body {
    padding: 20px;
}

.product-image {
    border-radius: 10px;
    object-fit: cover;
}

/* Thumbnail styling */
.product-image-thumbs {
    display: flex;
    margin-top: 15px;
    gap: 10px;
}

.product-image-thumb {
    cursor: pointer;
    border: 2px solid transparent;
    border-radius: 5px;
    overflow: hidden;
}

.product-image-thumb img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-image-thumb:hover img {
    transform: scale(1.1);
}

.product-image-thumb.active {
    border-color: #007bff;
}

/* Product details styling */
h3 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 15px;
}

h4 {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 10px;
    color: #333;
}

h4 small {
    font-weight: 400;
    color: #777;
}

/* Button styling */
.btn {
    font-size: 1rem;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-secondary {
    background-color: #6c757d;
    color: #fff;
    border: none;
}

.btn-secondary:hover {
    background-color: #5a6268;
}
</style>
<div class="content-wrapper">
    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img style="width: 100%; height: auto" src="<?= BASE_URL . $sanPham['hinh_anh']?>"
                                class="product-image" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <?php foreach ($listAnhSanPham as $key => $anhSP) :?>
                            <div class="product-image-thumb <?= $key == 0 ? 'active' : '' ?>">
                                <img src="<?= BASE_URL . $anhSP['link_hinh_anh']?>" alt="Product Image">
                            </div>
                            <?php endforeach?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">Tên sản phẩm : <?= $sanPham['ten_san_pham']?></h3>
                        <hr>
                        <h4 class="mt-3">Giá tiền: <small><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?>
                                VNĐ</small></h4>
                        <h4 class="mt-3">Giá khuyến mãi:
                            <small><?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?> VNĐ</small>
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
                            <a href="<?= BASE_URL . '?act=danh-sach-san-pham'?>" class="btn btn-secondary w-50">Quay
                                Lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<!-- footer -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer -->
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
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