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
        <td><a href="admin.php?pg=udsp&id=' . $id . '">Sửa</a> <a href="admin.php?pg=spxoa&id=' . $id . '& hinh=' . $hinh . '">Xóa</a></td>
    </tr>';
}


?>



<div class="content">
    <div class="form-loai">

        <form action="admin.php?pg=spthem" method="post" enctype="multipart/form-data">
            <label for="">Tên sản phẩm:</label> <input type="text" name="ten" value=""><br>
            <label for="">Hình ảnh:</label> <input type="file" name="hinh" value=""><img src="" name="hinh" alt=""><br>
            <label for="">Giá:</label> <input type="text" name="gia" value=""><br>
            <label for="">Giảm:</label> <input type="text" name="giam" value=""><br>
            <label for="">Trạng thái:</label>
            <input type="radio" name="bestseller" value="0">0. Bình thường<br>
            <input type="radio" name="bestseller" value="1">1. Bán chạy<br>
            <label for="">Danh mục:</label>
            <select name="iddm">
                <?= $kq_op ?>;
            </select>

            <br>
            <input type="submit" name="them" value="Thêm" class="btn">
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