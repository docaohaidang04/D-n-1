<?php
$html_dm = showdm($dsdm);
$html_dssp = showsp($dssp);
if ($titlepage != "") $title = $titlepage;
else $title = "SẢN PHẨM"
/* $html_tendm = tendm($danhmucshow); */

?>
<div class="containerfull">
    <img src="playout/images/banner1.png" alt="">
</div>
<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h2>DANH MỤC</h2><br><br>
            <div style="display: flex;" class="danhmucsp">
                <?= $html_dm; ?>
            </div>

        </div>
        <div class="boxright">
            <h2><?= $title; ?></h2><br>
            <div class="containerfull mr30">
                <?= $html_dssp; ?>

            </div>
        </div>
    </div>
</section>
