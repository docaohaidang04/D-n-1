<?php
 
$email = $_POST["email"];
$reset_token = $_POST["reset_token"];
$new_password = $_POST["new_password"];
 
$connection = mysqli_connect("localhost", "root", "", "dataduan1");
 
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0)
{
    $user = mysqli_fetch_object($result);
    if ($user->reset_token == $reset_token)
    {
        $sql = "UPDATE user SET password='$new_password' WHERE email='$email' AND reset_token='$reset_token'";
        mysqli_query($connection, $sql);
 
        echo '<link rel="stylesheet" href="../view/css/tb.css">
                <div class="centered-content">
                    <img src="../layout/img/Flat_tick_icon.svg.png" alt="" width="250px">
                    <div class="thankyou">
                        <h1>Mật khẩu đã được thay đổi!</h1>
                    </div>
                    <div class="message">
                        <p>Vui lòng đăng nhập lại vào tài khoản của bạn</p>
                    </div>
                    <a class="trangchu" href="../index.php?pg=dangnhap">Đăng nhập</a>      
                </div>';
    }
    else
    {
        echo '<link rel="stylesheet" href="../view/css/tb.css">
            <div class="centered-content">
                <div class="expired-message">
                    <p>Email khôi phục đã hết hạn.</p>
                    <a class="trangchu" href="../index.php?pg=forgot">Quay lại</a>
                </div>
            </div>';
    }
}
else
{
    echo '<link rel="stylesheet" href="../view/css/tb.css">
            <div class="centered-content">
                <div class="notification">
                    <h2>Email không tồn tại</h2>
                    <p>Xin vui lòng kiểm tra lại địa chỉ email hoặc đăng ký tài khoản mới.</p>
                    <a class="loiform" href="../index.php?pg=forgot">Quay lại</a>
                </div>
            </div>';
}
