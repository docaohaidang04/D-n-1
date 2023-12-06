<?php
require_once 'pdo.php';

function bill_insert_id($id_us, $nguoinhan_ten, $nguoinhan_diachi, $nguoinhan_dienthoai, $nguoidat_ten, $nguoidat_diachi, $nguoidat_email, $nguoidat_dienthoai, $total)
{

    $sql = "INSERT INTO bill (id_us, nguoinhan_ten, nguoinhan_diachi, nguoinhan_dienthoai, nguoidat_ten, nguoidat_diachi, nguoidat_email, nguoidat_dienthoai, total, ngaydat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    return pdo_execute_id($sql, $id_us, $nguoinhan_ten, $nguoinhan_diachi, $nguoinhan_dienthoai, $nguoidat_ten, $nguoidat_diachi, $nguoidat_email, $nguoidat_dienthoai, $total);
}


function lichsumh()
{
    $sql = "SELECT * FROM cart";
    return pdo_query($sql);
}

function history_insert($ten_sp, $hinh_sp, $gia, $idpro, $idbill, $id_us)
{
    $sql = "INSERT INTO lichsu (ten, hinh, gia, sl, size, idpro, idbill, id_us) VALUES (?,?,?,?,?,?);";
    pdo_execute($sql, $ten_sp, $hinh_sp, $gia, $idpro, $idbill, $id_us);
}

function get_order_historyadmin($idpro)
{
    $sql = "SELECT l.*, b.ngaydat FROM lichsu l JOIN bill b ON l.idbill = b.id WHERE l.id_us = ?";
    return pdo_query($sql, $idpro);
}

function get_order_history($id_us)
{
    $sql = "SELECT l.*, b.ngaydat FROM lichsu l JOIN bill b ON l.idbill = b.id WHERE l.id_us = ?";
    return pdo_query($sql, $id_us);
}
// insert vào cart
function cart_insert($ten, $hinh, $gia,$size,$sl,  $idpro, $idbill)
{
    $sql = "INSERT INTO cart (ten, hinh, gia,size,sl, idpro, idbill) VALUES (?,?,?,?,?,?,?);";
    pdo_execute($sql, $ten, $hinh, $gia,$size,$sl,  $idpro, $idbill);
}

function total()
{
    $totalAmount = 0;
    foreach ($_SESSION['giohang'] as $index => $value) {
        extract($value);
        $tt = (float)$gia * (int)$sl;
        $totalAmount += $tt;
    }
    return $totalAmount;
}
