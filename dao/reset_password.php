<?php
 
$email = $_GET["email"];
$reset_token = $_GET["reset_token"];
 
$connection = mysqli_connect("localhost", "root", "", "dataduan1");
 
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0)
{
    //
}
else
{
    echo '<div class="notification">
            <h2>Email không tồn tại</h2>
            <p>Xin vui lòng kiểm tra lại địa chỉ email hoặc đăng ký tài khoản mới.</p>
            <a class="loiform" href="../index.php?pg=forgot">Quay lại</a>
        </div>';
}
$user = mysqli_fetch_object($result);
if ($user->reset_token == $reset_token)
{
    //
}
else
{
    echo '<link rel="stylesheet" href="../view/css/tb.css">
        <div class="expired-message">
            <p>Email khôi phục đã hết hạn.</p>
            <a class="loiform" href="../index.php?pg=forgot">Quay lại</a>
        </div>';
}
if ($user->reset_token == $reset_token)
{
    ?>
    <form method="POST" action="new_password.php">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">
         
        <input type="password" name="new_password" placeholder="Enter new password">
        <input type="submit" value="Change password">
    </form>
    <?php
}
else
{
    echo '<link rel="stylesheet" href="../view/css/tb.css">
        <div class="expired-message">
            <p>Email khôi phục đã hết hạn.</p>
            <a class="loiform" href="../index.php?pg=forgot">Quay lại</a>
        </div>';
}
