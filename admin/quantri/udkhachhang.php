<?php
$kq = '';
$stt = 0;
foreach ($showus as $value) {
    $stt++;
    extract($value);
    $kq .= '<tr>
        <td>' . $stt . '</td>
        <td>' . $username . '</td>
        <td>' . $phone . '</td>
        <td>' . $email . '</td>
        <td>' . $vaitro . '</td>
        <td><a href="admin.php?pg=uduser&id=' . $id_us . '"><i class="fas fa-edit" style="color: #ff2600;"></i></a></td>
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
            <form name="" action="admin.php?pg=capnhatus" method="post" onsubmit="return validateForm()">
                <div class="group">
                    <label for="">Tên: </label><br>
                    <input type="text" name="username" id="username" value="<?= $username ?>" readonly>
                </div>
                <div class="group">
                    <label for="">Số điện thoại: </label><br>
                    <input type="text" name="phone" id="phone" value="<?= $phone ?>" readonly>

                </div>
                <div class="group">
                    <label for="">Email: </label><br>
                    <input type="text" name="email" id="email" value="<?= $email ?>" readonly>

                </div>
                <div class="group">
                    <label for="">Vai trò:</label>
                    <input type="radio" name="vaitro" value="0" id="vaitro">0. Người dùng<br>
                    <input type="radio" name="vaitro" value="1" id="vaitro">1. Admin<br>
                    <div id="errVaitro"></div>
                    <br>

                    <input type="hidden" name="id" value="<?= $id ?>"><br>
                    <input type="submit" name="capnhat" value="Sửa" class="btn">

                </div>

            </form>
        </div>



        <table border="1">
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <!-- <th>Pass</th> -->
                <th>Phone</th>
                <th>Mail</th>
                <th>Vai trò</th>
                <th>Chức năng</th>
            </tr>
            <?php echo $kq; ?>
        </table>
    </div>
</body>

</html>

<script>
    function validateForm() {
        var vaitro = document.querySelector('input[name="vaitro"]:checked');


        if (vaitro === null) {
            document.getElementById("errVaitro").innerHTML = "Vui lòng chọn vai trò";
            return false;
        }

        return true;
    }
</script>