<?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
        extract($_SESSION['s_user']);
    }
?>
<link rel="stylesheet" href="view/css/form.css">
<br>
<div class="form_lo">
    <p class="dk">THÔNG TIN TÀI KHOẢN</p>
    <form action="index.php?pg=updateuser" method="post">
        <div class="form_full">
            <div>
                <label for="">Họ tên</label>
                <input type="text" id="ten"  value="<?=$ten?>" name="ten" placeholder="Họ tên">
            </div>
            <div class="fo1">
                <label for="">Tên đăng nhập</label>
                <input type="text" id="username"  value="<?=$username?>" name="username"  placeholder="Tên đằng nhập">
            </div>
            <div class="fo1">
                <label for="">Số điện thoại</label>
                <input type="text" id="phone"  value="<?=$phone?>" name="phone" placeholder="Số điện thoại">
            </div>
            <div class="fo1">
                <label for="">Email</label>
                <input type="text" id="email"  value="<?=$email?>" name="email" placeholder="Email">
            </div>
            <div class="fo1">
                <label for="">Mật khẩu</label>
                <input type="text" id="password"  value="<?=$password?>" name="password" placeholder="Mật khẩu">
            </div>
        
            <div class="form_sm" style="padding-bottom:20px;">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="submit" name="capnhat" value="Cập nhật">
            </div>   
        </div>
    </form>
</div>
