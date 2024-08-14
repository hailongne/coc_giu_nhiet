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
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item "><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item " aria-current="page">Giỏ Hàng</li>
                                <li class="breadcrumb-item active" aria-current="page">Thanh Toán</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
        <div class="container">
            <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan'?>" method="POST">
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Thông Tin Người Nhận</h5>
                            <div class="billing-form-wrap">


                                <div class="single-input-item">
                                    <label for="ten_nguoi_nhan" class="required">Tên Người Nhận</label>
                                    <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan"
                                        value='<?= $user['ho_ten']?>' placeholder="Tên Người Nhận " required />
                                </div>

                                <div class="single-input-item">
                                    <label for="email_nguoi_nhan" class="required">Địa Chỉ Email</label>
                                    <input type="email" id="email_nguoi_nhan" name="email_nguoi_nhan"
                                        value='<?= $user['email']?>' placeholder="Email " required />
                                </div>

                                <div class="single-input-item">
                                    <label for="sdt_nguoi_nhan" class="required">Số Điện Thoại Người Nhận</label>
                                    <input type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan"
                                        value='<?= $user['so_dien_thoai']?>' placeholder="Số Điện Thoại Người Nhận"
                                        required />
                                </div>

                                <div class="single-input-item">
                                    <label for="dia_chi_nguoi_nhan" class="required">Địa Chỉ Người Nhận</label>
                                    <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan"
                                        value='<?= $user['dia_chi']?>' placeholder="Địa Chỉ Người Nhận " required />
                                </div>



                                <div class="single-input-item">
                                    <label for="ghi_chu">Ghi Chú</label>
                                    <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="3"
                                        placeholder="Ghi chú đơn hàng của bạn."></textarea>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Thông Tin Sản Phẩm</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sản Phẩm</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $tongHang = 0;
                                    foreach ($chiTietGioHang as $key => $sanPham): ?>
                                            <tr>
                                                <td>
                                                    <a href=""><?= $sanPham['ten_san_pham'] ?>:
                                                        <?= $sanPham['so_luong'] ?> Sản Phẩm</a>
                                                </td>

                                                <td>
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
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Shipping</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="freeshipping" name="shipping"
                                                            class="custom-control-input" checked />
                                                        <label class="custom-control-label" for="freeshipping">Free
                                                            Shipping</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold fs-5">Tổng Tiền Thanh Toán</td>
                                                <input type="hidden" name="tong_tien" value="<?= $tongGioHang ?>">
                                                <td class="fw-bold fs-5"><?= formatPrice($tongGioHang) . 'đ' ?>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" value="1"
                                                    name="phuong_thuc_thanh_toan_id" class="custom-control-input"
                                                    checked />
                                                <label class="custom-control-label" for="cashon">Thanh Toán Khi Nhận
                                                    Hàng(COD)</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Khách hàng có thể thanh toán sau khi nhận hàng thành công.</p>
                                        </div>
                                    </div>
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="directbank" name="phuong_thuc_thanh_toan_id"
                                                    value="2" class="custom-control-input" />
                                                <label class="custom-control-label" for="directbank">Thanh Toán
                                                    Online</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="bank">
                                            <p>Khách hàng có thể thanh toán online.</p>
                                        </div>
                                    </div>
                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label text-danger" for="terms">Xác Nhận Đặt
                                                Hàng</label>
                                        </div>
                                        <button type="submit" class="btn btn-sqr">Tiến Hành Đặt Hàng</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout main wrapper end -->
</main>










<?php require_once 'layout/miniCart.php'; ?>
<?php require_once 'layout/footer.php'; ?>