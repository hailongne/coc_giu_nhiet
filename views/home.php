<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/menu.php' ?>




<main>
    <!-- hero slider area start -->
    <section class="slider-area">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/slide1.png">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero-slider-content slide-1">
                                    <h2 class="slide-title">Cốc Giữ Nhiệt<span><img src="assets/img/logoBrand/logo3.png"
                                                width="250px"></span></h2>
                                    <h4 class="slide-desc">Stay warm, stay cool</h4>
                                    <a href="<?= BASE_URL . '?act=all-san-pham'?>" class="btn btn-hero">Xem Thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->

            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/slide3.png">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero-slider-content slide-2 float-md-end float-none">
                                    <h2 class="slide-title">Cốc Giữ Nhiệt<span><img src="assets/img/logoBrand/logo3.png"
                                                width="250px"></span></h2>
                                    <h4 class="slide-desc">Stay warm, stay cool</h4>
                                    <a href="<?= BASE_URL . '?act=all-san-pham'?>" class="btn btn-hero">Xem Thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->

            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/slide2.png">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero-slider-content slide-3">
                                    <h2 class="slide-title">Cốc Giữ Nhiệt<span><img src="assets/img/logoBrand/logo3.png"
                                                width="250px"></span></h2>
                                    <h4 class="slide-desc">Stay warm, stay cool</h4>
                                    <a href="<?= BASE_URL . '?act=all-san-pham'?>" class="btn btn-hero">Xem Thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item end -->
        </div>
    </section>
    <!-- hero slider area end -->

    <!-- service policy area start -->
    <div class="service-policy section-padding">
        <div class="container">
            <div class="row mtn-30">
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-plane"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Giao Hàng </h6>
                            <p>Miễn phí vận chuyển đơn hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-help2"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Hỗ Trợ 24/7</h6>
                            <p>Hỗ trợ 24 giờ mọi ngày</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-back"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Hoàn Trả</h6>
                            <p>30 ngày đổi trả miễn phí</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-credit"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Thanh Toán</h6>
                            <p>Bảo Mật Thanh Toán</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service policy area end -->

    <!-- product area start -->
    <section class="product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Tất Cả Sản Phẩm Của Chúng Tôi</h2>
                        <p class="sub-title">Sản Phẩm Được Cập Nhật Liên Tục</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-container">
                        <!-- product tab content start -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    <?php foreach ($listSanPham as $key => $sanPham) : ?>
                                    <!-- product item start -->
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a
                                                href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']?>">
                                                <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>"
                                                    alt="product">
                                                <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>"
                                                    alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <?php
                                                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                    $ngayHienTai = new DateTime();
                                                    $tinhNgay = $ngayHienTai -> diff($ngayNhap);
                                                    if($tinhNgay->days <= 7){
                                                    ?>

                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <?php } ?>
                                                <?php if ($sanPham['gia_khuyen_mai']) {?>
                                                <div class="product-label discount">
                                                    <span>Còn
                                                        <?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?>₫</span>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="cart-hover">
                                                <button class="btn btn-cart"> <a class="text-dark"
                                                        href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']?>">Xem
                                                        Chi Tiết</a> </button>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a
                                                        href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']?>">Phúc
                                                        Long <?= $sanPham['ten_danh_muc'] ?></a>
                                                </p>
                                            </div>
                                            <h6 class="product-name">
                                                <a
                                                    href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']?>"><?= $sanPham['ten_san_pham'] ?></a>
                                            </h6>
                                            <div class="price-box">
                                                <?php if($sanPham['gia_khuyen_mai']) {?>
                                                <span
                                                    class="price-old"><del><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?>₫</del></span>
                                                <span
                                                    class="price-regular"><?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?>₫</span>
                                                <?php } else {?>
                                                <span
                                                    class="price-regular"><?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?>₫</span>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- product item end -->
                                    <?php endforeach ?>

                                </div>
                            </div>
                        </div>
                        <!-- product tab content end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product area end -->

    <!-- banner statistics area start -->
    <div class="banner-statistics-area mb-5">
        <div class="container">
            <div class="row row-20 mtn-20">
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="<?= BASE_URL . '?act=all-san-pham'?>">
                            <img src="assets/img/slider/slider4.jpg" alt="product banner">
                        </a>
                        <div class="banner-content text-right">
                            <h5 class="banner-text1">Phúc Long</h5>
                            <h2 class="banner-text2">Sản Phẩm<span>Giữ Nhiệt</span></h2>
                            <a href="<?= BASE_URL . '?act=all-san-pham'?>" class="btn btn-text">Shop Now</a>
                        </div>
                    </figure>
                </div>
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="<?= BASE_URL . '?act=all-san-pham'?>">
                            <img src="assets/img/slider/slider1.jpg" alt="product banner">
                        </a>
                        <div class="banner-content text-center">
                            <h5 class="banner-text1">Phúc Long</h5>
                            <h2 class="banner-text2">Bình Giữ Nhiệt <span>Kèm Túi Đựng</span></h2>
                            <a href="<?= BASE_URL . '?act=all-san-pham'?>" class="btn btn-text">Shop Now</a>
                        </div>
                    </figure>
                </div>
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="<?= BASE_URL . '?act=all-san-pham'?>">
                            <img src="assets/img/slider/slider2.jpg" alt="product banner">
                        </a>
                        <div class="banner-content text-center">
                            <h5 class="banner-text1">Phúc Long</h5>
                            <h2 class="banner-text2">Bộ Sưu Tập<span>Ly Giữ Nhiệt</span></h2>
                            <a href="<?= BASE_URL . '?act=all-san-pham'?>" class="btn btn-text">Shop Now</a>
                        </div>
                    </figure>
                </div>
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="<?= BASE_URL . '?act=all-san-pham'?>">
                            <img src="assets/img/slider/slider3.jpg" alt="product banner">
                        </a>
                        <div class="banner-content text-right">
                            <h5 class="banner-text1">Phúc Long</h5>
                            <h2 class="banner-text2">Bình Giữ Nhiệt<span>Special</span></h2>
                            <a href="<?= BASE_URL . '?act=all-san-pham'?>" class="btn btn-text">Shop Now</a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!-- banner statistics area end -->







</main>
<?php require_once 'layout/footer.php' ?>