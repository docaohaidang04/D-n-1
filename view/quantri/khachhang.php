<?php
$kq = '';
$stt = 0;
foreach ($showus as $value) {
    $stt++;
    extract($value);
    $kq .= '<tr>
        <td>' . $stt . '</td>
        <td>' . $username . '</td>
        <td>' . md5($password) . '</td>
        <td>' . $phone . '</td>
        <td>' . $email . '</td>
        <td>' . $vaitro . '</td>
        <td><a href="admin.php?pg=uduser&id=' . $id_us . '"><i class="fas fa-edit" style="color: #ff2600;"></i></a> </td>
    </tr>';
}

?>


<body>

    <div class="content">
        <div class="form-loai">
            <form name="" action="admin.php?pg=userthem" method="post" onsubmit="return validateForm()">
                <div class="group">
                    <label for="">Tên: </label><br>
                    <input type="text" name="username" id="username">
                    <div id="errTen"></div>
                </div>
                <div class="group">
                    <label for="">Số điện thoại: </label><br>
                    <input type="text" name="phone" id="phone">
                    <div id="errPhone"></div>
                </div>
                <div class="group">
                    <label for="">Mật khẩu: </label><br>
                    <input type="password" name="password" id="password">
                    <div id="errPass"></div>
                </div>
                <div class="group">
                    <label for="">Email: </label><br>
                    <input type="text" name="email" id="email">
                    <div id="errMail"></div>
                </div>
                <div class="group">
                    <label for="">Vai trò:</label>
                    <input type="radio" name="vaitro" value="0" id="vaitro">0. Người dùng<br>
                    <input type="radio" name="vaitro" value="1" id="vaitro">1. Admin<br>
                    <div id="errVaitro"></div>
                    <br>
                    <input type="submit" name="them_u" value="Thêm" class="btn">
                </div>

            </form>
        </div>

        <table border="1">
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Pass</th>
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
        var username = document.getElementById("username").value;
        var phone = document.getElementById("phone").value;
        var password = document.getElementById("password").value;
        var email = document.getElementById("email").value;
        var vaitro = document.querySelector('input[name="vaitro"]:checked');


        if (username === "") {
            document.getElementById("errTen").innerHTML = "Vui lòng nhập tên của bạn";
            return false;
        }

        var phoneRegex = /0\d{9}$/;
        if (phone === "") {
            document.getElementById("errPhone").innerHTML = "Vui lòng nhập số điện thoại của bạn";
            return false;
        } else if (!phone.match(phoneRegex)) {
            document.getElementById("errPhone").innerHTML = "Số điện thoại không hợp lệ";
            return false;
        }


        if (password === "") {
            document.getElementById("errPass").innerHTML = "Vui lòng nhập password của bạn";
            return false;
        }

        var emailRegex = /^\S+@\S+\.\S+$/;
        if (email === "") {
            document.getElementById("errMail").innerHTML = "Vui lòng nhập email của bạn";
            return false;
        } else if (!email.match(emailRegex)) {
            document.getElementById("errMail").innerHTML = "Email không hợp lệ";
            return false;
        }


        if (vaitro === null) {
            document.getElementById("errVaitro").innerHTML = "Vui lòng chọn vai trò";
            return false;
        }

        return true;
    }
</script>
