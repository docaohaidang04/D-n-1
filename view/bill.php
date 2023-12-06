<?php
foreach ($_SESSION['giohang'] as $index => $value) {
    extract($value);
}

if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
    extract($_SESSION['s_user']);
}
?>


<link rel="stylesheet" href="view/css/bill.css">
<div class="dh_top">
    <h2>ĐƠN HÀNG CỦA BẠN</h2>
    <div class="border">
        <div>
            <div class="ht">
                <a href="">1</a>
            </div>
            <p>GIỎ HÀNG</p>
        </div>

        <div>
            <div class="ht">
                <a href="">2</a>
            </div>
            <p>ĐẶT HÀNG</p>
        </div>

        <div>
            <div class="ht">
                <a href="">3</a>
            </div>
            <p>XÁC NHẬN</p>
        </div>
    </div>
</div>
<div class="donhang_bot">
    <!-- THÔNG TIN CHI TIET LEFT -->
    <div class="thongtin_left">
        <p>THÔNG TIN CHI TIẾT</p>

        <form action="index.php?pg=donhang" method="post">

            <p>THÔNG TIN NGƯỜI ĐẶT HÀNG</p>
            <?php
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                extract($_SESSION['s_user']);

            ?>
                <div>
                    <label for="tenNguoiDat">Tên người đặt</label>
                    <input type="text" name="ten" id="tenNguoiDat" value="<?= $ten ?>" placeholder="Nhập tên">
                </div>

                <div>
                    <label for="soDienThoai">SĐT</label>
                    <input type="text" name="phone" id="soDienThoai" value="<?= $phone ?>" placeholder="Số điện thoại">
                </div>

                <div>
                    <label for="diaChi">Địa chỉ giao hàng</label>
                    <input type="text" name="diachi" id="diaChi" placeholder="Nhập địa chỉ" value="<?= $diachi ?>">
                </div>

                <div>
                    <label for="Email">Email:</label>
                    <input type="text" name="email" id="email" placeholder="Nhập email" value="<?= $email ?>">
                </div>


                <div class="ttdathang">
                    <a id="showInfoLink" onclick="showttnh()">Thay đổi thông tin nhận hàng</a>
                </div>
            <?php
            } else {


            ?>
                <div>
                    <label for="tenNguoiDat">Tên người đặt</label>
                    <input type="text" name="ten" id="tenNguoiDat" value="" placeholder="Nhập tên">
                </div>

                <div>
                    <label for="soDienThoai">SĐT</label>
                    <input type="text" name="phone" id="soDienThoai" value="" placeholder="Số điện thoại">
                </div>

                <div>
                    <label for="diaChi">Địa chỉ giao hàng</label>
                    <input type="text" name="diachi" id="diaChi" placeholder="Nhập địa chỉ" value="">
                </div>

                <div>
                    <label for="Email">Email:</label>
                    <input type="text" name="email" id="email" placeholder="Nhập email" value="">
                </div>


                <div class="ttdathang">
                    <a id="showInfoLink" onclick="showttnh()">Thay đổi thông tin nhận hàng</a>
                </div>
            <?php
            }
            ?>
            <div class="ttdathang" id="ttdathang">
                <p>THÔNG TIN NGƯỜI NHẬN HÀNG</p>
                <div>
                    <label for="tenNguoiDat">Tên người nhận</label>
                    <input type="text" name="nguoinhan_ten" id="" placeholder="Nhập tên">
                </div>

                <div>
                    <label for="soDienThoai">SĐT</label>
                    <input type="text" name="nguoinhan_dienthoai" id="" placeholder="Số điện thoại">
                </div>

                <div>
                    <label for="diaChi">Địa chỉ giao hàng</label>
                    <input type="text" name="nguoinhan_diachi" id="" placeholder="Nhập địa chỉ">
                </div>

            </div>






    </div>


    <!-- THÔNG TIN CHI TIET RIGHT-->
    <div class="thongtin_right">
        <div class="thongtin_right_1">
            <p>THÔNG TIN ĐƠN HÀNG</p>
            <!--  vòng lặp để hiện thị hết đơn hàng chứ không hiển thị 1 đơn -->
            <?php
            foreach ($_SESSION['giohang'] as $index => $value) {
                extract($value);
            ?>
                <div class="thongtin_sp">
                    <img src="<?= $hinh_sp ?>" alt="" width="103.196px" height="79px">
                    <div class="thongtin_sp_1">
                        <p><?= $ten_sp ?></p>
                        <p><?= number_format(floatval($gia), 0, ",", ".") ?></p>

                        <div class="thongtin_sp_2">
                            <p>Số lượng:</p>
                            <p><?= $sl ?></p>
                            <p>Kích cỡ: <?= $size ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            <div class="thongtin_sp_2_voucher">
                <p>Voucher</p>
                <div>
                    <input type="text" name="" id="" placeholder="Nhập Voucher">
                    <input type="submit" value="Nhập">
                </div>
            </div>


            <form action="add_to_history.php" method="POST">
                <!-- Các input của form (tên, điện thoại, địa chỉ, ...) -->
                <!-- ... -->
                <button class="thongtin_sp_2_datdon" name="thanhtoan" type="submit">ĐẶT ĐƠN</button>
            </form>

        </div>
    </div>


</div>
</form>




<style>
    #ttdathang {
        display: none;
    }
</style>
<script>
    function showttnh() {
        var infoSection = document.getElementById("ttdathang");
        if (infoSection.style.display === "none" || infoSection.style.display === "") {
            infoSection.style.display = "block";
        } else {
            infoSection.style.display = "none";
        }
    }
</script>