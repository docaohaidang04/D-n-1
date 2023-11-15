<?php
$kq = '';
$stt = 0;
foreach ($showdm as $value) {
    $stt++;
    $kq .= ' <tr>
        <td>' . $stt . '</td>
        <td>' . $value['ten'] . '</td>
        <td>' . $value['ma'] . '</td>
        <td><a href="admin.php?pg=loaisua&id=' . $value['id'] . '">Sửa</a> <a href="admin.php?pg=dmxoa&id=' . $value['id'] . '">Xóa</a></td>
    </tr>';
}

?>


<div class="content">
    <div class="form-loai">

        <form name="" action="admin.php?pg=dmthem" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">

            <label for="">Tên danh mục: </label><br>
            <input type="text" name="ten"><br>
            <label for="">Mã danh mục: </label><br>
            <input type="text" name="ma"><br>
            <input type="submit" name="them_u" value="Thêm" class="btn">
        </form>



    </div>

    <table border="1">
        <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Mã danh mục</th>
            <th>Chức năng</th>
        </tr>

        <?php
        echo $kq;
        ?>
    </table>

</div>