<?php
$kq = '';
$stt = 0;
foreach ($showus as $value) {
    $stt++;
    extract($value);
    $kq .= '<tr>
        <td>' . $stt . '</td>
        <td>' . $ten . '</td>
        <td>' . $ngaysinh . '</td>
        <td>' . $diem . '</td>
       
        <td><a href="admin.php?pg=uduser&id_us=' . $id . '">Sửa</a> <a href="admin.php?pg=userxoa&id_us=' . $id . '">Xóa</a></td>
    </tr>';
}

if ((isset($_GET['id'])) && ($_GET['id'] > 0)) {
    $id = $_GET['id'];
    $uduser = get_user($id);
    extract($uduser);
}
?>


<body>
    <div class="content">
        <div class="form-loai">
            <form name="userForm" action="admin.php?pg=capnhatus" method="post" onsubmit="return validateForm()">
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
            <th>Pass</th>
            <th>diem</th>
            <th>Mail</th>
            <th>Vai trò</th>
            <th>Chức năng</th>
        </tr>
        <?php echo $kq; ?>
    </table>
    </div>
</body>

</html>