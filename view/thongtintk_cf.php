<?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
        extract($_SESSION['s_user']);
        $userinfo=get_user($id_us);
        $_SESSION['s_user']=$userinfo;
        extract($userinfo);
    }
?>
<link rel="stylesheet" href="view/css/form.css">
<br>
<div class="form_lo">
    <p class="dk">THÔNG TIN TÀI KHOẢN ĐÃ ĐƯỢC CẬP NHẬT</p>
    <div class="form_full">
        <div>
            <label for="">Họ tên</label>
            <?=$ten?>
        </div>
        <div class="fo1">
            <label for="">Tên đăng nhập</label>
            <?=$username?>
        </div>
        <div class="fo1">
            <label for="">Số điện thoại</label>
            <?=$phone?>
        </div>
        <div class="fo1">
            <label for="">Email</label>
            <?=$email?>
        </div>
        <div class="fo1">
            <label for="">Mật khẩu</label>
            <?=$password?>
        </div> 
    </div>

</div>