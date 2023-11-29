<link rel="stylesheet" href="view/css/form.css">
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
    integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
</script>
<br>
<div class="form_lo">
    <p class="dk">ĐĂNG NHẬP</p>
    <form action="index.php?pg=login" method="post" onsubmit="return validateForm()">
        <div class="form_full">
            <div>
                <label for="">Số điện thoại</label>
                <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại">
                <div id="errPhone"></div>
            </div>
            <div class="fo1">
                <label for="">Mật khẩu</label>
                <div class="password-field">
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" style="background-image:url('layout/img/eye-off-icon.png');">
                    <span class="toggle-password" onclick="togglePasswordVisibility()"></span>
                </div>
                <div id="errPass"></div>
            </div>

            <div class="form_sm">
                <input type="submit" name="dangnhap" value="ĐĂNG NHẬP">
                <?php 
               if(isset($tb)&&($tb!="")){
                echo '<h3 style="color:red;">'.$tb.'</h3>';
                } ?>
                <div class="dnn">
                    <a href="index.php?pg=dangky">Bạn đã có tài khoản? Đăng ký ngay</a>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
function validateForm() {
    var phone = document.getElementById("phone").value;
    var password = document.getElementById("password").value;

    var phoneRegex = /0\d{9}$/;
    if (phone === "") {
        document.getElementById("errPhone").innerHTML = "Vui lòng nhập số điện thoại của bạn";
        return false;
    } else if (!phone.match(phoneRegex)) {
        document.getElementById("errPhone").innerHTML = "Số điện thoại không hợp lệ";
        return false;
    }


    if (password === "") {
        document.getElementById("errPass").innerHTML = "Vui lòng nhập password của bạn";
        return false;
    }


    return true;
}

function togglePasswordVisibility() {
  var matKhauInput = document.getElementById("password");
  var toggleButton = document.querySelector(".toggle-password");

  if (matKhauInput.type == "password") {
    matKhauInput.type = "text";
    toggleButton.style.backgroundImage = "url('layout/img/eye-off-icon.png')";
  } else {
    matKhauInput.type = "password";
    toggleButton.style.backgroundImage = "url('layout/img/eye-icon.png')";
  }
}


</script>



