<?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
        extract($_SESSION['s_user']);
        $userinfo=get_user($id_us);
        $_SESSION['s_user']=$userinfo;
        extract($userinfo);
    }
?>
<link rel="stylesheet" href="view/css/style.css">
<br>
<div class="form_tt">
    <p class="dk">THÔNG TIN TÀI KHOẢN CẬP NHẬT THÀNH CÔNG</p>
    <div class="form_tt">
    <div>
            <img src="<?=$hinh?>" width="100px" height="100px">
            
        </div>
        <div>
            <label for="">Họ tên: <?=$ten?></label>
            
        </div>
        <div class="fott1">
            <label for="">Tên đăng nhập:  <?=$username?></label>
           
        </div>
        <div class="fott1">
            <label for="">Số điện thoại:  <?=$phone?></label>
           
        </div>
        <div class="fott1">
            <label for="">Email:  <?=$email?></label>
           
        </div>

       
    </div>

</div>
