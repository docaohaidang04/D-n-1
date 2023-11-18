<?php
session_start();
ob_start();
include_once 'view/headerad.php';
include_once './dao/user.php';
include_once './dao/danhmuc.php';
include_once './dao/sanpham.php';
include_once './dao/pdo.php';

if (!isset($_GET['pg'])) {
} else {
    switch ($_GET['pg']) {
        case 'user':
            //Show khách hàng
            $showus = showus();
            include 'view/quantri/khachhang.php';
            break;
            // case 'userxoa':
            //     if (isset($_GET['id'])) {
            //         $id = $_GET['id'];
            //         user_delete($id);
            //     }
            //     //Show khách hàng
            //     $showus = showus();
            //     include 'view/quantri/khachhang.php';
            //     break;
        case 'userthem':
            khach_hang_add($_POST['username'], $_POST['password'], $_POST['phone'], $_POST['email'], $_POST['vaitro']);
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
                // $username = $_POST['username'];
                // $phone = $_POST['phone'];
                // $email = $_POST['email'];
                // $password = $_POST['password'];
                $id = $_POST['id'];
                $vaitro = $_POST['vaitro'];
                user_update($vaitro, $id);
            }
            //Show khách hàng
            $showus = showus();
            include 'view/quantri/khachhang.php';
            break;
        case 'loai':
            //Show dm
            $showdm = danhmuc_select_all();
            include 'view/quantri/danhmuc.php';
            break;
        case 'dmxoa':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                danhmuc_delete($id);
            }
            //Show danh muc
            $showdm = danhmuc_select_all();
            include 'view/quantri/danhmuc.php';
            break;
        case 'dmthem':
            $ten = $_POST['ten'];
            $ma = $_POST['ma'];
            danhmuc_insert($ten, $ma);
            //Show danh muc
            $showdm = danhmuc_select_all();
            include 'view/quantri/danhmuc.php';
            break;
        case 'loaisua':
            //Show danh muc
            $showdm = danhmuc_select_all();
            include 'view/quantri/uddanhmuc.php';
            break;
        case 'ud_sua':
            if (isset($_POST['sualoai']) && ($_POST['sualoai'])) {
                $ten = $_POST['ten'];
                $id = $_POST['id'];
                $ma = $_POST['ma'];
            }
            loai_update($ten, $ma, $id);
            //Show danh muc
            $showdm = danhmuc_select_all();
            include 'view/quantri/danhmuc.php';
            break;
            // HANG HOA
        case 'sanpham':
            // lấy dữ liệu hiển thị cho select opp
            $showdm = danhmuc_select_all();
            $kq_op = showoption_spqt($showdm);
            //Show sp
            $showsp = show_sp();
            include 'view/quantri/sanpham.php';
            break;
        case 'spxoa':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $hinh = $_GET['hinh'];
                sanpham_delete($id, $hinh);
            }

            // lấy dữ liệu hiển thị cho select opp
            $showdm = danhmuc_select_all();
            $kq_op = showoption_spqt($showdm);
            //Show sp
            $showsp = show_sp();
            include 'view/quantri/sanpham.php';
            break;

        case 'spthem':
            $ten = $_POST['ten'];
            $gia = $_POST['gia'];

            $bestseller = $_POST['bestseller'];
            $iddm = $_POST['iddm'];
            if (isset($_FILES['hinh']['name']) && ($_FILES['hinh']['name']) != "") {
                $target_dir = "layout/img/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file);
                $hinh = $target_file;
            } else {
                $hinh = ""; //gán giá trị để lưu trong hình table san pham 
            }
            sanpham_them($ten, $gia, $hinh, $bestseller, $iddm);
            // lấy dữ liệu hiển thị cho select opp
            $showdm = danhmuc_select_all();
            $kq_op = showoption_spqt($showdm);
            //Show hàng hóa
            $showsp = show_sp();
            include 'view/quantri/sanpham.php';
            break;

        case 'udsp':
            // lấy dữ liệu hiển thị cho select opp
            $showdm = danhmuc_select_all();
            $kq_op = showoption_spqt($showdm);
            //Show hàng hóa
            $showsp = show_sp();
            include 'view/quantri/udsanpham.php';
            break;
        case 'capnhatsp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $ten = $_POST['ten'];
                $gia = $_POST['gia'];
                $bestseller = $_POST['bestseller'];
                $iddm = $_POST['iddm'];
                $id = $_POST['id'];
                $hinh = $_POST['hinh'];
                if (isset($_FILES['hinh']['name']) && ($_FILES['hinh']['name']) != "") {
                    // xóa file hình cũ trong thư mục
                    if (file_exists($hinh)) unlink($hinh);
                    // up hinh mới
                    $target_dir = "layout/img/";
                    $target_file = $target_dir . basename($_FILES['hinh']['name']);
                    move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file);
                    $hinh = $target_file;
                }
            }
            udhanghoa($ten, $hinh, $gia, $bestseller, $iddm, $id);
            // lấy dữ liệu hiển thị cho select opp
            $showdm = danhmuc_select_all();
            $kq_op = showoption_spqt($showdm);
            //Show hàng hóa
            $showsp = show_sp();
            include 'view/quantri/sanpham.php';
            break;
        case 'logout':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                unset($_SESSION['s_user']);
            }
            header('location: ./index.php');
            break;

        default:
            include 'admin.php';
            break;
    }
}
