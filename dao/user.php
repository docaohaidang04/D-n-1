<?php
require_once 'pdo.php';


//dang ky
function user_insert($ten, $username, $password, $phone)
{
    $sql = "INSERT INTO user (ten, username, password, phone) VALUES (?, ?, ?, ?)";
    //Đây là một phần quan trọng của câu lệnh, và nó đang thể hiện giá trị sẽ được thêm vào các cột tương ứng. 
    //Tuy nhiên, thay vì cung cấp giá trị cụ thể, bạn thấy dấu hỏi chấm hỏi (?) trong câu lệnh. 
    //Dấu chấm hỏi này là các tham số, và giá trị của chúng sẽ được cung cấp sau đó.
    //Dấu chấm hỏi (?) trong SQL injection có thể liên quan đến việc sử dụng các tham số để thay thế giá trị thực tế trong câu lệnh SQL. 
    //Cách này thường được sử dụng để bảo vệ ứng dụng khỏi SQL injection.
    //Sử dụng tham số là một phần quan trọng trong việc ngăn chặn SQL injection và bảo vệ cơ sở dữ liệu khỏi các cuộc tấn công này.
    pdo_execute($sql, $ten, $username, $password, $phone);
}
function check_taikhoan($username)
{
    $sql = "SELECT * FROM user WHERE username=? ";
    return pdo_query_one($sql, $username);
}


function user_insert_id($ten, $diachi, $phone, $email)
{
    $sql = "INSERT INTO user (ten,diachi, phone,email) VALUES ( ?,?,?,?)";
    return pdo_execute_id($sql, $ten, $diachi, $phone, $email);
}
//dang nhap
function checkuser($phone, $password)
{
    $sql = "SELECT * FROM user WHERE phone=? AND password=?";
    return pdo_query_one($sql, $phone, $password);
    /* if (is_array($kq) && (count($kq))) {
        return $kq["id_us"];
    } else {
        return 0;
    } */
}
function user_update($vaitro, $id_us)
{
    $sql = "UPDATE user SET vaitro=? WHERE id_us=?";
    pdo_query($sql, $vaitro, $id_us);
}

function get_user($id_us)
{
    $sql = "SELECT * FROM user WHERE id_us=?";
    return pdo_query_one($sql, $id_us);
}



function khach_hang_add($username, $password, $phone, $email, $vaitro)
{
    $sql = "INSERT INTO user (username, password, phone, email, vaitro) VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql, $username, $password, $phone, $email, $vaitro == 1);
}


function user_delete($id_us)
{
    $sql = "DELETE FROM user WHERE id_us=?";
    if (is_array($id_us)) {
        foreach ($id_us as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id_us);
    }
}

function showus()
{
    $sql = "SELECT * FROM user ORDER BY id_us DESC ";
    return pdo_query($sql);
}



function udmyacc($ten, $username, $phone, $email, $password, $vaitro, $hinh, $id_us)
{
    $sql = "UPDATE user SET ten=?, username=?,phone=?,email=?,password=?, vaitro=?,hinh=? WHERE id_us=?";
    pdo_execute($sql, $ten, $username, $phone, $email, $password, $vaitro, $hinh, $id_us);
}

// function khach_hang_select_by_id($ma_kh){
//     $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
//     return pdo_query_one($sql, $ma_kh);
// }

// function khach_hang_exist($ma_kh){
//     $sql = "SELECT count(*) FROM khach_hang WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function khach_hang_select_by_role($vaitro){
//     $sql = "SELECT * FROM khach_hang WHERE vaitro=?";
//     return pdo_query($sql, $vaitro);
// }

// function khach_hang_change_password($ma_kh, $password_moi){
//     $sql = "UPDATE khach_hang SET password=? WHERE ma_kh=?";
//     pdo_execute($sql, $password_moi, $ma_kh);
// }

/* function user_update($ma_kh, $password, $username, $email, $hinh, $kich_hoat, $vaitro){
    $sql = "UPDATE user SET password=?,username=?,email=?,hinh=?,kich_hoat=?,vaitro=? WHERE ma_kh=?";
    pdo_execute($sql, $password, $username, $email, $hinh, $kich_hoat==1, $vaitro==1, $ma_kh);
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

function user_select_by_role($vaitro){
    $sql = "SELECT * FROM user WHERE vaitro=?";
    return pdo_query($sql, $vaitro);
}

function user_change_password($ma_kh, $password_moi){
    $sql = "UPDATE user SET password=? WHERE ma_kh=?";
    pdo_execute($sql, $password_moi, $ma_kh);
} */
