<?php
extract($spct);
$html_dssp_lienquan = showsp($splq);
$html_dsspnho = showspnho($spnho);

function showspnho($spnho)
{
    $html_dsspnho = '';

    foreach ($spnho as $sp) {
        extract($sp);
        $html_dsspnho .= '<img class="dsspnho-image" data-id="' . $id . '" data-hinh="' . $hinh . '" src="layout/img/' . $hinh . '" alt="">';
    }

    return $html_dsspnho;
}


$dssp = show_sp();
/*  */


?>


<div class="chitietsp">

    <div class="ctsp_top">
        <div class="sp_left">
            <div class="img_chitiet">
                <img id="mainImage" src="layout/img/<?= $hinh ?>" alt="">
            </div>
            <div class="chitiet_full">
                <!-- <img src="layout/img/ao1.jpg" alt="" onclick="slide(0)">
                    <img src="layout/img/ao2.jpg" alt="" onclick="slide(1)">
                    <img src="layout/img/ao3.jpg" alt="" onclick="slide(2)">
                    <img src="layout/img/ao1.jpg" alt="" onclick="slide(3)"> -->
                <?= $html_dsspnho ?>
            </div>
        </div>
        <div class="sp_right">
            <p class="tensp"><?= $ten ?></p>
            <p class="conhang">Còn hàng</p>
            <p class="gia"><?= $gia ?>đ</p>
            <!-- HTML -->
            <p class="kichco">Kích cỡ</p>
            <button class="bt" onclick="highlightButton(this, 'S')">S</button>
            <button class="bt" onclick="highlightButton(this, 'M')">M</button>
            <button class="bt" onclick="highlightButton(this, 'L')">L</button>
            <button class="bt" onclick="highlightButton(this, 'XL')">XL</button>
            <button class="bt" onclick="highlightButton(this, 'XXL')">XXL</button>


            <div class="sl">
                <p class="soluong">Số lượng</p>
                <div class="sl_sp">
                    <button id="giamSoLuong">-</button>
                    <span id="soLuongSanPham">1</span>
                    <button id="tangSoLuong">+</button>
                </div>
            </div>
            <button type="submit" class="muangay">MUA NGAY</button>
            <button type="submit" class="themgh">THÊM GIỎ HÀNG</button>
        </div>
    </div>

    <div class="ctsp_mota">
        <h2>MÔ TẢ SẢN PHẨM</h2>
        <p>
            <!-- ÁO THUN NAM - RISE - RETRO DENIM - FREEDOM
            Sản phẩm được lấy cảm hứng từ những năm thập niên 90 và được biến tấu lại theo phong cách trẻ trung và hiện
            đại của giới trẻ hiện nay. Đây chính là một sự kết hợp hoàn hảo của hơi thở cổ điển với xu thế hiện đại tạo
            nên một sản phẩm trendy.
            - Chất liệu 100% cotton nhập khẩu cao cấp 
            - Form Oversize thời thượng cùng kiểu chữ in trend nổi bật 
            - Điểm nhấn của chiếc áo chính là hiệu ứng in dập nổi vô cùng đặc biệt 
            - Đường may tỉ mỉ, chi tiết là yếu tố quan trọng để đảm bảo sản phẩm được ra mắt với phiên bản hoàn hảo và
            chất lượng nhất. 
            Thông số sản phẩm: 
            - Chất liệu: Cotton 
            - Size: 
            + L: 1m61 - 1m70 - 56kg - 65kg 
            + XL: 1m71 - 1m75, 66kg - 75kg 
            + 2XL: trên 1m75, 76kg - 85kg 
            - Màu sắc: Trắng - Đen - Kem 
            - Thương hiệu: RISESHOP 
            Chính sách sản phẩm: 
            - Hỗ trợ đổi trả sản phẩm trong 30 ngày 
            - Bảo hành lên đến 90 ngày. 
            - Được kiểm tra hàng trước khi thanh toán (đối với đơn online) 
            - Xuất xứ: Việt Nam  -->
            <?= $mota ?>

        </p>
    </div>


    <div class="ctsp_danhgia">
        <h2>ĐÁNH GIÁ</h2>
        <iframe></iframe>


    </div>


    <h1 style="text-align: center;font-family:Arial, Helvetica, sans-serif">SẢN PHẨM LIÊN QUAN</h1>
    <div class="containerfull mr10">
        <div class="splq"><?= $html_dssp_lienquan ?></div>

        <!-- <div class="box25 mr15">
                    <div class="best">

                    </div>
                </div> -->
    </div>



