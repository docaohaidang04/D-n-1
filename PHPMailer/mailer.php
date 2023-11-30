

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


$connection = mysqli_connect("localhost", "root", "", "dataduan1");

$email = $_POST["email"];

$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0)
{
    $reset_token = time() . md5($email);
}
else
{
    echo "Email does not exists";
}

$sql = "UPDATE user SET reset_token='$reset_token' WHERE email='$email'";
mysqli_query($connection, $sql);

$message = "<p>Please click the link below to reset your password</p>";
$message .= "<a href='http://localhost:3000/index.php?pg=reset&email=$email&reset_token=$reset_token'>";
$message .= "Reset password";
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
    echo 'Message has been sent';
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
send_mail($email, "Reset password", $message);
