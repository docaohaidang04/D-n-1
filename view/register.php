<link rel="stylesheet" href="view/css/form.css">
<br>
<div class="form_lo">
    <p class="dk">ĐĂNG KÝ</p>
    <form action="index.php?pg=adduser" method="post"  onsubmit="return validateForm()">
        <div class="form_full">
            <div class="fo1">
                <label for="">Họ tên</label>
                <input type="text" id="ten" name="ten" placeholder="Họ tên">
                <div id="errTen"></div>
            </div>
            <div class="fo1">
                <label for="">Tên đăng nhập</label>
                <input type="text" id="username" name="username" placeholder="Tên đăng nhập ">
                <div id="errU"></div>
            </div>
            <div class="fo1">
                <label for="">Số điện thoại</label>
                <input type="text" id="phone" name="phone" placeholder="Số điện thoại" >
                <div id="errPhone"></div>
            </div>
            <div class="fo1">
                <label for="">Mật khẩu</label>
                <div class="password-field">
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">

                    <div class="toggle-password">
                        <svg xmlns="http://www.w3.org/2000/svg" class="eye eye-open" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" class="eye eye-close" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> 
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </div>
                </div>
                <div id="errPass"></div>
            </div>
            <div class="fo1">
                <label for="">Nhập lại mật khẩu</label>
                <div class="password-field">
                    <input type="password" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu">
                    
                    <div class="toggle-password">
                        <svg xmlns="http://www.w3.org/2000/svg" class="eye eye-open" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" class="eye eye-close" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> 
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </div>
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

    function validateForm() {
    // ... code for other validations
    if (repassword === "") {
        document.getElementById("errRe").innerHTML = "Bạn chưa nhập lại mật khẩu";
        return false;
    } else if (password !== repassword) {
        document.getElementById("errRe").innerHTML = "Mật khẩu của bạn không khớp";
        return false;
    }
    return true;
}



    document.getElementById("phone").addEventListener("input", function(event) {
        let inputValue = event.target.value;
        let numbers = /^[0-9]+$/;
        if (!inputValue.match(numbers)) {
            document.getElementById("errPhone").innerText = "Vui lòng nhập số điện thoại.";
            event.target.value = inputValue.slice(0, -1); // Xóa ký tự không phải số
        } else {
            document.getElementById("errPhone").innerText = "";
        }
    });

    const togglePassword = document.querySelectorAll(".eye");
    let activeClassName = "is-active";
    togglePassword.forEach((item) => {
    item.addEventListener("click", handleTogglePassword);
    });
    function handleTogglePassword() {
    let inputType = "password";
    const input = this.parentNode?.previousElementSibling;
    if (this.matches(".eye-close")) {
        inputType = "text";
        const eyeOpen = this.previousElementSibling;
        eyeOpen && eyeOpen.classList.add(activeClassName);
    } else {
        inputType = "password";
        this.classList.remove(activeClassName);
    }
    input && input.setAttribute("type", inputType);
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

