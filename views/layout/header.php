<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cốc Giữ Nhiệt Phúc Long</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <!-- Favicon.ico -->
    <link rel="icon" href="views/assets/logo/logo.png" type="image/x-icon">

    <!-- Favicon.png -->
    <link rel="icon" href="views/assets/logo/logo.png" type="image/png">

    <!-- Favicon.svg (nếu sử dụng SVG) -->
    <link rel="icon" href="views/assets/logo/logo.png" type="image/svg+xml">

    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        justify-content: center;
        align-items: center;
    }

    body>* {
        width: 100%;
        box-sizing: border-box;
    }

    .top-header {
        background-color: #000;
        color: #fff;
        font-size: 14px;
        padding: 5px 15px;
    }

    .top-header a {
        color: #fff;
        text-decoration: none;
        margin-left: 15px;
        position: relative;
    }

    .top-header a:not(:last-child)::after {
        content: '|';
        position: absolute;
        right: -10px;
        top: 50%;
        transform: translateY(-50%);
        color: #fff;
    }

    .top-header a:hover {
        color: #ccc;
    }

    .top-header .left-content {
        display: flex;
        align-items: center;
    }

    .top-header .left-content img {
        margin-right: 10px;
    }

    .top-header .right-content {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .top-header .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-nav .nav-item .nav-link {
        color: #fff;
        transition: color 0.3s;
    }

    .navbar-nav .nav-item .nav-link:hover {
        color: #ccc;
    }

    .header-main {
        background-color: #fff;
        padding: 20px 0;
        margin-bottom: 0;
    }

    .header-main .logo {
        display: flex;
        align-items: center;
        padding-left: 20px;
    }

    .header-main .logo a {
        display: flex;
        align-items: center;
    }

    .header-main .logo img {
        margin-left: 50px;
        width: 150px;
    }

    .header-main .user-actions {
        display: flex;
        align-items: center;
        margin-left: 45px;
    }

    .header-main .user-actions a {
        color: #000;
        text-decoration: none;
    }

    .header-main .user-actions a:hover {
        color: #555;
    }

    /* Product */

    .product-categories {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        background-color: #fff;
        margin: 20px 0;
    }

    .product-categories-header {
        border-bottom: 2px solid #555;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

    .product-categories-header h2 {
        margin: 0;
        font-size: 1.5rem;
        color: #000;
    }

    .product-categories-list ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .product-categories-list ul li {
        margin-bottom: 10px;
        margin-left: 150px;
    }

    .product-categories-list ul li a {
        text-decoration: none;
        color: #555;
        font-size: 1.2rem;
    }

    .product-categories-list ul li a:hover {
        text-decoration: underline;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-icon {
        cursor: pointer;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        top: 22px;
        left: 0;
        background-color: white;
        border: 1px solid #ccc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 1000;
    }

    .dropdown-menu a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: black;
        font-size: 15px;
        transition: font-size 0.3s ease;
    }

    .dropdown-menu a:hover {
        background-color: #f0f0f0;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }
    </style>
</head>

<body>

    <div class="top-header">
        <div class="container">
            <div class="left-content">
                <img src="views/assets/logo/logo.png" width="30" alt="Logo">
                <span>Cốc Giữ Nhiệt Phúc Long | Hà Nội - 0369312858</span>
            </div>
            <div class="right-content">
                <a href="https://www.facebook.com/hailong.07.01.2004/"><i class="fab fa-facebook-f"></i></a>
                <a href="#">Tài khoản</a>
                <a href="<?= BASE_URL . '?act=dang-ky-tai-khoan' ?>">LOGOUT</a>
                <a href="<?= BASE_URL_ADMIN ?>">ADMIN</a>
            </div>
        </div>
    </div>

    <header class="header-main">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="<?= BASE_URL?>"><img src="views/assets/logo/logotext.png" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-md-6">

                </div>

                <div class="col-md-3">
                    <div class="user-actions">
                        <div class="dropdown">
                            <div class="dropdown-icon" style="font-size: 20px; margin-right: 45px;">
                                <i class="fas fa-ellipsis-v "></i>
                                Sản
                                Phẩm
                            </div>
                            <div class="dropdown-menu">
                                <a href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>">Bình Giữ Nhiệt</a>
                                <a href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>">Ly Giữ Nhiệt</a>
                            </div>
                        </div>
                        <a href="<?= BASE_URL ?>" style="font-size: 25px; padding: 0 20px"><i
                                class="fas fa-user-tie"></i></a>
                        <a href="<?= BASE_URL . '?act=gio-hang' ?>" style="font-size: 25px; padding: 0 20px"><i
                                class="fas fa-shopping-cart"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>