<?php

?>
<div class="containerfull">
    <img src="playout/images/banner1.png" alt="">
    <div class="bgbanner">ĐĂNG KÝ THÀNH VIÊN</div>
</div>
<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h2>DÀNH CHO BẠN</h2><br><br>
            <a href="">Cập nhật thông tin tài khoản</a>
            <a href="">Lịch sử mua hàng</a>
            <a href="">Thoát hệ thống</a>
        </div>
        <div class="boxright">
            <h2>Đăng ký</h2><br>
            <div class="containerfull mr30">
                <form action="index.php?pg=adduser" method="post">
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Họ và tên</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Tên đăng nhập</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="username" placeholder="Tên đăng nhập..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Mật khẩu</label>
                        </div>
                        <div class="col-75">
                            <input type="password" id="fname" name="password" placeholder="Mật khẩu..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Xác nhận mật khẩu</label>
                        </div>
                        <div class="col-75">
                            <input type="password" id="fname" name="repassword" placeholder="Nhập lại mật khẩu..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Email</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="email" placeholder="Email..">

                        </div>
                        <br>
                        <div class="chuacotk"><a href="index.php?pg=dangnhap">Đã có tài khoản đăng nhập tại đây !</a>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <input type="submit" name="dangky" value="ĐĂNG KÝ" id="dangky">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>