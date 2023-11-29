<?php
$kq = '';
$stt = 0;

foreach ($showbl as $value) {
    $stt++;
    extract($value);
    $kq .= '<tr>
    <td>' . $stt . '</td>
    <td>' . $tensp . '</td>
    <td>' . $sobinhluan . '</td>
    <td>' . $ngaymoi . '</td>
    <td>' . $ngaycu . '</td>
    <td><a href="admin.php?pg=chitietbinhluan&idpro=' . $idpro . '"><i class="fas fa-eye" style="color: #ff0000;"></i></a></td>
    </tr>';
}
?>



    <table border="1">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Số bình luận</th>
            <th>Ngày mới nhất</th>
            <th>Ngày cũ nhất</th>
            <th>Chức năng</th>
        </tr>
        <?php echo $kq; ?>
    </table>
</body>
</html>

