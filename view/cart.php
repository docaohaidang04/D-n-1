    <link rel="stylesheet" href="view/css/cart.css">
    <?php
    session_start();
    $totalAmount = 0;
    $kq = '';
    $stt = 0;

    foreach ($_SESSION['giohang'] as $index => $value) {
        extract($value);
        $stt++;
        $tt = (float)$gia * (int)$sl;
        $totalAmount += $tt;
        $kq .= ' <tr>
    <td>' . $stt . '</td>
    <td><img src="' . $hinh_sp . '" alt="" width="70px;"></td>
    <td>' . $ten_sp . '</td>
    <td>' . number_format(floatval($gia), 0, ",", ".") . '</td>
    <td id="soluongTd' . $index . '">' . $sl . '</td>
    <td>' . number_format((float)$gia * (int)$sl, 0, ",", ".") . '</td>
    <td>
        <form method="post">
            <input type="hidden" name="xoa" value="' . $index . '">
            <button type="submit" class="btn"><i class="fas fa-trash-alt" style="color: #fa3605;"></i></button>
        </form>
    </td>
    </tr>';
    }
    ?>

    <div class="cart">
        <div class="cart_left">
            <p>GIỎ HÀNG</p>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Hình</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>

                <?php echo $kq; ?>

            </table>
            <a href="index.php?pg=sanpham">Tiếp tục mua hàng</a>
        </div>
        <div class="cart_right">
            <p>THANH TOÁN</p>
            <p>Voucher</p>
            <input class="vc" type="text" placeholder="Nhập voucher..."><button class="nhap">Nhập</button>
            <p>Tổng tiền: <?php echo number_format($totalAmount, 0, ",", "."); ?> đ</p>
            <form method="post" action="index.php?pg=thanhtoan">
                <button type="submit" class="tt" name="">THANH TOÁN</button>
            </form>
            <form method="post">
                <input type="hidden" name="xoatatca" value="1">
                <button type="submit" class="xoa">XÓA TẤT CẢ</button>
            </form>
        </div>
    </div>