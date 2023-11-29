<?php
require_once 'pdo.php';

function binh_luan_insert($id_us, $idpro, $noidung, $ngaybinhluan)
{
    $sql = "INSERT INTO binhluan(id_us, idpro, noidung, ngaybinhluan) VALUES (?,?,?,?)";
    pdo_execute($sql, $id_us, $idpro, $noidung, $ngaybinhluan);
}
function binh_luan_select_all($idpro)
{
    $sql = "SELECT binhluan.*, user.ten as ten, user.hinh as avt FROM binhluan INNER JOIN user ON binhluan.id_us = user.id_us WHERE idpro=? ORDER BY id DESC";
    return pdo_query($sql, $idpro);
}

function load_bl($idpro)
{
    $sql = "SELECT binhluan.*, COUNT(binhluan.id) as sobinhluan, user.ten as ten, sanpham.ten_sp as tensp, MIN(binhluan.ngaybinhluan) as ngaycu, MAX(binhluan.ngaybinhluan) as ngaymoi
    FROM binhluan
    JOIN user ON binhluan.id_us = user.id_us 
    JOIN sanpham ON binhluan.idpro = sanpham.id 
    WHERE 1";

    if ($idpro > 0) {
        $sql .= " AND binhluan.idpro=" . $idpro;
    }

    $sql .= " GROUP BY binhluan.idpro ORDER BY binhluan.id DESC";
    return pdo_query($sql);
}

function lay_idpro($id)
{
    $sql = "SELECT idpro FROM binhluan WHERE id=?";
    return pdo_query_value($sql, $id);
}

function load_blct($idpro)
{
    $sql = "SELECT binhluan.*, user.ten as ten, sanpham.ten_sp as tensp
    FROM binhluan
    JOIN user ON binhluan.id_us = user.id_us 
    JOIN sanpham ON binhluan.idpro = sanpham.id 
    WHERE idpro = $idpro
    ORDER BY id DESC";
    return pdo_query($sql);
}

function binh_luan_delete($id)
{
    $sql = "DELETE FROM binhluan WHERE id=?";
    if (is_array($id)) {
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id);
    }
}








// function binh_luan_update($ma_bl, $ma_kh, $ma_hh, $noi_dung, $ngay_bl){
//     $sql = "UPDATE binh_luan SET ma_kh=?,ma_hh=?,noi_dung=?,ngay_bl=? WHERE ma_bl=?";
//     pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl, $ma_bl);
// }





// function binh_luan_select_by_id($ma_bl){
//     $sql = "SELECT * FROM binh_luan WHERE ma_bl=?";
//     return pdo_query_one($sql, $ma_bl);
// }

// function binh_luan_exist($ma_bl){
//     $sql = "SELECT count(*) FROM binh_luan WHERE ma_bl=?";
//     return pdo_query_value($sql, $ma_bl) > 0;
// }
// //-------------------------------//
// function binh_luan_select_by_hang_hoa($ma_hh){
//     $sql = "SELECT b.*, h.ten_hh FROM binh_luan b JOIN hang_hoa h ON h.ma_hh=b.ma_hh WHERE b.ma_hh=? ORDER BY ngay_bl DESC";
//     return pdo_query($sql, $ma_hh);
// }