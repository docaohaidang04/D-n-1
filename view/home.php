<?php
$dsdm = danhmuc_select_all();
$html_dssp_new = showsp($dssp_new);

$html_dssp_best = showsp($dssp_best);

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
            <?= $html_dssp_best; ?>
        </div>

        <div class="containerfull mr30">
            <h3 style="text-align: center; font-size:30px">ÁO</h3>
            <?= $html_dssp_new; ?>
        </div>

        <div class="containerfull mr30">
            <h3 style="text-align: center; font-size:25px">QUẦN</h3>
        </div>


    </div>
</section>
