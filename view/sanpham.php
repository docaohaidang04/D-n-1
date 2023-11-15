<?php
$html_dm = showdm($dsdm);
/* $html_dm = '';
foreach ($dsdm as $dm) {
    extract($dm);
    $link = 'index.php?pg=sanpham&iddm=' . $id;
    $html_dm .= '<a href="' . $link . '">' . $ten . '</a>';
} */
$html_dssp = showsp($dssp);
/* foreach ($dssp as $sp) {
    extract($sp);
    if ($bestseller == 1) {
        $best = '<div class="best"></div>';
    } else {
        $best = '';
    }
    $html_dssp .= '<div class="boxsp mr15">
                        ' . $best . '                                           
                        <img src="playout/images/' . $hinh . '" alt="">
                        <p>' . $ten . '</p>
                        <span class="price">' . $gia . '  đ</span>
                        <button>Đặt hàng</button>
                        </div>';
    if ($titlepage != "") $title = $titlepage;
    else $title = "SẢN PHẨM";
} */
?>
<div class="containerfull">
    <img src="playout/images/banner1.png" alt="">

</div>
<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h2>DANH MỤC</h2><br><br>
            <?= $html_dm; ?>
        </div>
        <div class="boxright">
            <h2>SẢN PHẨM</h2><br>
            <div class="containerfull mr30">
                <?= $html_dssp; ?>
            </div>
        </div>
    </div>
</section>