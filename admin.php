<?php
session_start();
ob_start();
include_once 'view/headerad.php';
include_once './dao/user.php';
include_once './dao/pdo.php';

if (!isset($_GET['pg'])) {
} else {
    switch ($_GET['pg']) {
        case 'user':
            //Show khách hàng
            $showus = showus();
            include 'view/quantri/khachhang.php';
            break;
        case 'userxoa':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                user_delete($id);
            }
            //Show khách hàng
            $showus = showus();
            include 'view/quantri/khachhang.php';
            break;
        case 'userthem':
            if ($_POST['ten'] == "") {
                echo "Bạn chưa nhập tên  để thêm";
            } else if ($_POST['ngaysinh'] == "") {
                echo "Bạn chưa nhập mật khẩu";
            } else if ($_POST['diem'] == "") {
                echo "Bạn chưa nhập số điện thoại";
            } else {
                // Thực hiện thêm người dùng
                khach_hang_add($_POST['ten'], $_POST['ngaysinh'], $_POST['diem']);
            }

            //Show khách hàng
            $showus = showus();
            include 'view/quantri/khachhang.php';
            break;
        case 'uduser':
            //Show khách hàng
            $showus = showus();
            include 'view/quantri/udkhachhang.php';
            break;

        case 'capnhatus':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $ten = $_POST['ten'];
                $diem = $_POST['diem'];
                $ngaysinh = $_POST['ngaysinh'];
                $id = $_POST['id'];
                user_update($ten, $ngaysinh, $diem, $id);
            }
            //Show khách hàng
            $showus = showus();
            include 'view/quantri/khachhang.php';
            break;

        default:
            include 'admin.php';
            break;
    }
}
