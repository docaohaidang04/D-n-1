<?php
$kq = '';
$stt = 0;
foreach ($showus as $value) {
    $stt++;
    extract($value);
    $kt = '';
    if ($diem >= 8.5) {
        $kt = "Xuất sắc";
    } else if ($diem >= 7) {
        $kt = "Giỏi";
    } else if ($diem >= 5.5) {
        $kt = "Khá";
    } else if ($diem >= 4) {
        $kt = "Trung bình";
    } else {
        $kt = "Yếu";
    }
    $kq .= '<tr>

        <td>' . $stt . '</td>
        <td>' . $ten . '</td>
        <td>' . $ngaysinh . '</td>
        <td>' . $diem . '</td>
        <td>' . $kt . '</td>
         
        
        <td><a href="admin.php?pg=uduser&id=' . $id . '">Sửa</a> | <a href="admin.php?pg=userxoa&id=' . $id . '">Xóa</a></td>
    </tr>';
}
?>


<body>
    <div class="content">
        <div class="form-loai">
            <form name="userForm" action="admin.php?pg=userthem" method="post" onsubmit="return validateForm()">
                <div class="group">
                    <label for="">Họ tên: </label><br>
                    <input type="text" name="ten">
                </div>
                <div class="group">
                    <label for="">Điểm: </label><br>
                    <input type="text" name="diem">
                </div>
                <div class="group">
                    <label for="">Ngày sinh: </label><br>
                    <input type="date" name="ngaysinh">
                </div>

                <div class="group">
                    <!-- <label for="">Vai trò:</label>
                    <input type="radio" name="loai" value="0">0. Người dùng<br>
                    <input type="radio" name="loai" value="1">1. Admin<br> -->
                    <br>
                    <input type="submit" name="them_u" value="Thêm" class="btn">
                </div>
        </div>
        </form>
    </div>
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Ngày sinh</th>
            <th>Điểm</th>
            <th>Học lực</th>
            <th>Chức năng</th>
            <!-- <th>Mail</th>
            <th>Vai trò</th>
            <th>Chức năng</th> -->
        </tr>
        <?php echo $kq; ?>
    </table>
    </div>
</body>

</html>