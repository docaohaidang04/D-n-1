<?php
if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
    extract($_SESSION['s_user']);
}
?>
<div class="containerfull">
    <img src="layout/image/banner2.png" alt="">
    <div class="tukhoa"></div>
</div>
<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <div class='danhmuc'>
                <h2>DÀNH CHO BẠN</h2><br><br>
                <a href="">Thay đổi thông tin</a>
                <a href="">Lịch sử mua hàng</a>
                <a href="">Thoát hệ thống</a>
            </div>
        </div>
        <div class="boxright">
            <h2>THAY ĐỔI THÔNG TIN</h2><br>
            <form action="index.php?pg=updateuser" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="username">Tên đăng nhập:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="username" value="<?= $username ?>" name="username" placeholder="Tên đăng nhập">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="password">Mật khẩu:</label>
                    </div>
                    <div class="col-75">
                        <input type="password" id="password" value="<?= $password ?>" name="password" placeholder="Mật khẩu">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="email">Email:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="email" value="<?= $email ?>" name="email" placeholder="Nhập email">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="email">Địa chỉ</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="diachi" value="<?= $diachi ?>" name="diachi" placeholder="Nhập địa chỉ">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="phone">Phone:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="phone" value="<?= $phone ?>" name="phone" placeholder="Số điện thoại">
                    </div>
                </div>
                <div class="rowsubmit">
                    <input type="hidden" name="id_us" value="<?= $id_us ?>">
                    <input type="submit" name="capnhat" value="Cập nhật">
                </div>
            </form>

        </div>
    </div>
</section>