<?php
session_start();
ob_start();
include_once 'view/headerad.php';
include_once './dao/user.php';
include_once './dao/bill.php';
include_once './dao/danhmuc.php';
include_once './dao/sanpham.php';
include_once './dao/binhluan.php';
include_once './dao/pdo.php';
include_once './dao/donhang.php';

if (!isset($_GET['pg'])) {
} else {
    switch ($_GET['pg']) {

        case 'qldh':
            if (isset($_GET['id_us']) && ($_GET['id_us'] > 0)) {
                $id_us = $_GET['id_us'];
            }

            $showb = showb($id_us);
            include 'view/quantri/qldh.php';



            break;

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
                $hinh_sp = $_GET['hinh_sp'];
                sanpham_delete($id, $hinh_sp);
            }

            // lấy dữ liệu hiển thị cho select opp
            $showdm = danhmuc_select_all();
            $kq_op = showoption_spqt($showdm);
            //Show sp
            $showsp = show_sp();
            include 'view/quantri/sanpham.php';
            break;

        case 'spthem':
            $ten_sp = $_POST['ten_sp'];
            $gia = $_POST['gia'];
            $mota = $_POST['mota'];

            $bestseller = $_POST['bestseller'];
            $iddm = $_POST['iddm'];
            if (isset($_FILES['hinh_sp']['name']) && ($_FILES['hinh_sp']['name']) != "") {
                $target_dir = "layout/img/";
                $target_file = $target_dir . basename($_FILES['hinh_sp']['name']);
                move_uploaded_file($_FILES['hinh_sp']['tmp_name'], $target_file);
                $hinh_sp = $target_file;
            } else {
                $hinh_sp = ""; //gán giá trị để lưu trong hình table san pham 
            }
            sanpham_them($ten_sp, $gia, $hinh_sp, $bestseller, $mota, $iddm);
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
                $ten_sp = $_POST['ten_sp'];
                $gia = $_POST['gia'];
                $mota = $_POST['mota'];
                $bestseller = $_POST['bestseller'];
                $iddm = $_POST['iddm'];
                $id = $_POST['id'];
                $hinh_sp = $_POST['hinh_sp'];
                if (isset($_FILES['hinh_sp']['name']) && ($_FILES['hinh_sp']['name']) != "") {
                    // xóa file hình cũ trong thư mục
                    if (file_exists($hinh_sp)) unlink($hinh_sp);
                    // up hinh mới
                    $target_dir = "layout/img/";
                    $target_file = $target_dir . basename($_FILES['hinh_sp']['name']);
                    move_uploaded_file($_FILES['hinh_sp']['tmp_name'], $target_file);
                    $hinh_sp = $target_file;
                }
            }
            udhanghoa($ten_sp, $hinh_sp, $gia, $bestseller, $mota, $iddm, $id);
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
        case 'binhluan':
            $showbl = load_bl(0);
            include 'view/quantri/binhluan.php';
            break;
        case 'chitietbinhluan':
            if (isset($_GET['idpro']) && ($_GET['idpro'] > 0)) {
                $idpro = $_GET['idpro'];
            }
            $showctbl = load_blct($idpro);
            include 'view/quantri/chitietbinhluan.php';
            break;
        case 'chitietbinhluanxoa':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                binh_luan_delete($id);
            }
            $showbl = load_bl(0);
            include 'view/quantri/binhluan.php';
            break;
        case 'exit':
            $showbl = load_bl(0);
            include 'view/quantri/binhluan.php';
            break;

        default:
            include 'admin.php';
            break;
    }
}