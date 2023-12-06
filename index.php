<?php

session_start();
include 'dao/pdo.php';
include 'dao/sanpham.php';
include 'view/header.php';
include 'dao/danhmuc.php';
include 'dao/user.php';
include 'dao/donhang.php';
include 'dao/bill.php';

//data cho trang chu

$dssp_noibat = dssp_noibat(4);
$dssp_giamgia = dssp_giamgia(10);
$dssp_nhieuluotmua = dssp_nhieuluotmua(4);

/* $dssp_ao = dssp_ao(4);
$dssp_quan = dssp_quan(4);
$dssp_aokhoac = dssp_aokhoac(4); */


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

            $kyw = "";
            $titlepage = "";

            if (!isset($_GET['iddm'])) {
                $iddm = 0;
            } else {
                $iddm = $_GET['iddm'];
                $titlepage = get_name_dm($iddm);
            }

            //kiem tra co phai form search khong?
            if (isset($_POST["timkiem"])) {
                $kyw = $_POST["kyw"];
                $titlepage = "KẾT QUẢ TÌM KIẾM: " . $kyw;
            }
            //DANH MUC
            $dssp = get_dssp($kyw, $iddm);
            /*             $sanpham = sanpham();*/
            include 'view/sanpham.php';
            break;

            //dangky dangnhap
        case 'dangky':
            include "view/register.php";
            break;
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

            }
            $kq = check_taikhoan($username, $phone);
            if (is_array($kq) && (count($kq))  && (count($kq) > 0)) {
                extract($kq);
                if ($username = $_POST['username']) {
                    echo 'Tên đã có người đăng ký';
                    include "view/register.php";
                }
            } else {

                user_insert($ten, $username, $password, $phone);
                include "view/login.php";
            }
            //

            break;
            //chinh sua ho so
        case 'updateuser':
            if (isset($_POST["capnhat"]) && ($_POST["capnhat"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $vaitro = 0;
                $id_us = $_POST["id_us"];
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
                //Xử lý
                udmyacc($ten, $username, $phone, $email, $password, $vaitro, $hinh, $id_us);
            }
            include 'view/thongtintk_cf.php';
            break;
        case 'myaccount':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                include 'view/thongtintk.php';
            }
            break;

        case 'giohang':
            if (isset($_POST['dathang'])) {
                // Xử lý khi nhấn nút 'dathang'

                $hinh_sp = $_POST['hinh_sp'];
                $ten_sp = $_POST['ten_sp'];
                $gia = $_POST['gia'];
                $size = $_POST['size'];
                $idpro = $_POST['idpro'];
                $sol = $_POST['soluongInput'];

                // Kiểm tra xem giỏ hàng đã được khởi tạo chưa
                if (!isset($_SESSION['giohang'])) {
                    $_SESSION['giohang'] = array();
                }

                $productExists = false;

                foreach ($_SESSION['giohang'] as $index => $product) {
                    if ($product['ten_sp'] === $ten_sp) {
                        // Nếu sản phẩm đã tồn tại, tăng số lượng lên số lượng mới
                        $_SESSION['giohang'][$index]['sl'] += 1;
                        $productExists = true;
                        break;
                    }
                }
                $productExists = false;
                foreach ($_SESSION['giohang'] as $index => $product) {
                    if ($product['ten_sp'] === $ten_sp && $product['size'] === $size) {
                        $_SESSION['giohang'][$index]['sl'] += 1; // Tăng số lượng
                        $productExists = true;
                        break;
                    }
                }
                if (!$productExists) {
                    // Nếu sản phẩm chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
                    $_SESSION['giohang'][] = array(
                        'idpro' => $idpro,
                        'hinh_sp' => $hinh_sp,
                        'ten_sp' => $ten_sp,
                        'size' => $size,
                        'gia' => $gia,
                        'sl' => $sol // Số lượng sản phẩm đã chọn
                    );
                }
            }

            if (isset($_POST['muangay'])) {
                // Xử lý khi nhấn nút 'muangay'

                $hinh_sp = $_POST['hinh_sp'];
                $ten_sp = $_POST['ten_sp'];
                $gia = $_POST['gia'];
                $idpro = $_POST['idpro'];
                $size = $_POST['size'];
                $sl = $_POST['soluongInput']; // Lấy số lượng từ form

                // Kiểm tra xem giỏ hàng đã được khởi tạo chưa
                if (!isset($_SESSION['giohang'])) {
                    $_SESSION['giohang'] = array();
                }

                $productExists = false;

                foreach ($_SESSION['giohang'] as $index => $product) {
                    if ($product['ten_sp'] === $ten_sp) {
                        // Nếu sản phẩm đã tồn tại, tăng số lượng lên số lượng mới
                        $_SESSION['giohang'][$index]['sl'] += $sl;
                        $productExists = true;
                        break;
                    }
                }

                if (!$productExists) {
                    // Nếu sản phẩm chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
                    $_SESSION['giohang'][] = array(
                        'idpro' => $idpro,
                        'hinh_sp' => $hinh_sp,
                        'ten_sp' => $ten_sp,
                        'size' => $size,
                        'gia' => $gia,
                        'sl' => $sl // Số lượng sản phẩm đã chọn
                    );
                }
            }

            // Kiểm tra và include view tương ứng sau khi xử lý
            if (isset($_POST['dathang']) || isset($_POST['muangay'])) {
                if (isset($_POST['dathang'])) {
                    include 'view/cart.php';
                    break; // View after processing 'dathang'
                } elseif (isset($_POST['muangay'])) {
                    include 'view/bill.php';
                    break; // View after processing 'muangay'
                }
            }


        case 'newgiohang':
            if (isset($_POST['dathang'])) {
                $index = $_POST['dathang'];
                if (isset($_SESSION['giohang'][$index])) {
                    $_SESSION['giohang'][$index]['sl'] += 1;
                }
            }

            if (!isset($_SESSION['giohang'])) {
                $_SESSION['giohang'] = array();
            }

            if (isset($_POST['xoa'])) {
                $index = $_POST['xoa'];
                if (isset($_SESSION['giohang'][$index])) {
                    unset($_SESSION['giohang'][$index]);
                    $_SESSION['giohang'] = array_values($_SESSION['giohang']);
                }
            }


            if (isset($_POST['xoatatca'])) {
                unset($_SESSION['giohang']);
                $_SESSION['giohang'] = array();
            }

            if (isset($_POST['dathang'])) {
                $hinh_sp = $_POST['hinh_sp'];
                $ten_sp = $_POST['ten_sp'];
                $gia = $_POST['gia'];
                $idpro = $_POST['idpro'];
                $sol = $_POST['soluongInput'];
                $productExists = false;
                foreach ($_SESSION['giohang'] as $index => $product) {
                    if ($product['ten_sp'] === $ten_sp) {
                        $_SESSION['giohang'][$index]['sl'] += 1;
                        $productExists = true;
                        break;
                    }
                }


                if (!$productExists) {
                    $_SESSION['giohang'][] = array(
                        'idpro' => $idpro,
                        'hinh_sp' => $hinh_sp,
                        'ten_sp' => $ten_sp,
                        'gia' => $gia,
                        'sl' =>  $sol
                    );
                }
            }

            include 'view/cart.php';
            break;
        case 'thanhtoan':
            if (isset($_POST['donhang'])) {
            }
            include "view/bill.php";
            break;

            /* case 'muangay':
            if (isset($_POST['dathang'])) {
                $hinh_sp = $_POST['hinh_sp'];
                $ten_sp = $_POST['ten_sp'];
                $gia = $_POST['gia'];
                $idpro = $_POST['idpro'];
$productExists = false;
                foreach ($_SESSION['giohang'] as $index => $product) {
                    if (!$productExists) {
                        $_SESSION['giohang'][] = array(
                            'idpro' => $idpro,
                            'hinh_sp' => $hinh_sp,
                            'ten_sp' => $ten_sp,
                            'gia' => $gia,
                            'sl' => $sl
                        );
                    }
                }
            }

            include "view/bill.php";
            break; */
        case 'donhang':
            if (isset($_POST['thanhtoan'])) {
                $ten = $_POST["ten"];
                $phone = $_POST["phone"];
                $diachi = $_POST["diachi"];
                $email = $_POST["email"];
                $nguoinhan_ten = $_POST["nguoinhan_ten"];
                $nguoinhan_diachi = $_POST["nguoinhan_diachi"];
                $nguoinhan_dienthoai = $_POST["nguoinhan_dienthoai"];
                $total = total();

                // insert or retrieve user ID
                if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                    $id_us = $_SESSION['s_user']['id_us'];
                } else {
                    $id_us = user_insert_id($ten, $diachi, $phone, $email);
                }

                // insert order and get order ID
                $idbill = bill_insert_id($id_us, $nguoinhan_ten, $nguoinhan_diachi, $nguoinhan_dienthoai, $ten, $diachi, $email, $phone, $total);

                // insert products into order and order history
                foreach ($_SESSION['giohang'] as $index => $value) {
                    extract($value);
                    cart_insert($ten, $hinh, $gia,$size,$sl,  $idpro, $idbill);
                    // Add the following line to insert into order history
                    /* history_insert($ten_sp, $hinh_sp, $gia, $idpro, $idbill, $id_us); */
                }

                // clear shopping cart
                unset($_SESSION['giohang']);
                $_SESSION['giohang'] = array();
            }

            include "view/bill_ct.php";
            break;
        case 'thanhtoanvnpay':
            include 'view/vnpay.php';
            break;
        case 'thanhtoanmomo':
            include 'view/xulythanhtoanmomo.php';
            break;
        case 'forgot':
            include 'view/forgot_password.php';
            break;

        case 'reset':
            include 'view/reset_password.php';
            break;

        case 'lichsumh':
            if (isset($_GET['id_us']) && ($_GET['id_us'] > 0)) {
                $id_us = $_GET['id_us'];
            }

            $showls = showw_lich($id_us);
            include 'view/lichsumh.php';
            break;
        case 'chitietlichsu':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $idbill = $_GET['id'];
                $showls = showw_ctlich($idbill);
            }


            include 'view/chitietlichsu.php';
            break;

        case 'lienhe':
            include 'view/lienhe.php';
            break;
        case 'gioithieu':
            include 'view/gioithieu.php';
            break;
        
        default:

            include "view/home.php";
            break;
    }
}
include 'view/footer.php';
