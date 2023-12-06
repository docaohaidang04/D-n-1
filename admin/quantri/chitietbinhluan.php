<?php
$kq = '';
$stt = 0;


if (isset($showctbl) && (is_array($showctbl) || is_object($showctbl))) {
    foreach ($showctbl as $value) {
        $stt++;
        extract($value);
        $kq .= '<tr>
        <td>' . $stt . '</td>
        <td>' . $tensp . '</td>
        <td>' . $noidung . '</td>
        <td>' . $ngaybinhluan . '</td>
        <td>' . $ten . '</td>
        <td>' . $email . '</td>
        <td><a href="admin.php?pg=chitietbinhluanxoa&id=' . $id . '"><i class="fas fa-trash-alt" style="color: #fa3605;"></i></a></td>
        </tr>';
    }
} else {
    echo "Không có dữ liệu để hiển thị.";
}

?>
</br>
<div style="margin-left:20px">
<a href="admin.php?pg=exit"><i class="fas fa-sign-out-alt fa-rotate-180" style="color: #ff1900;"></i> Quay lại</a>
</div class="content">
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Nội dung bình luận</th>
            <th>Ngày bình luận</th>
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Chức năng</th>
        </tr>
        <?php echo $kq; ?>
    </table>
    <style>
    .content{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    table{
        margin: 0 auto;
        width:100%;
    }
</style>
</body>
</html>
