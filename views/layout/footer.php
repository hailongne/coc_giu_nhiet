<style>
.footer {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
}

.footer-logo {
    display: flex;
    text-decoration: none;
    margin-bottom: 20px;
}

.footer-logo img {
    margin: 0 10px;
}

.footer-logo img:first-child {
    width: 50px;
}

.footer-logo img:last-child {
    width: 150px;
}

.footer p {
    margin-bottom: 30px;
}

.footer h5 {
    color: #fff;
    margin-bottom: 15px;
}

.footer ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer ul li {
    color: #ddd;
    margin-bottom: 10px;
}

.footer ul li i {
    margin-right: 10px;
}

.footer a {
    color: #fff;
    text-decoration: none;
    display: flex;
    align-items: center;
}

.footer a:hover {
    color: #ccc;
}

.footer-bottom {
    background-color: #222;
    padding: 10px 0;
    text-align: center;
}

.footer-bottom p {
    margin: 0;
    color: #ddd;
}

.col-md-5.mt-5 {
    display: flex;
    flex-direction: column;
}
</style>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="<?= BASE_URL?>" class="footer-logo">
                    <img src="views/assets/logo/logo.png" width="50" alt="Logo">
                    <img src="views/assets/logo/logotext.png" width="150" alt="Logo">
                </a>
                <p>Công ty TNHH Cốc Giữ Nhiệt Phúc Long chuyên cung cấp các sản phẩm giữ nhiệt chất lượng cao.</p>
            </div>
            <div class="col-md-4 mt-5">
                <h5>Liên Hệ</h5>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> 13 Trịnh Văn bô - Xuân Phương <br> Nam Từ Liêm - Hà Nội
                    </li>
                    <li><i class="fas fa-phone"></i> 0369312858</li>
                    <li><i class="fas fa-envelope"></i> phuclong@gmail.com</li>
                </ul>
            </div>
            <div class="col-md-3 mt-5">
                <h5>Chính Sách</h5>
                <a href="<?= BASE_URL . '?act=chinh-sach-bao-mat' ?>">Chính Sách Bảo Mật</a>
                <a href="<?= BASE_URL . '?act=chinh-sach-thong-bao' ?>"> Chính Sách Thông Báo</a>
            </div>
            <div id="thankYouPopup" class=" col-md-5 mt-5">
                <h5>Cảm ơn bạn đã ghé thăm!</h5>
                <p>Chúng tôi rất vui khi bạn đã xem qua website của chúng tôi. Hy vọng bạn đã tìm thấy những thông
                    tin hữu ích.</p>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Cốc Giữ Nhiệt Phúc Long. All rights reserved.</p>
    </div>
</footer>