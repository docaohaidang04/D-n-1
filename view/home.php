<?php
$dsdm = danhmuc_select_all();
/* $html_dssp_new = showsp($dssp_new); */
$html_dssp_noibat = showsp($dssp_noibat);
$html_dssp_giamgia = showsp($dssp_giamgia);
$html_dssp_nhieuluotmua = showspbc($dssp_nhieuluotmua);
/* $html_dssp_ao = showsp($dssp_ao);
$html_dssp_quan = showsp($dssp_quan);
$html_dssp_aokhoac = showsp($dssp_aokhoac); */
$html_dm = showdm($dsdm);
?>


<div class="banner">
    <img id="myImage" src="layout/img/banner.jpg" alt="">
    <img id="myImage" src="layout/img/banner4.jpg" alt="">
    <img id="myImage" src="layout/img/banner3.jpg" alt="">
</div>
<div class="buttons">
    <a href="#" onclick="changeImage(0)">O</a>
    <a href="#" onclick="changeImage(1)">O</a>
    <a href="#" onclick="changeImage(2)">O</a>
</div>
<script src="js.js"></script>
<section class="containerfull">
    <div class="container">
        <div class="danhmuc" id="dm"> <?= $html_dm; ?></div>

        <h1>SẢN PHẨM NỔI BẬT</h1><br><br>
        <div class="containerfull">
            <?= $html_dssp_noibat; ?>
        </div>

        <div class="containerfull mr30">
            <h3 style="text-align: center; font-size:30px">SẢN PHẨM ĐANG GIẢM GIÁ</h3>
            <?= $html_dssp_giamgia; ?>
        </div>

        <div class="containerfull mr30">
            <h3 style="text-align: center; font-size:25px">SẢN PHẨM BÁN CHẠY</h3>
            <?= $html_dssp_nhieuluotmua; ?>
        </div>
        <img width="100%" height="auto" src="layout/img/banner2.jpg" alt="">
        <div class="containerfull mr30">
            <!--  <h3 style="text-align: center; font-size:25px">QUẦN</h3> -->

        </div>

        <div class="containerfull mr30">
            <!-- <h3 style="text-align: center; font-size:25px">ÁO KHOÁC</h3> -->

        </div>


    </div>
</section>