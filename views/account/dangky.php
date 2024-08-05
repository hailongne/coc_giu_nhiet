<?php include './views/layout/header.php'; ?>
<style>
.main-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
    box-sizing: border-box;
    height: calc(100vh - 60px);
}

.main-content {
    margin: 100px auto;
    display: flex;
    width: 80%;
    max-width: 100%;
    height: 100%;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.left-section {
    flex: 1;
    padding: 20px;
    margin-right: 10px;
    border-right: 1px solid #999;
}

.right-section {
    margin: auto;
    text-align: center;
    flex: 1;
    padding: 20px;
}

.signup-section {
    flex: 1;
    padding: 20px;
}

h2 {
    margin-top: 0;
    font-size: 24px;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin: 10px 0 5px;
    font-weight: bold;
}

input {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

button {
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}
</style>

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

                    <button type="submit">Đăng ký</button>
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
<?php include './views/layout/footer.php'; ?>