<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_danhmuc là tên loại
 * @throws PDOException lỗi thêm mới
 */
function danhmuc_insert($ten, $ma)
{
    $sql = "INSERT INTO danhmuc (ten,ma) VALUES(?,?)";
    pdo_execute($sql, $ten, $ma);
}
/**
 * Cập nhật tên loại
 * @param int $ma_danhmuc là mã loại cần cập nhật
 * @param String $ten_danhmuc là tên loại mới
 * @throws PDOException lỗi cập nhật
 */

function get_name_dm($id)
{
    $sql = "SELECT ten FROM danhmuc WHERE id=" . $id;
    $kq = pdo_query_one($sql);
    return $kq["ten"];
}
function check_ten($ten)
{
    $sql = "SELECT * FROM danhmuc WHERE ten=?";
    return pdo_query_one($sql, $ten);
}
function getdm($id)
{
    $sql = "SELECT * FROM danhmuc WHERE id=?";
    return pdo_query_one($sql, $id);
}
function loai_update($ten, $ma, $id)
{
    $sql = "UPDATE danhmuc SET ten=?, ma=? WHERE id=?";
    pdo_execute($sql, $ten, $ma, $id);
}
/**
 * Xóa một hoặc nhiều loại
 * @param mix $ma_danhmuc là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function danhmuc_delete($id)
{
    $sql = "DELETE FROM danhmuc WHERE id=?";
    if (is_array($id)) {
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id);
    }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_select_all()
{
    $sql = "SELECT * FROM danhmuc ORDER BY id DESC";
    return pdo_query($sql);
}


function showdm($dsdm)
{
    $html_dm = '';
    foreach ($dsdm as $dm) {
        extract($dm);
        $link = 'index.php?pg=sanpham&iddm=' . $id;
        $html_dm .= '<a href="' . $link . '">' . $ten . '</a>';
    }
    return $html_dm;
}
/**
 * Truy vấn một loại theo mã
 * @param int $ma_danhmuc là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_select_by_id($ma_danhmuc)
{
    $sql = "SELECT * FROM danhmuc WHERE ma_danhmuc=?";
    return pdo_query_one($sql, $ma_danhmuc);
}
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $ma_danhmuc là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_exist($ma_danhmuc)
{
    $sql = "SELECT count(*) FROM danhmuc WHERE ma_danhmuc=?";
    return pdo_query_value($sql, $ma_danhmuc) > 0;
}
