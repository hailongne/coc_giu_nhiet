<style>
.banner {
    position: relative;
    width: 100%;
    height: 50vh;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 0;
}

.background-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 1;
}

.background-image img {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transform: translate(-50%, -50%);
    filter: blur(5px);
}

.banner-content {
    position: relative;
    color: #fff;
    z-index: 2;
    text-align: center;
}

.banner-content img {
    max-width: 100px;
    height: auto;
}

.banner-content h1 {
    margin: 10px 0 0;
    font-size: 1.5rem;
    font-weight: bold;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
}
</style>
<div class="banner">

    <div class="background-image">
        <img src="https://i.pinimg.com/564x/91/a9/9b/91a99bf4477a4736f23c75e818d5b754.jpg" alt="" srcset="">
    </div>
    <div class="banner-content">
        <img src="views/assets/logo/logo.png" alt="Logo">
        <h1>Cốc Giữ Nhiệt Phúc Long</h1>
    </div>
</div>