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
        <td>đang xử lý</td>
        <td>' . $total . '</td>
        <td>' . $ngaydat . '</td>
        <td><a href="admin.php?pg=udsp&id=' . $id . '"><i class="fas fa-edit" style="color: #ff2600;"></i></td>
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
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
            <th>Ngày đặt</th>
            <th>Chức năng</th>
        </tr>

        <?php echo $kq; ?>
    </table>
</div>