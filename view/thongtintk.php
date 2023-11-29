<?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
        extract($_SESSION['s_user']);
    }
?>
<link rel="stylesheet" href="view/css/form.css">
<br>
<div class="form_lo">
    <p class="dk">THÔNG TIN TÀI KHOẢN</p>
    <form action="index.php?pg=updateuser" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="form_full">
            <div>
                <label for="">Họ tên</label>
                <input type="text" id="ten" value="<?=$ten?>" name="ten" placeholder="Họ tên">
            </div>
            <div class="fo1">
                <label for="">Hình ảnh:</label>
                <label for=""><img src="<?= $hinh; ?>" name="hinh" alt="" width="100px"></label>
                <input type="file" name="hinh" value="" id="hinh"> 
            </div>
            <div class="fo1">
                <label for="">Tên đăng nhập</label>
                <input type="text" id="username" value="<?=$username?>" name="username" placeholder="Tên đằng nhập">
            </div>
            <div class="fo1">
                <label for="">Số điện thoại</label>
                <input type="text" id="phone" value="<?=$phone?>" name="phone" placeholder="Số điện thoại">
                <div id="errPhone"></div>
            </div>
            <div class="fo1">
                <label for="">Email</label>
                <input type="text" id="email" value="<?=$email?>" name="email" placeholder="Email">
                <div id="errMail"></div>
            </div>
            <div class="fo1">
                <label for="">Mật khẩu</label>
                <input type="password" id="password" value="<?=$password?>" name="password" placeholder="Mật khẩu">
            </div>

            <div class="form_sm" style="padding-bottom:20px;">
            <input type="hidden" name="hinh" value="<?= $hinh ?>">
                <input type="hidden" name="id_us" value="<?=$id_us?>">
                <input type="submit" name="capnhat" value="Cập nhật">
            </div>
        </div>
    </form>
</div>
<script>
    function validateForm() {
        var phone = document.getElementById("phone").value;
        var email = document.getElementById("email").value;


        var phoneRegex = /0\d{9}$/;
        if (!phone.match(phoneRegex)) {
            document.getElementById("errPhone").innerHTML = "Số điện thoại không hợp lệ";
            return false;
        }


        var emailRegex = /^\S+@\S+\.\S+$/;
        if (!email.match(emailRegex)) {
            document.getElementById("errMail").innerHTML = "Email không hợp lệ";
            return false;
        }

        return true;
    }
</script>
<style>
.form_lo .form_full
#errMail,
#errPhone
{
    color: red;
}

</style>