</div>
<script>
    const soLuongSanPhamElement = document.getElementById("soLuongSanPham");
    const tangSoLuongButton = document.getElementById("tangSoLuong");
    const giamSoLuongButton = document.getElementById("giamSoLuong");

    let soLuong = 0;

    function capNhatSoLuong() {
        soLuongSanPhamElement.textContent = soLuong;
    }

    tangSoLuongButton.addEventListener("click", function() {
        soLuong++;
        capNhatSoLuong();
    });

    giamSoLuongButton.addEventListener("click", function() {
        if (soLuong > 0) {
            soLuong--;
            capNhatSoLuong();
        }
    });



    // slider
    /*  var slider = document.querySelector(".imgslider");
     var arr = [
         "layout/img/<?= $hinh ?>",
         "layout/img/ao2.jpg",
         "layout/img/ao3.jpg",
         "layout/img/ao1.jpg"
     ];
     var idx = 0;

     function slide(index) {
         idx = index;
         slider.src = arr[idx];
     } */

    // button

    var lastClickedButton = null;

    function highlightButton(clickedButton, size) {
        // Loại bỏ lớp 'highlight' khỏi nút cuối cùng đã được nhấp
        if (lastClickedButton !== null) {
            lastClickedButton.classList.remove('highlight');
        }

        // Thêm lớp 'highlight' cho nút mới được nhấp
        clickedButton.classList.add('highlight');

        // Cập nhật nút cuối cùng được nhấp
        lastClickedButton = clickedButton;

        // Thực hiện các hành động bổ sung nếu cần dựa trên kích cỡ đã chọn (tùy chọn)
        console.log('Kích cỡ đã chọn:', size);
    }
</script>

<script>
    // Hàm JavaScript để thay đổi hình ảnh khi click vào
    function changeImage(id, hinh) {
        var imageElement = document.getElementById('mainImage');
        imageElement.src = 'layout/img/' + hinh;
    }
    var sanphams = document.querySelectorAll('.sanpham');
    sanphams.forEach(function(sanpham) {
        sanpham.addEventListener('click', function() {
            // Lấy id và hình của sản phẩm từ thuộc tính data
            var id = sanpham.dataset.id;
            var hinh = sanpham.dataset.hinh;
            changeImage(id, hinh);
        });
    });
    var dsspnhoImages = document.querySelectorAll('.dsspnho-image');

    dsspnhoImages.forEach(function(image) {
        image.addEventListener('click', function() {
            var id = image.dataset.id;
            var hinh = image.dataset.hinh;
            changeImage(id, hinh);
        });
    });
</script>

<script>
    var dsspnhoImages = document.querySelectorAll('.dsspnho-image');

    dsspnhoImages.forEach(function(image) {
        image.addEventListener('click', function() {
            var id = image.dataset.id;
            var hinh = image.dataset.hinh;
            changeImage(id, hinh);
            // Loại bỏ lớp 'selected' từ tất cả các hình ảnh khác
            dsspnhoImages.forEach(function(img) {
                img.classList.remove('selected');
            });

            // Thêm lớp 'selected' cho hình ảnh được click
            image.classList.add('selected');
        });
    });
</script>
<style>
    .highlight {
        background-color: rgb(33, 158, 211) !important;
    }
</style>
