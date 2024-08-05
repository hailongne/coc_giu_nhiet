<?php include './views/layout/header.php'; ?>
<?php include './views/layout/banner.php'; ?>
<style>
.title {
    border-bottom: 2px solid #555;

}

.product-card {
    position: relative;
    overflow: hidden;
    border: 1px solid #ddd;
    border-radius: 10px;
    transition: box-shadow 0.3s ease, transform 0.3s ease;
}

.product-card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transform: translateY(-5px);
}

.product-card .card-img-top {
    max-height: 350px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
}

.product-card-body {
    padding: 15px;
}

.product-card-title {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 10px;
    text-align: center;
}

.product-card-price-container {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1rem;
    font-weight: 500;
    margin-bottom: 15px;
}

.product-card-price {
    color: #aaa;
    text-decoration: line-through;
    margin-right: 10px;
    font-size: 0.9rem;
}

.product-card-discount-price {
    color: #e74c3c;
    font-size: 1.2rem;
}

.product-card-footer {
    padding: 10px 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.btn {
    border-radius: 5px;
    text-decoration: none;
    font-size: 0.875rem;
    padding: 8px 15px;
    font-weight: 600;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-buy {
    background-color: #7f8c8d;
    color: white;
}

.btn-buy:hover {
    background-color: #95a5a6;
}

.btn-info {
    background-color: #2ecc71;
    color: white;
}

.btn-info:hover {
    background-color: #27ae60;
}

@media (max-width: 768px) {
    .product-card-body {
        padding: 10px;
    }

    .product-card-title {
        font-size: 1rem;
    }

    .product-card-price-container {
        font-size: 0.875rem;
    }
}
</style>

<body>
    <main class="container mt-5">
        <h1 class=" title mb-4">Sản Phẩm Mới Nhất</h1>
        <div class="row">
            <?php foreach ($listSanPham as $sanPham): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="product-card card h-100">
                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham='. $sanPham['id'] ?>"><img
                            class="card-img-top" src="<?= $sanPham['hinh_anh'] ?>"
                            alt="<?= $sanPham['ten_san_pham'] ?>"></a>
                    <div class="product-card-body card-body">
                        <h4 class="product-card-title card-title"><?= $sanPham['ten_san_pham'] ?></h4>
                        <div class="product-card-price-container">
                            <p class="product-card-price"><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?>₫
                            </p>
                            <p class="product-card-discount-price">
                                <?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?>₫</p>
                        </div>
                    </div>
                    <div class="product-card-footer card-footer">
                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham='. $sanPham['id'] ?>"
                            class="btn btn-info"><i class="fas fa-info-circle"></i> View</a>
                        <a href="<?= BASE_URL ?>" class="btn btn-buy"><i class="fas fa-shopping-cart"></i> Buy
                            Now</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </main>
</body>



<?php include './views/layout/footer.php'; ?>

</html>