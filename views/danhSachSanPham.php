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
                                <li class="breadcrumb-item active" aria-current="page">Sản Phẩm</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">

                <!-- shop main wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="shop-product-wrapper mb-5">
                        <div>
                            <img src="assets/img/logoBrand/logo3.png" alt="logo" width="200px">
                        </div>
                    </div>
                    <!-- shop product top wrap start -->

                    <!-- product item list wrapper start -->
                    <div class="shop-product-wrap grid-view row mbn-30">
                        <?php foreach ($listSanPham as $key => $sanPham) : ?>

                        <!-- product single item start -->
                        <div class="col-md-4 col-sm-6">
                            <!-- product grid start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']?>">
                                        <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                        <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
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
                                    <div class="button-group">
                                        <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                        <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                                data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                                    class="pe-7s-search"></i></span></a>
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
                            <!-- product grid end -->
                        </div>
                        <!-- product single item start -->


                        <?php endforeach ?>
                    </div>
                    <!-- product item list wrapper end -->
                </div>
            </div>
            <!-- shop main wrapper end -->
        </div>
    </div>
    </div>
    <!-- page main wrapper end -->
</main>

<?php require_once 'layout/footer.php' ?>