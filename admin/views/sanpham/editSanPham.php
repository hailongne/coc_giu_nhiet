<!-- header -->
<?php include './views/layout/header.php'; ?>
<!-- end header -->
<!-- Nav Bar -->
<?php include './views/layout/navbar.php'; ?>
<!-- end Nav Bar -->
<!-- slidebar -->
<?php include './views/layout/slidebar.php'; ?>
<!-- end slidebar -->
<style>
.dataTables_wrapper .dataTables_filter {
    float: right;
    text-align: right;
}

.dataTables_wrapper .dataTables_paginate {
    float: right;
    text-align: right;
}

.custom-file-input~.custom-file-label::after {
    content: "Browse";
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-11">
                    <h1>Sửa thông tin sản phẩm: <?= $sanPham['ten_san_pham']?>
                    </h1>
                </div>
                <div class="col-sm-1">
                    <a href="<?= BASE_URL_ADMIN . '?act=san-pham'?>" class="btn btn-secondary ">Quay Lại</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin sản phẩm: <?= $sanPham['ten_san_pham']?></h3>
                    </div>
                    <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham'?>" method="post"
                        enctype="multipart/form-data">
                        <div class="card-body row">
                            <div class="form-group col-12">
                                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                <label for="ten_san_pham">Tên Sản Phẩm</label>
                                <input type="text" id="ten_san_pham" class="form-control" name="ten_san_pham"
                                    value="<?= $sanPham['ten_san_pham'] ?>">
                                <?php if (isset($_SESSION['error']['ten_san_pham'])) {?>
                                <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                                <?php } ?>
                            </div>

                            <div class="form-group col-6">
                                <label for="gia_san_pham">Giá Sản Phẩm</label>
                                <input type="number" id="gia_san_pham" class="form-control" name="gia_san_pham"
                                    value="<?= $sanPham['gia_san_pham']?>">
                                <?php if (isset($_SESSION['error']['gia_san_pham'])) {?>
                                <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                                <?php } ?>
                            </div>


                            <div class="form-group col-6">
                                <label for="gia_khuyen_mai">Giá Khuyến Mãi</label>
                                <input type="number" id="gia_khuyen_mai" class="form-control" name="gia_khuyen_mai"
                                    value="<?= $sanPham['gia_khuyen_mai']?>">
                                <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) {?>
                                <p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
                                <?php } ?>
                            </div>

                            <div class="form-group col-12">
                                <label for="hinh_anh">Hình Ảnh</label>
                                <div class="custom-file">
                                    <input type="file" id="hinh_anh" class="custom-file-input" name="hinh_anh">
                                    <label class="custom-file-label" for="hinh_anh">Choose file</label>
                                </div>
                            </div>

                            <div class="form-group col-6">
                                <label for="so_luong">Số Lượng</label>
                                <input type="number" id="so_luong" class="form-control" name="so_luong"
                                    value="<?= $sanPham['so_luong'] ?>">
                                <?php if (isset($_SESSION['error']['so_luong'])) {?>
                                <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                                <?php } ?>
                            </div>

                            <div class="form-group col-6">
                                <label for="ngay_nhap">Ngày Nhập</label>
                                <input type="date" id="ngay_nhap" class="form-control " name="ngay_nhap"
                                    value="<?= $sanPham['ngay_nhap'] ?>">
                                <?php if (isset($_SESSION['error']['ngay_nhap'])) {?>
                                <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                                <?php } ?>
                            </div>

                            <div class="form-group col-6">
                                <label for="inputStatus">Danh Mục Sản Phẩm</label>
                                <select id="inputStatus" name="danh_muc_id" class="form-control custom-select">
                                    <?php foreach ($listDanhMuc as $danhMuc): ?>
                                    <option <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?>
                                        value="<?= $danhMuc['id']?>">
                                        <?= $danhMuc['ten_danh_muc']?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                                <?php if (isset($_SESSION['error']['danh_muc_id'])) {?>
                                <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                                <?php } ?>
                            </div>

                            <div class="form-group col-6">
                                <label for="trang_thai">Trạng Thái Sản Phẩm</label>
                                <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                                    <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn hàng
                                    </option>
                                    <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Hết hàng
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label for="mo_ta">Mô tả Sản Phẩm</label>
                                <textarea id="mo_ta" name="mo_ta" class="form-control"
                                    rows="4"><?= $sanPham['mo_ta']?></textarea>
                            </div>

                        </div>
                        <div class=" card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Album Ảnh Sản Phẩm</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>
                    <div class="card-body p-0">
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-album-anh-san-pham'?>" method="post"
                            enctype="multipart/form-data">
                            <div class="card-body" style="display: block">
                                <table id="faqs" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>File</th>
                                            <th>
                                                <div class="text-center">
                                                    <button onclick="addfaqs();" class="badge badge-success"
                                                        type="button">
                                                        <i class="fa fa-plus"></i> ADD NEW
                                                    </button>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                        <input type="hidden" id="id_delete" name="img_delete">
                                        <?php foreach ($listAnhSanPham as $key => $value): ?>
                                        <tr id="faqs-row-<?= $key ?>">
                                            <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
                                            <td><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>"
                                                    style="width: 50px; height: 50px" alt=""></td>
                                            <td><input type="file" name="img_array[]" class="form-control"></td>
                                            <td class="mt-10">
                                                <button class="badge badge-danger" type="button"
                                                    onclick="removeRow(<?= $key ?>,<?= $value['id'] ?>)">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary w-100">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
document.querySelectorAll('.custom-file-input').forEach(input => {
    input.addEventListener('change', function() {
        const fileName = this.files.length > 1 ? `${this.files.length} files selected` : this.files[0]
            .name;
        const label = this.nextElementSibling;
        label.classList.add('selected');
        label.innerText = fileName;
    });
});

var faqs_row = <?= count($listAnhSanPham); ?>;

function addfaqs() {
    html = '<tr id="faqs-row-' + faqs_row + '">';
    html +=
        '<td><img src="https://file.kenhsinhvien.vn/2015/03/29/1-1.jpg" style="width:50px; height:50px" alt=""></td>';
    html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
    html += '<td class="mt-10"><button class="badge badge-danger" type="button" onclick="removeRow(' + faqs_row +
        ',null)"><i class="fa fa-trash"></i> Delete</button></td>';
    html += '</tr>';
    $('#faqs tbody').append(html);
    faqs_row++;
}

function removeRow(rowId, imgId) {
    $('#faqs-row-' + rowId).remove();
    if (imgId !== null) {
        var imgDeleteInput = document.getElementById('img_delete');
        var currentValue = imgDeleteInput.value;
        imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
    }
}
</script>
<!-- /.content-wrapper -->
<!-- footer -->
<?php
include './views/layout/footer.php';
?>
<!-- end footer -->

</body>

</html>