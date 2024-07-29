<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Example</title>
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #f8f8f8;
        padding: 10px 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .logo img {
        height: 50px;
    }

    .menu {
        list-style: none;
        display: flex;
        margin: 0;
        padding: 0;
    }

    .menu li {
        margin: 0 15px;
    }

    .menu a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
    }

    .menu a:hover {
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

    .icons a:hover {
        color: #007BFF;
    }

    .icons a img {
        height: 24px;
    }

    .search {
        margin-left: 20px;
    }

    .search input {
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    </style>
</head>

<body>

    <header class="header">
        <div class="logo">
            <a href="#"><img src="logo.png" alt="Logo"></a>
        </div>
        <nav>
            <ul class="menu">
                <li><a href="#">Cốc giữ nhiệt</a></li>
                <li><a href="#">Bình giữ nhiệt</a></li>
            </ul>
        </nav>
        <div class="icons">
            <a href="#"><img src="register_icon.png" alt="Đăng ký/Đăng nhập"></a>
            <a href="#"><img src="cart_icon.png" alt="Giỏ hàng"></a>
            <div class="search">
                <input type="text" placeholder="Tìm kiếm...">
            </div>
        </div>
    </header>

</body>

</html>