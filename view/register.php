<link rel="stylesheet" href="view/css/form.css">
<br>
<div class="form_lo">
    <p class="dk">ĐĂNG KÝ</p>
    <form action="index.php?pg=adduser" method="post"  onsubmit="return validateForm()">
        <div class="form_full">
            <div>
                <label for="">Họ tên</label>
                <input type="text" id="ten" name="ten" placeholder="Họ tên">
                <div id="errTen"></div>
            </div>
            <div class="fo1">
                <label for="">Tên đăng nhập</label>
                <input type="text" id="username" name="username" placeholder="Tên đăng nhập">
                <div id="errU"></div>
            </div>
            <div class="fo1">
                <label for="">Số điện thoại</label>
                <input type="text" id="phone" name="phone" placeholder="Số điện thoại">
                <div id="errPhone"></div>
            </div>
            <div class="fo1">
                <label for="">Mật khẩu</label>
                <div class="password-field">
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
                    <span class="toggle-password" onclick="togglePasswordVisibility()"></span>
                </div>
                <div id="errPass"></div>
            </div>
            <div class="fo1">
                <label for="">Nhập lại mật khẩu</label>
                <div class="password-field">
                    <input type="password" id="password" name="password" placeholder="Nhập lại mật khẩu">
                    <span class="toggle-password" onclick="togglePasswordVisibility()"></span>
                </div>
                <div id="errRe"></div>
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
<script>
    function validateForm() {
        var ten = document.getElementById("ten").value;
        var username = document.getElementById("username").value;
        var phone = document.getElementById("phone").value;
        var password = document.getElementById("password").value;
        var repassword = document.getElementById("repassword").value;
     


        if (ten === "") {
            document.getElementById("errTen").innerHTML = "Vui lòng nhập tên của bạn";
            return false;
        }
        if (username === "") {
            document.getElementById("errU").innerHTML = "Vui lòng nhập tên đăng nhập của bạn";
            return false;
        }

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
        if (repassword==="") {
            document.getElementById("errRe").innerHTML = "Bạn chưa nhập lại mật khẩu";
            return false;
        }else if (password !== repassword) {
            document.getElementById("errRe").innerHTML = "Mật khẩu của bạn không khớp";
            return false;
        }

       


      

        return true;
    }
    function togglePasswordVisibility() {
        var matKhauInput = document.getElementById("password");
        var toggleButton = document.querySelector(".toggle-password");

        if (matKhauInput.type === "password") {
            matKhauInput.type = "text";
            toggleButton.style.backgroundImage = "url('layout/img/eye-off-icon.png')";
        } else {
            matKhauInput.type = "password";
            toggleButton.style.backgroundImage = "url('layout/img/eye-icon.png')";
        }
    }

</script>
<style>
.form_lo .form_full
 #errTen,
#errPass,
#errPhone,
#errU,
#errRe
{
    color: red;
}
</style>

