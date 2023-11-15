<?php
if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
    extract($_SESSION['s_user']);
    $html_account = ' 
                    <a href="index.php?pg=myaccount" >' . $username . '</a>
                    <a href="index.php?pg=logout" >Thoát</a>';
} else {
    $html_account = '<link rel="stylesheet" href="layout/css/style.css">
                    <a href="index.php?pg=dangky">Đăng ký</a>
                    <a href="index.php?pg=dangnhap">Đăng nhập</a>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T1 SHOP</title>
    <link rel="stylesheet" href="layout/css/style.css">
</head>

<body>
    <div class="header">

        <div class="logo">

            Free Shipping on any order over $150 USD
            <a href="index.php?pg=home">
                <img src="../layout/img/logo.jpg" alt="logo"></a>



            <div class=" menu">
                <a href="index.php?pg=home">TRANG CHỦ</a></li>
                <a href="index.php?pg=sanpham">SẢN PHẨM</a></li>
                <a href="">DỊCH VỤ</a></li>
                <a href="">LIÊN HỆ</a></li>
                <br>
                <!-- <a href="">ACCESSORIES</a></li>
                <a href="">COLLECTIBLES</a></li>
                <a href="">COLLABORATION</a></li>
                <a href="">EVENT</a></li> -->
                <form action="index.php?pg=sanpham" method="post">
                    <input type=" text" name="kyw" id="" placeholder="Tìm kiếm">
                    <input type="submit" id="timkiem" name="timkiem" value="Tìm kiếm">
                </form>


                <div class="right">
                    <?= $html_account ?>

                </div>

            </div>






        </div>

    </div>