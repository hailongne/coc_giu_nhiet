<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }

    .main-content {
        display: flex;
        justify-content: space-between;
        align-items: stretch;
        width: 100%;
        max-width: 1200px;
        margin: 50px auto;
        background-color: #fff;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .left-section,
    .right-section {
        flex: 1;
        padding: 40px;
    }

    .divider {
        width: 1px;
        background-color: #ccc;
    }

    .signup-section {
        max-width: 400px;
        margin: 0 auto;
    }

    .signup-section form {
        margin-top: 20px;
    }

    .signup-section .form-group {
        margin-bottom: 15px;
    }

    .signup-section button {
        width: 100%;
        padding: 10px;
        font-size: 16px;
    }

    .signup-section a {
        display: inline-block;
        margin-top: 10px;
        color: #007bff;
        text-decoration: none;
    }

    .signup-section a:hover {
        text-decoration: underline;
    }

    .right-section {
        text-align: center;
    }

    .right-section h2 {
        margin-bottom: 20px;
    }

    .right-section p {
        margin-bottom: 30px;
    }

    .right-section button {
        padding: 10px 20px;
        font-size: 16px;
    }
    </style>
</head>

<div class="main-content">
    <section class="left-section">
        <div class="container">
            <div class="signup-section">
                <h2>Đăng Ký</h2>
                <form action="<?= BASE_URL . '?act=dang-ky-tai-khoan' ?>" method="POST">
                    <div class="form-group">
                        <label>Họ Tên:</label>
                        <input type="text" class="form-control" name="ho_ten" placeholder="Nhập Họ Tên">
                        <?php if (isset($_SESSION['errors']['ho_ten'])) {?>
                        <p class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></p>
                        <?php } ?>

                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập Email">
                        <?php if (isset($_SESSION['errors']['email'])) {?>
                        <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                        <?php } ?>
                    </div>



                    <div class="form-group">
                        <label>Số điện thoại:</label>
                        <input type="text" class="form-control" name="so_dien_thoai" placeholder="Nhập Số Điện Thoại">
                        <?php if (isset($_SESSION['errors']['so_dien_thoai'])) {?>
                        <p class="text-danger"><?= $_SESSION['errors']['so_dien_thoai'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Mật khẩu:</label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập Mật Khẩu">
                        <?php if (isset($_SESSION['errors']['password'])) {?>
                        <p class="text-danger"><?= $_SESSION['errors']['password'] ?></p>
                        <?php } ?>
                    </div>

                    <button type="submit" class="btn btn-info">Đăng ký</button>
                </form>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <section class="right-section">
        <h2>Đăng Ký</h2>
        <p>Đăng ký trang web này cho phép bạn truy cập trạng thái và lịch sử đơn hàng của mình. Chỉ cần điền vào các
            trường bên dưới và chúng tôi sẽ thiết lập tài khoản mới cho bạn ngay lập tức. Chúng tôi sẽ chỉ yêu cầu bạn
            những thông tin cần thiết để giúp quá trình mua hàng nhanh hơn và dễ dàng hơn.</p>
        <a href=" <?= BASE_URL . '?act=dang-nhap-tai-khoan' ?>"><button class=" btn btn-info">Đăng Nhập</button></a>

    </section>
</div>