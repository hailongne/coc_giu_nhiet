<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/menu.php' ?>


<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Giỏ Hàng</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">

            <?php if (isset($_SESSION['user_client'] )) {?>
            <?php if (empty($_SESSION['gio_hangs'] )) {?>
            <div class="section-bg-color">
                Giỏ Hàng của bạn chưa có sản phẩm nào. <a href="<?= BASE_URL . '?act=all-san-pham'?>">Hãy mua sẵm ngay
                    nào</a>
            </div>
            <?php } else {?>

            <div class="section-bg-color">

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Ảnh sản phầm</th>
                                        <th class="pro-title">Tên sản phẩm</th>
                                        <th class="pro-price">Giá tiền</th>
                                        <th class="pro-quantity">Số lượng</th>
                                        <th class="pro-subtotal">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $tongHang = 0;
                                        foreach ($chiTietGioHang as $key => $sanPham):
                                        ?>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                                    src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="Product" /></a>
                                        </td>
                                        <td class="pro-title"><a
                                                href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['san_pham_id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                        </td>
                                        <td class="pro-price"><span>
                                                <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                <?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?>₫
                                                <?php  } else { ?>
                                                <?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?>₫
                                                <?php } ?>

                                            </span></td>
                                        <td class="pro-quantity"><?= $sanPham['so_luong'] ?> Sản Phẩm
                                        </td>
                                        <td class="pro-subtotal">
                                            <span>
                                                <?php
                                    $tongTien = 0;

                                    if ($sanPham['gia_khuyen_mai']) {
                                        $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                    } else {
                                        $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                    }

                                    if (!isset($tongGioHang)) {
                                        $tongGioHang = 0; 
                                    }

                                    $tongGioHang += $tongTien; 
                                    echo formatPrice($tongTien) . 'đ';
                                    ?>
                                            </span>
                                        </td>

                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->
                        <div class="cart-update-option d-block d-md-flex justify-content-between">
                            <div class="apply-coupon-wrapper">

                                <td>Tổng tiền thanh toán: <?= formatPrice($tongGioHang) . 'đ' ?> </td>
                            </div>
                            <div class="cart-update">

                                <a href="<?= BASE_URL . '?act=thanh-toan' ?> " class="btn btn-sqr">Đặt Hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h6>Tổng đơn hàng</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Tổng tiền sản phẩm</td>
                                            <td><?= formatPrice($tongGioHang) . 'đ' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Vận chuyển</td>
                                            <td>Free Ship</td>
                                        </tr>
                                        <tr class="total">
                                            <td>Tổng tiền thanh toán</td>
                                            <td class="total-amount"><?= formatPrice($tongGioHang) . 'đ' ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="<?= BASE_URL . '?act=thanh-toan' ?> " class="btn btn-sqr d-block">Tiến hành đặt
                                hàng</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php }
            else{?>
            <div class="section-bg-color">
                Bạn cần đăng nhập để thực hiện chức năng này. <a class="text-warning"
                    href="<?= BASE_URL . '?act=login'?>">Đăng
                    Nhập Ngay</a>
            </div>
            <?php  }?>


        </div>
    </div>
    <!-- cart main wrapper end -->
</main>

<!-- Giỏ Hàng -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDeleteProduct(id) {
    Swal.fire({
        title: 'Bạn có muốn xóa sản phẩm không?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Có, xóa nó!',
        cancelButtonText: 'Không, hủy!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '<?= BASE_URL ?>?act=xoa-san-pham&id_san_pham=' + id;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Hủy',
                'Sản phẩm vẫn an toàn :)',
                'error'
            )
        }
    })
}
</script>

<?php require_once 'layout/footer.php'; ?>