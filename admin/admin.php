<?php
session_start();
ob_start();
/* include_once 'view/headerad.php'; */
include_once '../view/headerad.php';
include_once '../dao/user.php';
include_once '../dao/bill.php';
include_once '../dao/danhmuc.php';
include_once '../dao/sanpham.php';
include_once '../dao/binhluan.php';
include_once '../dao/pdo.php';
include_once '../dao/donhang.php';

if (!isset($_GET['pg'])) {
} else {
    switch ($_GET['pg']) {
        case 'login':
            //input
            if (isset($_POST["dangnhap"]) && ($_POST["dangnhap"])) {
                $phone = $_POST["phone"];
                $password = $_POST["password"];

                //Xử lý
                $kq = checkuser($phone, $password);
                if (is_array($kq) && (count($kq))  && (count($kq) > 0)) {
                    extract($kq);
                    if ($vaitro == 1) {
                        $_SESSION['s_user'] = $kq;

                        header('location: ./admin.php');

                        //} else if( $_SESSION['trang']=="sanphamchitiet"){
                        // header('location: index.php?pg=sanphamchitiet&id='. $_SESSION['idpro'].'#binhluan');

                    } else if ($vaitro == 0) {
                        $_SESSION['s_user'] = $kq;
                        header('location: index.php');
                    }
                    //output
                } else {
                    $tb = '';
                    $tb = "Tài khoản hoặc mật khẩu không tồn tại !";
                    $_SESSION['tb_dangnhap'] = $tb;
                    include 'view/login.php';
                }
            }
            break;

        case 'qldh':
            if (isset($_GET['id_us']) && ($_GET['id_us'] > 0)) {
                $id_us = $_GET['id_us'];
            }
            $showb = showb($id_us);
            include '../admin/quantri/qldh.php';


            break;

        case 'chitietlichsu':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $idbill = $_GET['id'];
                $showls = showw_ctlich($idbill);
            }
            include '../admin/quantri/chitietdh.php';
            break;
        case 'user':
            //Show khách hàng
            $showus = showus();
            include '../admin/quantri/khachhang.php';
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
            include '../admin/quantri/khachhang.php';
            break;
        case 'uduser':
            //Show khách hàng
            $showus = showus();
            include '../admin/quantri/udkhachhang.php';
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
            include '../admin/quantri/khachhang.php';
            break;
        case 'loai':
            //Show dm
            $showdm = danhmuc_select_all();
            include '../admin/quantri/danhmuc.php';
            break;
        case 'dmxoa':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                danhmuc_delete($id);
            }
            //Show danh muc
            $showdm = danhmuc_select_all();
            include '../admin/quantri/danhmuc.php';
            break;
        case 'dmthem':
            $ten = $_POST['ten'];
            $ma = $_POST['ma'];
            $kq = check_ten($ten);
            if (is_array($kq) && (count($kq))  && (count($kq) > 0)) {
                extract($kq);
                if ($ten = $_POST['ten']) {
                    echo 'Tên đã có trong danh mục';
                }
            } else {

                danhmuc_insert($ten, $ma);
            }


            //Show danh muc
            $showdm = danhmuc_select_all();
            include '../admin/quantri/danhmuc.php';
            break;
        case 'loaisua':
            //Show danh muc
            $showdm = danhmuc_select_all();
            include '../admin/quantri/uddanhmuc.php';
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
            include '../admin/quantri/danhmuc.php';
            break;
            // HANG HOA
        case 'sanpham':
            // lấy dữ liệu hiển thị cho select opp
            $showdm = danhmuc_select_all();
            $kq_op = showoption_spqt($showdm);
            //Show sp
            $showsp = show_sp();
            include '../admin/quantri/sanpham.php';
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
            include '../admin/quantri/sanpham.php';
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
            include '../admin/quantri/sanpham.php';
            break;

        case 'udsp':
            // lấy dữ liệu hiển thị cho select opp
            $showdm = danhmuc_select_all();
            $kq_op = showoption_spqt($showdm);
            //Show hàng hóa
            $showsp = show_sp();
            include '../admin/quantri/udsanpham.php';
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
                    $target_dir = "../layout/img/";
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
            include '../admin/quantri/sanpham.php';
            break;
        case 'logout':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                unset($_SESSION['s_user']);
            }
            header('location: ./index.php');
            break;
        case 'binhluan':
            $showbl = load_bl(0);
            include '../admin/quantri/binhluan.php';
            break;
        case 'chitietbinhluan':
            if (isset($_GET['idpro']) && ($_GET['idpro'] > 0)) {
                $idpro = $_GET['idpro'];
            }
            $showctbl = load_blct($idpro);
            include '../admin/quantri/chitietbinhluan.php';
            break;
        case 'chitietbinhluanxoa':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                binh_luan_delete($id);
            }
            $showbl = load_bl(0);
            include '../admin/quantri/binhluan.php';
            break;
        case 'chitietdh':
            include '../admin/quantri/chitietdh.php';
            break;
        case 'exit':
            $showbl = load_bl(0);
            include '../admin/quantri/binhluan.php';
            break;
         case 'thongke':
            $listthongke = loadall_thongke();
            include "admin/quantri/list.php";
            break;

        case 'bieudo':
                $listthongke = loadall_thongke();
                include "admin/quantri/bieudo.php";
            break;
        default:
            include 'admin.php';
            break;
    }
}
