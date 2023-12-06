<?php

$kq = '';
$stt = 0;
foreach ($showsp as $value) {
  extract($value);
  $stt++;
  $kq .= ' <tr>
        <td>' . $stt . '</td>
        <td>' . $ten_sp . '</td>
        <td><img src="' . $hinh_sp . '"width=100px></td>
        <td>' . $gia . '</td>
        
        <td>' . $tendm . '</td>
        <td><a href="admin.php?pg=udsp&id=' . $id . '"><i class="fas fa-edit" style="color: #ff2600;"></i></a> <a href="admin.php?pg=spxoa&id=' . $id . '& hinh_sp=' . $hinh_sp . '"><i class="fas fa-trash-alt" style="color: #fa3605;"></i></a></td>
    </tr>';
}


?>



<div class="content">
  <div class="form-loai">

    <form action="admin.php?pg=spthem" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
      <label for="">Tên sản phẩm:</label> <input type="text" name="ten_sp" value="" id="ten"><br>
      <div id="errTen"></div>
      <label for="">Hình ảnh:</label> <input type="file" name="hinh_sp" value="" id="hinh"><img src="" name="hinh" alt=""><br>
      <div id="errHinh"></div>
      <label for="">Giá:</label> <input type="text" name="gia" value="" id="gia"><br>
      <div id="errGia"></div>
      <label for="">Mô tả:</label> <input type="text" name="mota" value="" id="mota"><br>
      
      <!-- <label for="">Giảm:</label> <input type="text" name="giam" value=""><br> -->
      <label for="">Trạng thái:</label>
      <input type="radio" name="bestseller" value="0" id="bestseller">0. Bình thường<br>
      <input type="radio" name="bestseller" value="1" id="bestseller">1. Bán chạy<br>
      <div id="errTrangthai"></div>
      <label for="">Danh mục:</label>
      <select name="iddm" id="iddm">
        <?= $kq_op ?>;
      </select>
      <div id="errDanhmuc"></div>

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
      <!-- <th>Giảm</th>
            <th>Lượt xem</th> -->
      <th>Loại</th>
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
    var hinh = document.getElementById("hinh").value;
    var gia = document.getElementById("gia").value;
    var iddm = document.getElementById("iddm").value;
    var bestseller = document.querySelector('input[name="bestseller"]:checked');


    if (ten.trim() === "") {
      document.getElementById('errTen').innerHTML = "Tên sản phẩm không được để trống";
      return false;
    }

    // Validate Hình ảnh
    if (hinh.trim() === "") {
      document.getElementById('errHinh').innerHTML = "Hình ảnh không được để trống";
      return false;
    }

    // Validate Giá
    if (gia.trim() === "") {
      document.getElementById('errGia').innerHTML = "Giá không được để trống";
      return false;
    } else if (isNaN(gia)) {
      document.getElementById('errGia').innerHTML = "Giá phải là một số";
      return false;
    }

    // Validate Trạng thái
    if (!bestseller) {
      document.getElementById('errTrangthai').innerHTML = "Chọn một trạng thái";
      return false;
    }

    // Validate Danh mục
    if (iddm.trim() === "") {
      document.getElementById('errDanhmuc').innerHTML = "Chọn một danh mục";
      return false;
    }

    // If all validations pass, the form is valid
    return true;
  }
</script>
