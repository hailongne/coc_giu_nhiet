 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-dark">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="<?= BASE_URL ?>" class="nav-link"><i class="fas fa-store mr-1"></i> Website</a>
         </li>
     </ul>
     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <li class="nav-item">
             <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                 <i class="fas fa-expand-arrows-alt"></i>
             </a>
         </li>
         <li class="nav-item">
             <a href="<?= BASE_URL_ADMIN . '?act=logout-admin' ?>" class="nav-link" id="logout-link">
                 <i class="fas fa-sign-out-alt"></i>
             </a>
         </li>
     </ul>
 </nav>
 <!-- /.navbar -->
 <script>
document.getElementById('logout-link').addEventListener('click', function(event) {
    event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

    Swal.fire({
        title: 'Bạn có chắc chắn muốn đăng xuất?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Đăng xuất',
        cancelButtonText: 'Hủy bỏ',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Thực hiện hành động đăng xuất, ví dụ chuyển hướng đến trang đăng xuất
            window.location.href = '<?= BASE_URL_ADMIN . '?act=logout-admin' ?>';
        }
    });
});
 </script>