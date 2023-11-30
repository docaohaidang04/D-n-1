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
 
        echo "Password has been changed";
    }
    else
    {
        echo "Recovery email has been expired";
    }
}
else
{
    echo "Email does not exists";
}