<?php
$dsdm = danhmuc_select_all();
$html_dssp_new = showsp($dssp_new);
/* foreach ($dssp_new as $sp) {
    extract($sp);
    if ($bestseller == 1) {
        $best = '<div class="best"></div>';
    } else {
        $best = '';
    }
    $html_dssp_new .= '<div class="box25 mr15">
                        ' . $best . '                                           
                        <img src="playout/images/' . $hinh . '" alt="">
                        <p>' . $ten . '</p>
                        <span class="price">' . $gia . '  đ</span>
                        <button>Đặt hàng</button>
                        </div>';
} */
$html_dssp_best = showsp($dssp_best);
/* foreach ($dssp_best as $sp) {
    extract($sp);
    $html_dssp_best .= '<div class="box25 mr15">  
                        <div class="best"></div>                                         
                        <img src="playout/images/' . $hinh . '" alt="">
                        <p>' . $ten . '</p>
                        <span class="price">' . $gia . '  đ</span>
                        <button>Đặt hàng</button>
                        </div>';
} */

/* $html_dssp_view = showsp($dssp_view); */
/* foreach ($dssp_view as $sp) {
    extract($sp);
    if ($bestseller == 1) {
        $best = '<div class="best"></div>';
    } else {
        $best = '';
    }
    $html_dssp_view .= '<div class="box25 mr15">
                        ' . $best . '                                           
                        <img src="playout/images/' . $hinh . '" alt="">
                        <p>' . $ten . '</p>
                        <span class="price">' . $gia . '  đ</span>
                        <button>Đặt hàng</button>
                        </div>';
} */
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

    <script src="js.js"></script>
    <section class="containerfull">
        <div class="container">
            <div class="danhmuc" id="dm"> <?= $html_dm; ?></div>

            <h1>SẢN PHẨM NỔI BẬT</h1><br><br>


            <div class="containerfull">
                <?= $html_dssp_best; ?>
                <!-- <div class="box25 mr15">
                    <div class="best"></div>
                    <img src="layout/img/sp1.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <div class="best"></div>
                    <img src="layout/img/sp2.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div> -->
            </div>
            <div class="containerfull mr30">
                <h1 style="text-align: center; font-family:Arial, Helvetica, sans-serif">ÁO</h1><br><br>
                <?= $html_dssp_new; ?>
                <!-- <div class="box25 mr15">
                    <img src="layout/img/sp1.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/img/sp2.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/img/sp3.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/img/sp4.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div> -->
            </div>
            <div class="containerfull mr30">
                <h1 style="text-align: center;font-family:Arial, Helvetica, sans-serif">QUẦN</h1><br><br>
                <!--  -->
            </div>


        </div>
    </section>
    <img src="layout/img/banner2.jpg" style="width: 100%; display:block;" alt="">


    <!-- <section class="containerfull bg1 padd50">
        <div class="container">
            <h1>Chuyện Nhà</h1>
            <div class="row">
                <h2>Coffeeholic</h2>
            </div>
            <div class="row">
                <div class="boxnews mr2pt">
                    <img src="layout/img/hinh2.webp" alt="">
                    <p>11/03/2022</p>
                    <p><a href="#">CÁCH NHẬN BIẾT HƯƠNG VỊ CÀ PHÊ</a></p>
                    <p>Cùng Arabica, Robusta cũng là loại cà phê nổi tiếng được sử dụng phổ biến ở Việt Nam và nhiều nước khác trên thế giới. Với nhiều đặc điểm riêng, không...</p>
                </div>
                <div class="boxnews mr2pt">
                    <img src="layout/img/hinh6.jpg" alt="">
                    <p>11/03/2022</p>
                    <p><a href="#">SIGNATURE - BIỂU TƯỢNG VĂN HOÁ CÀ PHÊ</a></p>
                    <p>Mới đây, các "tín đồ" cà phê đang bàn tán xôn xao về SIGNATURE - Biểu tượng văn hóa cà phê của The Coffee House đã quay trở lại.Một lời...</p>
                </div>
                <div class="boxnews mr2pt">
                    <img src="layout/img/hinh3.jpg" alt="">
                    <p>11/03/2022</p>
                    <p><a href="#">CÀ PHÊ SỮA ESPRESSO THE COFFEE HOUSE</a></p>
                    <p>Cà phê sữa Espresso là một lon cà phê sữa giải khát với hương vị cà phê đậm đà từ 100% cà phê Robusta cùng vị sữa béo nhẹ cho bạn một trải nghiệm...</p>
                </div>
            </div>
            <div class="row">
                <h2>Coffeeholic</h2>
            </div>
            <div class="row">
                <div class="boxnews mr2pt">
                    <img src="layout/img/hinh7.jpg" alt="">
                    <p>11/03/2022</p>
                    <p><a href="#">CÁCH NHẬN BIẾT HƯƠNG VỊ CÀ PHÊ</a></p>
                    <p>Cùng Arabica, Robusta cũng là loại cà phê nổi tiếng được sử dụng phổ biến ở Việt Nam và nhiều nước khác trên thế giới. Với nhiều đặc điểm riêng, không...</p>
                </div>
                <div class="boxnews mr2pt">
                    <img src="layout/img/hinh5.jpg" alt="">
                    <p>11/03/2022</p>
                    <p><a href="#">BỘ SƯU TẬP CẦU TOÀN KÈO THƠM: "VÍA"</a></p>
                    <p>Tết nay vẫn giống Tết xưa, không hề mai một nét văn hoá truyền thống mà còn thêm vào những hoạt động “xin vía” hiện đại, trẻ trung. Ví như...</p>
                </div>
                <div class="boxnews mr2pt">
                    <img src="layout/img/hinh4.jpg" alt="">
                    <p>11/03/2022</p>
                    <p><a href="#">“KHUẤY ĐỂ THẤY TRĂNG" - KHUẤY LÊN</a></p>
                    <p>Năm 2022 là năm đề cao sức khỏe tinh thần nên giới trẻ muốn tận hưởng một Trung thu với nhiều trải nghiệm mới mẻ, rôm rả cùng bạn bè...</p>
                </div>
            </div>

        </div>
    </section> -->