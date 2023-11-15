<?php
$html_dm = showdm($dsdm);
extract($spct);

$html_dssp_lienquan = showsp($splq);
?>
<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h1>DANH MỤC</h1><br><br>
            <?= $html_dm; ?>
        </div>
        <div class="boxright">
            <h1>SẢN PHẨM CHI TIẾT</h1><br>
            <div class="containerfull mr10">
                <div class="col6 imgchitiet">

                    <img src="playout/images/<?= $hinh ?>" alt="">
                </div>
                <div class="col6 textchitiet">
                    <h2>
                        <?= $ten ?>
                    </h2>
                    <p class="price">
                        <?= $gia ?>đ
                    </p>
                    <button>Đặt hàng</button>
                </div>


            </div>
            <hr>
            <h1>SẢN PHẨM LIÊN QUAN</h1>
            <div class="containerfull mr10">
                <?= $html_dssp_lienquan ?>
                <!-- <div class="box25 mr15">
                    <div class="best">

                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>