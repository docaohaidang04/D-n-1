<?php

$kq = '';
$stt = 0;
foreach ($showsp as $value) {
    extract($value);
    $stt++;
    $kq .= ' <tr>
        <td>' . $stt . '</td>
        <td>' . $ten . '</td>
        <td><img src="./playout/images/' . $hinh . '"width=100px></td>
        <td>' . $gia . '</td>
        <td>' . $giam . '</td>
     
        <td>' . $view . '</td>
        <td>' . $tendm . '</td>
        <td><a href="admin.php?pg=udsp&id_sp=' . $id_sp . '">Sửa</a> <a href="admin.php?pg=spxoa&id_sp=' . $id_sp . '& hinh=' . $hinh . '">Xóa</a></td>
    </tr>';
}

if ((isset($_GET['id_sp'])) && ($_GET['id_sp'] > 0)) {
    $id_sp = $_GET['id_sp'];
    $udsp = get_sp($id_sp);
    extract($udsp);
}


?>



<div class="content">
    <div class="form-loai">

        <form action="admin.php?pg=capnhatsp" method="post" enctype="multipart/form-data">
            <label for="">Tên sản phẩm:</label> <input type="text" name="ten" value="<?= $ten ?>"><br>
            <label for="">Hình ảnh:</label> <input type="file" name="hinh" value=""><img src="<?= $hinh ?>" width="100px" alt=""><br>
            <label for="">Giá:</label> <input type="text" name="gia" value="<?= $gia ?>"><br>
            <label for="">Giảm:</label> <input type="text" name="giam" value="<?= $giam ?>"><br>
            <label for="">Trạng thái:</label>
            <input type="radio" name="bestseller" value="0">0. Bình thường<br>
            <input type="radio" name="bestseller" value="1">1. Bán chạy<br>
            <label for="">Danh mục:</label>
            <select name="iddm" value="<?= $iddm ?>">
                <?= $kq_op ?>;
            </select>

            <br>
            <input type="hidden" name="hinh" value="<?= $hinh ?>"><br>
            <input type="hidden" value="<?= $id_sp ?>" name="id_sp">
            <input type="submit" name="capnhat" value="Sửa" class="btn">
        </form>

    </div>



    <table border="1">
        <tr>
            <th>STT</th>
            <th>Tên sp</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Giảm</th>
            <th>Lượt xem</th>
            <th>Loại</th>
            <th>Chức năng</th>
        </tr>

        <?php
        echo $kq;
        ?>
    </table>


</div>