<link rel="stylesheet" href="view/form.css">
<br>
<div class="form_lo">
    <p class="dk">ĐĂNG KÝ</p>
    <form action="index.php?pg=adduser" method="post">
        <div class="form_full">
            <div>
                <label for="">Họ tên</label>
                <input type="text" id="ten" name="ten" placeholder="Họ tên">
            </div>
            <div class="fo1">
                <label for="">Tên đăng nhập</label>
                <input type="text" id="username" name="username" placeholder="Tên đăng nhập">
            </div>
            <div class="fo1">
                <label for="">Số điện thoại</label>
                <input type="text" id="phone" name="phone" placeholder="Số điện thoại">
            </div>
            <div class="fo1">
                <label for="">Mật khẩu</label>
                <input type="text" id="password" name="password" placeholder="Mật khẩu">
            </div>
            <div class="fo1">
                <label for="">Nhập lại mật khẩu</label>
                <input type="text" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu">
            </div>
            <div class="form_sm">
                <input type="submit" name="dangky" value="ĐĂNG KÝ" >
                <div class="dnn">
                    <a href="index.php?pg=dangnhap">Bạn đã có tài khoản? Đăng nhập ngay</a>
                </div>
            </div>
        </div>
    </form>
</div>
