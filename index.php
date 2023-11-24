<?php

session_start();
include 'dao/pdo.php';
include 'dao/sanpham.php';
include 'view/header.php';
include 'dao/danhmuc.php';
include 'dao/user.php';

//data cho trang chu
$dssp_new = dssp_moi(8);
$dssp_best = dssp_best(3);


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
                $id = $_GET['id'];
                $spct = get_sp_by_id($id);
                $dsdm = danhmuc_select_all();
                $iddm = $spct['iddm'];
                $splq = dssp_lienquan($iddm, $id, 4);
                $spnho = dsspnho($iddm, $id, 4);
                include "view/ctsp.php";
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
            include "view/register.php";
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
                    if ($vaitro == 1) {
                        $_SESSION['s_user'] = $kq;

                        header('location: ./admin.php');
                    } else if ($vaitro == 0) {
                        $_SESSION['s_user'] = $kq;
                        header('location: index.php');
                    }
                    //output
                } else {
                    $tb = "Tài khoản hoặc mật khẩu không tồn tại !";
                    $_SESSION['tb_dangnhap'] = $tb;
                    include 'view/login.php';
                }
            }



            break;
        case 'dangnhap':
            include 'view/login.php';
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

                $ten = $_POST["ten"];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $phone = $_POST["phone"];

                //xu ly
                user_insert($ten, $username, $password, $phone);
            }
            //
            include "view/login.php";
            break;
            //chinh sua ho so
        case 'updateuser':
            if (isset($_POST["capnhat"]) && ($_POST["capnhat"])) {
                $ten = $_POST["ten"];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $vaitro = 0;
                //Xử lý
                udmyacc($ten, $username, $phone, $email, $password, $vaitro, $id_us);
            }
            include 'view/thongtintk_cf.php';
            break;
        case 'myaccount':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                include 'view/thongtintk.php';
            }
            break;


        default:

            include "view/home.php";
            break;
    }
}
include 'view/footer.php';
