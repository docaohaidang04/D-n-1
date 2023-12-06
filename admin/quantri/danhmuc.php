<?php
$kq = '';
$st = 0;
foreach ($showdm as $value) {
    $st++;
    extract($value);
    $kq .= ' <tr>
        <td>' . $st . '</td>
        <td>' . $ten . '</td>
        <td>' . $ma . '</td>
        <td><a href="admin.php?pg=loaisua&id=' . $id . '"><i class="fas fa-edit" style="color: #ff2600;"></i></a> <a href="admin.php?pg=dmxoa&id=' . $id . '"><i class="fas fa-trash-alt" style="color: #fa3605;"></i></a></td>
    </tr>';
}

?>


<div class="content">
    <div class="form-loai">

        <form name="" action="admin.php?pg=dmthem" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">

            <label for="">Tên danh mục: </label><br>
            <input type="text" name="ten" id="ten"><br>
            <div id="errTen"></div>
            <label for="">Mã danh mục: </label><br>
            <input type="text" name="ma" id="ma"><br>
            <div id="errMa"></div>
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
