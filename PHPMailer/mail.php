<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $messageContent = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // Cấu hình SMTP và thông tin xác thực
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'datkim2k4@gmail.com';
        $mail->Password   = 'xefk ndmn wdts iuna';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Thiết lập người gửi và người nhận
        $mail->setFrom('kimdat7000@gmail.com', 'NGUYEN KIM DAT');
        $mail->addAddress('datkim2k4@gmail.com', 'ADMIN');

        // Thiết lập nội dung email
        $mail->isHTML(true);
        $mail->Subject = 'CONTACT';
        $mail->Body    = 'Người gửi: ' . $name . '<br>Email: ' . $email . '<br><br>' . $messageContent;
        $mail->AltBody = 'Người gửi: ' . $name . '\nEmail: ' . $email . '\n\n' . $messageContent;

        // Gửi email
        $mail->send();
        // Hiển thị thông báo khi gửi thành công
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
        // Hiển thị thông báo lỗi khi gửi thất bại
        echo '<link rel="stylesheet" href="../view/css/tb.css">
            <div class="centered-content">
                <div class="error-message">
                    <p>Không thể gửi tin nhắn. Lỗi Mailer: <span class="error-info">' . $mail->ErrorInfo . '</span></p>
                    <a class="trangchu" href="../index.php?pg=forgot">Quay lại</a>
                </div>
            </div>';
    }
}
?>
