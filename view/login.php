<link rel="stylesheet" href="view/form.css">
<br>
<div class="form_lo">
    <p class="dk">ĐĂNG NHẬP</p>
    <form action="index.php?pg=login" method="post">
        <div class="form_full">
            <div>
                <label for="">Tên đăng nhập</label>
                <input type="text" id="username" name="username" placeholder="Tên đăng nhập">
            </div>
            <div class="fo1">
                <label for="">Mật khẩu</label>
                <input type="text" id="password" name="password" placeholder="Mật khẩu">
            </div>

            <div class="form_sm">
                <input type="submit" name="dangnhap" value="ĐĂNG NHẬP">
                <div class="dnn">
                    <a href="index.php?pg=dangky">Bạn đã có tài khoản? Đăng ký ngay</a>
                </div>
            </div> 
        </div>
    </form>
</div>
