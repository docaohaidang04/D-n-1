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

        // Function to handle the click event
        function handleConfirmationClick(link) {
            var id = link.id.split('_')[1]; // Extract the bill ID from the link ID
            var confirmationLinkId = 'confirmationLink_' + id;
            var confirmationStatus = localStorage.getItem(confirmationLinkId);

            if (!confirmationStatus || confirmationStatus !== 'confirmed') {
                // If not confirmed, update the text content and set status to 'confirmed'
                link.textContent = 'Đã xác nhận';
                localStorage.setItem(confirmationLinkId, 'confirmed');
            }
        }

        // Loop through all confirmation links and add click event listeners
        confirmationLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                handleConfirmationClick(link);
            });
        });

        // Function to update links on page load based on stored confirmation status
        function updateLinksOnLoad() {
            confirmationLinks.forEach(function(link) {
                var id = link.id.split('_')[1];
                var confirmationLinkId = 'confirmationLink_' + id;
                var confirmationStatus = localStorage.getItem(confirmationLinkId);

                if (confirmationStatus === 'confirmed') {
                    link.textContent = 'Đã xác nhận';
                }
            });
        }

        // Call the function to update links on page load
        updateLinksOnLoad();
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
