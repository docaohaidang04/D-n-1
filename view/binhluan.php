<?php
session_start();
include '../dao/pdo.php';
include '../dao/binhluan.php';
$idpro = $_REQUEST['idpro'];
$dsbl = binh_luan_select_all($idpro);

?>
<div id="binhluan">


    <h2>BÌNH LUẬN</h2>
    <?php
    if (isset($_SESSION['s_user']) && ($_SESSION['s_user']) != "") {

    ?>
    <div id="commentForm">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="commentInput">Ý kiến của bạn:</label>
            <input type="hidden" name="idpro" value="<?= $idpro ?>">
            <input type="text" id="commentText" name="noidung" placeholder="Nhập ý kiến của bạn...">
            <input type="submit" id="commentSubmit" name="guibinhluan" value="Gửi đánh giá">
        </form>
    </div>
    <?php
    } else {
        // $_SESSION['trang']='sanphamchitiet';
        // $_SESSION['idpro']=$_GET['idpro'];

        echo "<a href='index.php?pg=dangnhap' target='_parent'>Bạn phải đăng nhập mới được bình luận</a>";
    }

    ?>




    <?php
    foreach ($dsbl as $bl) {
        extract($bl);
        echo '  <div class="comment-container">
      <img class="user-avatar" src="' . $avt . '" alt="">
       <div class="comment-content">
           <h3>' . $ten . '</h3>
           <p><strong>Ngày: </strong>' . $ngaybinhluan . '</p>
           <p><strong>' . $noidung . '</strong></p>
       </div></div>';
    }


    ?>

</div>




<?php
if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
    $noidung = $_POST['noidung'];
    $idpro = $_POST['idpro'];
    $id_us = $_SESSION['s_user']['id_us'];
    $ngaybinhluan = date("d/m/Y");
    binh_luan_insert($id_us, $idpro, $noidung, $ngaybinhluan);
    header("location: " . $_SERVER['HTTP_REFERER']);
}

?>
<style>
/* body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
} */

#commentForm {

    padding: 20px;
    border-radius: 8px;

}

#commentText {
    width: 70%;
    padding: 8px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 20px;
    background-color: white;
    color: black;
}

#commentForm #commentText {
    padding: 8px 16px;
    background-color: #fff;
    color: black;
    border: 1px solid black;
    border-radius: 20px;
    cursor: pointer;

}
#commentSubmit{
    padding: 8px 16px;
    background-color: rgb(197, 52, 52);
    color: #fff;
    border: 1px solid black;
    border-radius: 20px;
    cursor: pointer;
}

.comment-container {
    display: flex;
    align-items: center;
    padding: 15px;
    border-radius: 10px;

    max-width: 600px;
    width: 100%;
}

.user-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #3498db;
    margin-right: 15px;
}

.comment-content {
    flex: 1;
}

.comment-content h3 {
    margin: 0 0 10px;
}

#commentSubmit:hover{
    background-color: #fff;
    border: 1px solid rgb(197, 52, 52);
    color: rgb(197, 52, 52);
}
</style>
