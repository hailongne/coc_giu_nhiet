<div class="container">
    <h1>Giỏ Hàng</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Thành Tiền</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['cart'] as $item) : ?>
            <tr>
                <td><?= $item['ten_san_pham'] ?></td>
                <td><?= number_format($item['gia'], 0, ',', '.') ?>đ</td>
                <td><?= $item['so_luong'] ?></td>
                <td><?= number_format($item['gia'] * $item['so_luong'], 0, ',', '.') ?>đ</td>
                <td>
                    <button class="btn btn-info">Thanh Toán</button>
                    <button class="btn btn-danger">Xóa</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="text-right">
        <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="btn btn-success">Thanh Toán</a>
    </div>
</div>