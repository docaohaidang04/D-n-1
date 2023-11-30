<link rel="stylesheet" href="view/css/form.css">
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
    integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
</script>
<br>
<div class="form_lo">
    <p class="dk">QUÊN MẬT KHẨU</p>
    <form action="PHPMailer/mailer.php" method="post" onsubmit="return validateForm()">
        <div class="form_full">
            <div>
                <label for="">Nhập email</label>
                <input type="text" name="email" placeholder="Nhập email">
                <div id="erremail"></div>
            </div>

            <div class="form_sm">
                <input type="submit" name="guiemail" value="GỬI YÊU CẦU">
            </div>
        </div>
    </form>
</div>
    

