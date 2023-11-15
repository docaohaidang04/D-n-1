<?php
require_once 'pdo.php';
//lay san pham theo id ( lay 1 )
function get_sp_by_id($id)
{
    $sql = "SELECT * FROM sanpham WHERE id=?";
    return pdo_query_one($sql, $id);
}
//lay san pham
function dssp_moi($limi)
{   //lay theo danh sach dung order by id desc
    $sql = "SELECT * FROM sanpham ORDER BY id DESC limit " . $limi;
    return pdo_query($sql);
}
//lay san pham best
function dssp_best($limi)
{
    $sql = "SELECT * FROM sanpham WHERE bestseller=1 ORDER BY id DESC limit " . $limi;
    return pdo_query($sql);
}
//lay san pham view cao nhat
/* function dssp_view($limi)
{
    $sql = "SELECT * FROM sanpham  ORDER BY view DESC limit " . $limi;
    return pdo_query($sql);
} */

function dssp_lienquan($iddm, $id, $limi)
{
    $sql = "SELECT * FROM sanpham WHERE iddm=? and id<>?" . $limi;
    return pdo_query($sql, $iddm, $id);
}

function get_dssp($kyw, $iddm, $limi)
{
    $sql = "SELECT * FROM sanpham WHERE 1";
    if ($iddm > 0) {
        $sql .= " AND iddm=" . $iddm;
    }
    if ($kyw != "") {
        $sql .= " AND ten like  '%" . $kyw . "%'";
    }
    $sql .= " ORDER BY id DESC limit " . $limi;
    return pdo_query($sql);
}


function showsp($dssp)
{
    $html_dssp = '';
    foreach ($dssp as $sp) {
        extract($sp);
        if ($bestseller == 1) {
            $best = '<div class="best"></div>';
        } else {
            $best = '';
        }
        $link = "index.php?pg=sanphamchitiet&id=" . $id;
        $html_dssp .= '<div class="box25 mr15">
                        ' . $best . '
                        <a href="' . $link . '">
                         <img src="layout/img/' . $hinh . '" alt="">
                        </a>
                        <p>' . $ten . '</p>
                        <span class="price">' . $gia . '  đ</span>
                        <button class="my-button">Đặt hàng</button>
                        </div>';
    }
    return $html_dssp;
}

function sanpham_them($ten, $gia, $giam, $hinh, $bestseller, $iddm)
{
    $sql = "INSERT INTO sanpham(ten, gia, giam, hinh, bestseller,iddm) VALUES (?,?,?,?,?,?)";
    pdo_execute($sql, $ten, $gia, $giam, $hinh, $bestseller, $iddm);
}


function get_sp($id)
{
    $sql = "SELECT * FROM sanpham WHERE id=?";
    return pdo_query_one($sql, $id);
}


function udhanghoa($ten, $hinh, $gia, $giam, $bestseller, $iddm, $id)
{
    $sql = "UPDATE sanpham SET ten=?,hinh=?,gia=?,giam=?,bestseller=?,iddm=? WHERE id=?";
    pdo_execute($sql, $ten, $hinh, $gia, $giam, $bestseller, $iddm, $id);
}

function sanpham_delete($id, $hinh)
{
    $sql = "DELETE FROM sanpham WHERE  id=?";
    if (is_array($id)) {
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id);
    }
    if (file_exists($hinh)) unlink($hinh);
}

function show_sp()
{
    $sql = "SELECT sanpham.*,danhmuc.ten as tendm FROM sanpham inner join danhmuc on sanpham.iddm=danhmuc.id ORDER BY id DESC  ";
    return pdo_query($sql);
}

function showoption_spqt($showdm, $iddm = 0)
{
    $kq_op = '';
    foreach ($showdm as $value) {
        extract($value);
        if ($iddm == $id) {
            $kq_op .= '<option selected value="' . $id . '">' . $ten . '</option>';
        } else {
            $kq_op .= '<option value="' . $id . '">' . $ten . '</option>';
        }
    }
    return $kq_op;
}

 
/*
function hang_hoa_exist($ma_hh){
    $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
    return pdo_query_value($sql, $ma_hh) > 0;
}

function hang_hoa_tang_so_luot_xem($ma_hh){
    $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
    pdo_execute($sql, $ma_hh);
}

function hang_hoa_select_top10(){
    $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
    return pdo_query($sql);
}

function hang_hoa_select_dac_biet(){
    $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
    return pdo_query($sql);
}

function hang_hoa_select_by_loai($ma_loai){
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
    return pdo_query($sql, $ma_loai);
}

function hang_hoa_select_keyword($keyword){
    $sql = "SELECT * FROM hang_hoa hh "
            . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
            . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
    return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
}

function hang_hoa_select_page(){
    if(!isset($_SESSION['page_no'])){
        $_SESSION['page_no'] = 0;
    }
    if(!isset($_SESSION['page_count'])){
        $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
        $_SESSION['page_count'] = ceil($row_count/10.0);
    }
    if(exist_param("page_no")){
        $_SESSION['page_no'] = $_REQUEST['page_no'];
    }
    if($_SESSION['page_no'] < 0){
        $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
    }
    if($_SESSION['page_no'] >= $_SESSION['page_count']){
        $_SESSION['page_no'] = 0;
    }
    $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
    return pdo_query($sql);
} */