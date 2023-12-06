<link rel="stylesheet" href="view/css/form.css">
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
    integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
</script>
<br>

<?php
 
 $email = $_GET["email"];
 $reset_token = $_GET["reset_token"];
  
 $connection = mysqli_connect("localhost", "root", "", "dataduan1");
 
 if (!$connection) {
     die("Lỗi kết nối: " . mysqli_connect_error());
 }
 
 $sql = "SELECT * FROM user WHERE email = '$email'";
 $result = mysqli_query($connection, $sql);
 
 if (!$result || mysqli_num_rows($result) === 0) {
     echo '<link rel="stylesheet" href="../view/css/tb.css">
         <div class="centered-content">
             <div class="notification">
                 <h2>Email không tồn tại</h2>
                 <p>Xin vui lòng kiểm tra lại địa chỉ email hoặc đăng ký tài khoản mới.</p>
                 <a class="loiform" href="../index.php?pg=forgot">Quay lại</a>
             </div>
         </div>';
    } else {
     $user = mysqli_fetch_object($result);
     if ($user && $user->reset_token == $reset_token) {
         ?>
         <div class="form_lo">
            <p class="dk">ĐỔI MẬT KHẨU</p>
                    <form method="post" action="dao/new_password.php">
                        <div class="form_full">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">
                            <div>
                                <label for="password">Mật khẩu mới</label>
                                <input type="password" name="new_password" placeholder="Nhập mật khẩu mới">
                                <div id="erremail"></div>
                            </div>
                            <div>
                                <label for="password_confirmation">Nhập lại mật khẩu mới</label>
                                <input type="password" id="password_confirmation" name="new_password" placeholder="Nhập lại mật khẩu mới">
                            </div>
                            <div class="form_sm">
                                <input type="submit" name="" value="LƯU">
                            </div>
                        </div>
                    </form>
                </div>
         </div>
         <?php
     } else {
         echo '<link rel="stylesheet" href="../view/css/tb.css">
             <div class="centered-content">
                 <div class="error-message">
                     <p>Không thể gửi tin nhắn. Lỗi Mailer: <span class="error-info"></span></p>
                     <a class="trangchu" href="../index.php?pg=forgot">Quay lại</a>
                 </div>
             </div>';
     }
 }
 
 mysqli_close($connection);
 
    
