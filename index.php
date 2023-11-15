<?php

session_start();
include('dao/pdo.php');
include('dao/sanpham.php');
include('view/header.php');
include('dao/danhmuc.php');
include('dao/user.php');

//data cho trang chu
$dssp_new = dssp_moi(8);
$dssp_best = dssp_best(3);
/* $dssp_view = dssp_view(4); */

if (!isset($_GET['pg'])) {

    include "view/home.php";
    $dsdm = danhmuc_select_all();
    if (!isset($_GET['iddm'])) {
        $iddm = 0;
    } else {
        $iddm = $_GET['iddm'];
    }
} else {
    switch ($_GET['pg']) {
        case 'sanphamchitiet':
            if (isset($_GET['id'])) {
                $id_sp = $_GET['id'];
                $spct = get_sp_by_id($id_sp);
                $dsdm = danhmuc_select_all();
                $iddm = $spct['iddm'];
                $splq = dssp_lienquan($iddm, $id, 4);
                include "view/sanphamchitiet.php";
            } else {
                include "view/home.php";
            }

            break;
        case 'sanpham':

            //LOAD DANH MUC
            $dsdm = danhmuc_select_all();
            if (!isset($_GET['iddm'])) {
                $iddm = 0;
            } else {
                $iddm = $_GET['iddm'];
            }

            //kiem tra co phai form search khong?
            if (isset($_POST["timkiem"]) && ($_POST["timkiem"])) {
                $kyw = $_POST["kyw"];
                $titlepage = "KẾT QUẢ TÌM KIẾM: " . $kyw;
            } else {
                $kyw = "";
                $titlepage = "";
            }
            //DANH MUC
            $dssp = get_dssp($kyw, $iddm, 3);
            include 'view/sanpham.php';
            break;

            //dangky dangnhap
        case 'dangky':
            include "view/dangky.php";

            break;
        case 'login':
            //input
            if (isset($_POST["dangnhap"]) && ($_POST["dangnhap"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];

                //Xử lý
                $kq = checkuser($username, $password);
                if (is_array($kq) && (count($kq))  && (count($kq) > 0)) {
                    extract($kq);
                    if ($loai == 1) {
                        $_SESSION['s_user'] = $kq;

                        header('location: ./admin.php');
                    } else if ($loai == 0) {
                        $_SESSION['s_user'] = $kq;
                        header('location: index.php');
                    }
                    //output
                } else {
                    $tb = "Tài khoản hoặc mật khẩu không tồn tại !";
                    $_SESSION['tb_dangnhap'] = $tb;
                    include 'view/dangnhap.php';
                }
            }



            break;
        case 'dangnhap':
            include 'view/dangnhap.php';
            break;

        case 'logout':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                unset($_SESSION['s_user']);
            }
            header('location: index.php');
            break;
        case 'adduser':
            //xac dinh gia tri dau vao (input)
            if (isset($_POST["dangky"]) && ($_POST["dangky"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $email = $_POST["email"];

                //xu ly
                user_insert($username, $password, $email);
            }
            //
            include "view/dangnhap.php";
            break;
            //chinh sua ho so
        case 'updateuser':
            if (isset($_POST["capnhat"]) && ($_POST["capnhat"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                $diachi = $_POST["diachi"];
                $phone = $_POST["phone"];
                $loai = 0;
                $id_us = $_POST["id_us"];
                //Xử lý
                udmyacc($username, $phone, $email, $password, $diachi, $loai, $id_us);
            }
            include 'view/udmyaccount.php';
            break;
        case 'myaccount':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                include 'view/myaccount.php';
            }
            break;

            /* if (isset($_POST["login"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $user = checkuser($username, $password);
                if (isset($user) && (is_array($user)) && (count($user) > 0)) {
                    extract($user);
                    if ($loai == 1) {
                        $_SESSION['s_user'] = $user;
                        header('location: admin.php');
                    } else {
                        $tb = "Tài khoản này không có quyền đăng nhập vào ADMIN";
                    }
                } else {
                    $tb = "Tài khoản này không tồn tại !";
                }
            } */
        default:

            include "view/home.php";
            break;
    }
}
/* include 'view/footer.php'; */