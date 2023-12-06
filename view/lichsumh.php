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
        <td>#RS' . $id . '</td>
        <td>' . $ngaydat . '</td>
        <td><a>Chờ xác nhận</a></td>
        <td>' . $total . '</td>
        <td><a href="index.php?pg=chitietlichsu&id=' . $id . '"><i class="fas fa-eye" style="color: #ff0000;"></i></a></td>
        

        
        
    </tr>';
}

?>


<div class="cart">
    <div class="cart_left">
        <p>Lịch sử mua hàng</p>
        <table>
            <tr>
                <th>STT</th>
                <th>Đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <!-- <th>Kích cỡ</th>
                <th>Số lượng</th> -->
                <th>Tổng tiền</th>
                <th>Chức năng</th>
            </tr>

            <?php echo $kq; ?>

        </table>

    </div>
</div>
