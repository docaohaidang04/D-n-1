<?php
$kq = '';
$stt = 0;
foreach ($showb as $value) {
    extract($value);
    $stt++;

    $kq .= '<tr>
        <td>' . $stt . '</td>
        <td>' . $nguoidat_ten . '</td>
        <td>' . $nguoidat_dienthoai . '</td>
        <td>' . $nguoidat_diachi . '</td>
        <td>' . $nguoidat_email . '</td>
        <td>' . $total . '</td>
        <td>' . $ngaydat . '</td>
        <td><a href="admin.php?pg=chitietlichsu&id=' . $id . '"><i class="fas fa-eye" style="color: #ff0000;"></i></a></td>
    </tr>';
}

?>

<div style="text-align: center;" class="content">
    <div class="form-loai">
        <!-- Your form code here -->
    </div>

    <table border="1">
        <tr>
            <th>STT</th>
            <th>Người đặt</th>
            <th>SĐT người đặt</th>
            <th>Địa chỉ người đặt</th>
            <th>Email người đặt</th>
            <th>Tổng tiền</th>

            <th>Ngày đặt</th>
            <th>Chi tiết đơn hàng</th>
        </tr>

        <?php echo $kq; ?>
    </table>
</div>

<style>
    .content {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    table {
        margin: 0 auto;
        width: 90%;
    }
</style>
