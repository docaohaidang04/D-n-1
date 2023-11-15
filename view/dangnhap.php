<?php
?>
<link rel="stylesheet" href="layout/styledangnhap.css">
<div class="containerfull">
    <img class="banner" src="layout/img/banner1.png" alt="">
</div>
<section class="containerfull">
    <div class="container formthongtin">
        <div class="boxleft mr2pt menutrai">
            <h2>DÀNH CHO BẠN</h2><br><br>
            <a href="">Cập nhật thông tin</a>
            <a href="">Lịch sử mua hàng</a>
            <a href="">Thoát hệ thống</a>
        </div>
        <div class="boxright">
            <h2>Đăng nhập</h2><br>
            <div class="containerfull mr30">
                <h2>
                    <?php
                    if (isset($_SESSION['tb_dangnhap']) && ($_SESSION['tb_dangnhap'] != "")) {
                        echo $_SESSION['tb_dangnhap'];
                        unset($_SESSION['tb_dangnhap']);
                    }

                    ?>
                </h2>
                <form action="index.php?pg=login" method="post">
                    <div class="row">
                        <div class="col-25">

                            <label for="fname">Tên đăng nhập</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="username" placeholder="Tên đăng nhập...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Mật khẩu</label>
                        </div>
                        <div class="col-75">
                            <input type="password" id="fname" name="password" placeholder="Mật khẩu...">
                        </div>
                        <div class="chuacotk"><a href="index.php?pg=dangky">Bạn chưa có tài khoản?</a></div>
                    </div>
                    <br>
                    <div class="row">
                        <input type="submit" name="dangnhap" value="ĐĂNG NHẬP" id="dangky">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>