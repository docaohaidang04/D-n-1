<?php
$kq = '';
$stt = 0;
foreach ($showdm as $value) {
    $stt++;
    extract($value);
    $kq .= ' <tr>
        <td>' . $stt . '</td>
        <td>' . $ten . '</td>
        <td>' . $ma . '</td>
        <td><a href="admin.php?pg=loaisua&id=' . $id . '">Sửa</a> <a href="admin.php?pg=dmxoa&id=' . $id . '">Xóa</a></td>
    </tr>';
    if ((isset($_GET['id'])) && ($_GET['id'] > 0)) {
        $id = $_GET['id'];
        $uddm = getdm($id);
        extract($uddm);
    }
}

?>


<div class="content">
    <div class="form-loai">

        <form name="" action="admin.php?pg=ud_sua" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">

            <label for="">Tên danh mục: </label><br>
            <input type="text" name="ten" value="<?= $ten; ?>"><br>
            <label for="">Mã danh mục: </label><br>
            <input type="text" name="ma" value="<?= $ma; ?>"><br>
            <input type="hidden" name="id" value="<?= $id ?>"><br>
            <input type="submit" name="sualoai" value="Sửa" class="btn">
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