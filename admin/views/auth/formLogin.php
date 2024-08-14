<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
    <!-- Favicon.ico -->
    <link rel="icon" href="views/assets/logo/logo.png" type="image/x-icon">

    <!-- Favicon.png -->
    <link rel="icon" href="views/assets/logo/logo.png" type="image/png">

    <!-- Favicon.svg (nếu sử dụng SVG) -->
    <link rel="icon" href="views/assets/logo/logo.png" type="image/svg+xml">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= BASE_URL ?>" class="h1">Cốc Giữ Nhiệt <br> Phúc Long</a>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['error'])) {?>
                <p class="text-danger login-box-msg"><?= $_SESSION['error'] ?></p>
                <?php } else {?>
                <p class="text-danger login-box-msg">Vui lòng đăng nhập tài khoản admin</p>
                <?php } ?>



                <form action="<?= BASE_URL_ADMIN . '?act=check-login-admin' ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">Quên mật khẩu</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="./assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./assets/dist/js/adminlte.min.js"></script>
</body>

</html>