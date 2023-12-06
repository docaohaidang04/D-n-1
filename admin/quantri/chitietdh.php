<link rel="stylesheet" href="view/css/cart.css">
<?php
$kq = '';
$stt = 0;
// foreach ($_SESSION['giohang'] as $index => $value) {
//     extract($value);
// }
foreach ($showls as $value) {
    extract($value);
    $stt++;
    $kq .= ' <tr>
        <td>' . $stt . '</td>
        <td>#RS' . $idbill . '</td>
        <td>' . $ten . '</td>
      
        <td><img src="' . $hinh . '" width=100></td>
        <td>' . $gia . '</td>
        <td>' . $size . '</td>
        <td>' . $sl . '</td>
        <td><a>Chờ xác nhận</a></td>
        <td><a href="index.php?pg=sanphamchitiet&id=' . $idpro . '">Xem chi tiết sản phẩm</a></td>
        
        

        
        
    </tr>';
}

?>


<div class="cart">
    <div class="cart_left">
        <p>Chi tiết đơn hàng</p>
        <table>
            <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Tên</th>
                <th>Hình</th>
                <!-- <th>Kích cỡ</th>
                <th>Số lượng</th> -->
                <th>Giá</th>
                <th>Size</th>
                <th>Số lượng</th>
                <th>Trạng thái</th>
                <th>Chi tiết</th>
            </tr>

            <?php echo $kq; ?>

        </table>

    </div>
</div>
