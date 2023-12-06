<link rel="stylesheet" href="../view/css/cart.css">
<?php
$kq = '';
$stt = 0;
// foreach ($_SESSION['giohang'] as $index => $value) {
//     extract($value);
// }
foreach ($showls as $value) {
    extract($value);
    $stt++;
    $confirmationLinkId = 'confirmationLink_' . $idbill;

    $kq .= ' <tr>
        <td>' . $stt . '</td>
        <td>#RS' . $idbill . '</td>
        <td>' . $ten . '</td>
      
        <td><img src="../' . $hinh . '" width=100></td>
        <td>' . $gia . '</td>
        <td>' . $size . '</td>
        <td>' . $sl . '</td>
        <td><a href="#" id="' . $confirmationLinkId . '">Xác nhận</a></td>        
<td><a href="../index.php?pg=sanphamchitiet&id=' . $idpro . '">Xem chi tiết sản phẩm</a></td>
        
        

        
        
    </tr>';
}

?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all elements with the class "confirmationLink"
    var confirmationLinks = document.querySelectorAll('[id^="confirmationLink_"]');

    // Add a click event listener to each link
    confirmationLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the default behavior (navigating to the href)
            link.textContent =
                'Đã xác nhận'; // Change the text content to "Đã xác nhận"
        });
    });
});
</script>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the link element
        var confirmationLink = document.getElementById('confirmationLink');

        // Add a click event listener
        confirmationLink.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the default behavior (navigating to the href)

            // Change the text content to "Đã xác nhận"
            confirmationLink.textContent = 'Đã xác nhận';
        });
    });
</script> -->
