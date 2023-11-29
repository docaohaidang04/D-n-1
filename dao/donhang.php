<?php
require_once 'pdo.php';

function bill_insert_id($id_us, $nguoinhan_ten, $nguoinhan_diachi, $nguoinhan_dienthoai, $nguoidat_ten, $nguoidat_diachi, $nguoidat_email, $nguoidat_dienthoai, $total)
{

    $sql = "INSERT INTO bill (id_us, nguoinhan_ten, nguoinhan_diachi, nguoinhan_dienthoai, nguoidat_ten, nguoidat_diachi, nguoidat_email, nguoidat_dienthoai, total, ngaydat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    return pdo_execute_id($sql, $id_us, $nguoinhan_ten, $nguoinhan_diachi, $nguoinhan_dienthoai, $nguoidat_ten, $nguoidat_diachi, $nguoidat_email, $nguoidat_dienthoai, $total);
}



// insert vào cart
function cart_insert($ten, $hinh, $gia, $sl, $idpro, $idbill)
{
    $sql = "INSERT INTO cart (ten, hinh, gia, sl, idpro, idbill) VALUES (?,?,?,?,?,?);";
    pdo_execute($sql, $ten, $hinh, $gia, $sl, $idpro, $idbill);
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