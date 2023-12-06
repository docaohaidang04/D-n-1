<?php
$kq = '';
$stt = 0;
foreach ($showdm as $value) {
    $stt++;
    extract($value);
    $kq .= ' <tr>
        <td>' . $stt . '</td>
        <td>' . $ten. '</td>
        <td>' . $ma. '</td>
        <td><a href="admin.php?pg=loaisua&id=' . $id. '"><i class="fas fa-edit" style="color: #ff2600;"></i></a> <a href="admin.php?pg=dmxoa&id=' . $id. '"><i class="fas fa-trash-alt" style="color: #fa3605;"></i></a></td>
    </tr>';
}
if ((isset($_GET['id'])) && ($_GET['id'] > 0)) {
    $id = $_GET['id'];
    $uddm = getdm($id);
    extract($uddm);
}

?>


<div class="content">
    <div class="form-loai">

        <form name="" action="admin.php?pg=ud_sua" method="post" onsubmit="return validateForm()"
            enctype="multipart/form-data">

            <label for="">Tên danh mục: </label><br>
            <input type="text" name="ten" value="<?= $ten; ?>" id="ten"><br>
            <div id="errTen"></div>
            <label for="">Mã danh mục: </label><br>
            <input type="text" name="ma" value="<?= $ma; ?>" id="ma"><br>
            <input type="hidden" name="id" value="<?= $id ?>"><br>
            <div id="errMa"></div>
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

<script>
function validateForm() {
    var ten = document.getElementById("ten").value;
    var ma = document.getElementById("ma").value;

    if (ten === "") {
        document.getElementById("errTen").innerHTML = "Vui lòng nhập tên danh mục";
        return false;
    }
    if (ma === "") {
        document.getElementById("errMa").innerHTML = "Vui lòng nhập mã danh mục";
        return false;
    }
    return true;
}
</script>
