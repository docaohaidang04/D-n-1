<?php
require_once 'pdo.php';


//dang ky
function user_insert($ten, $ngaysinh, $email)
{
    $sql = "INSERT INTO user (ten, ngaysinh, email) VALUES (?, ?, ?)";
    //Đây là một phần quan trọng của câu lệnh, và nó đang thể hiện giá trị sẽ được thêm vào các cột tương ứng. 
    //Tuy nhiên, thay vì cung cấp giá trị cụ thể, bạn thấy dấu hỏi chấm hỏi (?) trong câu lệnh. 
    //Dấu chấm hỏi này là các tham số, và giá trị của chúng sẽ được cung cấp sau đó.
    //Dấu chấm hỏi (?) trong SQL injection có thể liên quan đến việc sử dụng các tham số để thay thế giá trị thực tế trong câu lệnh SQL. 
    //Cách này thường được sử dụng để bảo vệ ứng dụng khỏi SQL injection.
    //Sử dụng tham số là một phần quan trọng trong việc ngăn chặn SQL injection và bảo vệ cơ sở dữ liệu khỏi các cuộc tấn công này.
    pdo_execute($sql, $ten, $ngaysinh, $email);
}
//dang nhap
function checkuser($ten, $ngaysinh)
{
    $sql = "SELECT * FROM user WHERE ten=? AND ngaysinh=?";
    return pdo_query_one($sql, $ten, $ngaysinh);
    /* if (is_array($kq) && (count($kq))) {
        return $kq["id_us"];
    } else {
        return 0;
    } */
}
function user_update($ten, $ngaysinh,  $diem,  $id)
{
    $sql = "UPDATE user SET ten=?, ngaysinh=?, diem=?, WHERE id=?";
    pdo_query($sql, $ten, $ngaysinh,  $diem,  $id);
}

function get_user($id_us)
{
    $sql = "SELECT * FROM sinhvien WHERE id=?";
    return pdo_query_one($sql, $id_us);
}



function khach_hang_add($ten, $ngaysinh, $diem)
{
    $sql = "INSERT INTO sinhvien (ten, ngaysinh, diem) VALUES (?, ?, ?)";
    pdo_execute($sql, $ten, $ngaysinh, $diem);
}


function user_delete($id)
{
    $sql = "DELETE FROM sinhvien WHERE id=?";
    if (is_array($id)) {
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id);
    }
}

function showus()
{
    $sql = "SELECT * FROM sinhvien ORDER BY id DESC ";
    return pdo_query($sql);
}



function udmyacc($ten, $diem, $email, $ngaysinh, $diachi, $loai, $id_us)
{
    $sql = "UPDATE user SET ten=?,diem=?,email=?,ngaysinh=?,diachi=?,loai=? WHERE id_us=?";
    pdo_execute($sql, $ten, $diem, $email, $ngaysinh, $diachi, $loai, $id_us);
}

// function khach_hang_select_by_id($ma_kh){
//     $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
//     return pdo_query_one($sql, $ma_kh);
// }

// function khach_hang_exist($ma_kh){
//     $sql = "SELECT count(*) FROM khach_hang WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function khach_hang_select_by_role($loai){
//     $sql = "SELECT * FROM khach_hang WHERE loai=?";
//     return pdo_query($sql, $loai);
// }

// function khach_hang_change_ngaysinh($ma_kh, $ngaysinh_moi){
//     $sql = "UPDATE khach_hang SET ngaysinh=? WHERE ma_kh=?";
//     pdo_execute($sql, $ngaysinh_moi, $ma_kh);
// }

/* function user_update($ma_kh, $ngaysinh, $ten, $email, $hinh, $kich_hoat, $loai){
    $sql = "UPDATE user SET ngaysinh=?,ten=?,email=?,hinh=?,kich_hoat=?,loai=? WHERE ma_kh=?";
    pdo_execute($sql, $ngaysinh, $ten, $email, $hinh, $kich_hoat==1, $loai==1, $ma_kh);
}

function user_delete($ma_kh){
    $sql = "DELETE FROM user  WHERE ma_kh=?";
    if(is_array($ma_kh)){
        foreach ($ma_kh as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $ma_kh);
    }
}

function user_select_all(){
    $sql = "SELECT * FROM user";
    return pdo_query($sql);
}

function user_select_by_id($ma_kh){
    $sql = "SELECT * FROM user WHERE ma_kh=?";
    return pdo_query_one($sql, $ma_kh);
}

function user_exist($ma_kh){
    $sql = "SELECT count(*) FROM user WHERE $ma_kh=?";
    return pdo_query_value($sql, $ma_kh) > 0;
}

function user_select_by_role($loai){
    $sql = "SELECT * FROM user WHERE loai=?";
    return pdo_query($sql, $loai);
}

function user_change_ngaysinh($ma_kh, $ngaysinh_moi){
    $sql = "UPDATE user SET ngaysinh=? WHERE ma_kh=?";
    pdo_execute($sql, $ngaysinh_moi, $ma_kh);
} */