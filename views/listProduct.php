<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Danh Sách Sản Phẩm</title>
    <link rel="stylesheet" href="view/css/style.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
    }

    .top-bar {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
        height: 20px;
    }

    .top-bar span {
        padding-top: 8px;
        float: left;
        font-size: 12px;
    }

    .header {
        background-color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 50px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .header img {
        max-width: 150px;
    }

    .nav-links {
        display: flex;
        list-style-type: none;
    }

    .nav-links li {
        margin: 0 15px;
    }

    .nav-links a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
        font-size: 16px;
    }

    .nav-links a:hover {
        color: #007BFF;
    }

    .icons {
        display: flex;
        align-items: center;
    }

    .icons a {
        margin-left: 20px;
        text-decoration: none;
        color: #333;
    }

    .icons i {
        font-size: 20px;
    }

    .product-list {
        padding: 50px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
    }

    .product {
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        text-align: center;
    }

    .product img {
        max-width: 100%;
        height: auto;
    }

    .product h3 {
        font-size: 18px;
        margin: 10px 0;
    }

    .product p {
        font-size: 16px;
        color: #333;
    }

    .btn-add {
        background-color: #007BFF;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
    }

    .btn-add:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>

    <div class="top-bar">
        <span>Số điện thoại: 0123456789 | Địa chỉ: 123 Đường ABC, Quận XYZ, TP.HCM</span>
    </div>

    <header class="header">
        <img src="view/upload/logo.png" alt="Logo Shop">
        <ul class="nav-links">
            <li><a href="#">Trang Chủ</a></li>
            <li><a href="#">Ly Giữ Nhiệt</a></li>
            <li><a href="#">Bình Giữ Nhiệt</a></li>
            <li><a href="#">Giới Thiệu</a></li>
            <li><a href="#">Liên Hệ</a></li>
        </ul>
        <div class="icons">
            <a href="#"><i class="fas fa-search"></i></a>
            <a href="#"><i class="fas fa-user"></i></a>
            <a href="#"><i class="fas fa-shopping-cart"></i></a>
        </div>
    </header>

    <div class="container">
        <h2>Danh Sách Sản Phẩm</h2>
        <div class="product-list">
            <?php foreach($listProduct as $product): ?>
            <div class="product">
                <h3><?php echo $product['ten_san_pham']; ?></h3>
                <p>Giá: <?php echo number_format($product['gia_san_pham'], 0, ',', '.'); ?> VNĐ</p>
                <button class="btn-add">Thêm vào giỏ</button>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>