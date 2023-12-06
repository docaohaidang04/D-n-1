<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


$connection = mysqli_connect("localhost", "root", "", "dataduan1");

$email = $_POST["email"];

$reset_token = "";

$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    // Set $reset_token only if the email exists
    $reset_token = time() . md5($email);
} else {
    echo '<link rel="stylesheet" href="../view/css/tb.css">
            <div class="centered-content">
                <div class="notification">
                    <h2>Email không tồn tại</h2>
                    <p>Xin vui lòng kiểm tra lại địa chỉ email hoặc đăng ký tài khoản mới.</p>
                    <a class="loiform" href="../index.php?pg=forgot">Quay lại</a>
                </div>
            </div>';
            exit();
    // You might want to handle this scenario appropriately, perhaps redirecting the user or showing an error message.
}

$sql = "UPDATE user SET reset_token='$reset_token' WHERE email='$email'";
mysqli_query($connection, $sql);

$message = "<p style='font-family: Arial, sans-serif; color: #333;'>Please click the link below to reset your password:</p>";
$message .= "<a href='http://localhost:3000/index.php?pg=reset&email=$email&reset_token=$reset_token' style='display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;'>Reset password</a>";
$message .= "</a>";


//Create an instance; passing `true` enables exceptions
function send_mail($to, $subject, $message)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username = 'datkim2k4@gmail.com'; // Thay 'your_email@gmail.com' bằng email của bạn
    $mail->Password = 'xefk ndmn wdts iuna'; // Thay 'your_email_password' bằng mật khẩu email của bạn
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    $mail->setFrom('datkim2k4@gmail.com', 'ADMIN');
    //Recipients
    $mail->addAddress($to);

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();
    echo '<link rel="stylesheet" href="../view/css/tb.css">
            <div class="centered-content">
                <img src="../layout/img/messenger.png" alt="" width="300px">
                <div class="thankyou">
                    <h1>Cảm ơn!</h1>
                </div>
                <div class="message">
                    <p>Tin nhắn của bạn đã được gửi thành công</p>
                </div>
                <a class="trangchu" href="../index.php">Quay lại trang chủ</a>
            </div>';
    } catch (Exception $e) {
    echo '  <link rel="stylesheet" href="../view/css/tb.css">
                <div class="centered-content">
                    <div class="error-message">
                        <p>Không thể gửi tin nhắn. Lỗi Mailer: <span class="error-info"></span></p>
                        <a class="trangchu" href="../index.php?pg=forgot">Quay lại</a>
                    </div>
                </div>';
    }
}
send_mail($email, "Reset password", $message);
