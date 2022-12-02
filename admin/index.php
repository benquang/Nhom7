<?php
require_once('../util/main.php');
require_once('model/user_db.php');
require_once('model/giangvien_db.php');
require_once('model/sinhvien_db.php');

//get both get and post 
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action = 'home';
        //if (isset($_SESSION['user'])) {
        //    $action = 'view_account';
        //}
    }
}

// Set up all possible fields to validate

switch ($action) {
    case 'home':
        include 'admin/home.php';
        break;
    case 'register_gv':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $taikhoan = filter_input(INPUT_POST, 'taikhoan');
            $pass = filter_input(INPUT_POST, 'pass');

            $is_admin = filter_input(INPUT_POST, 'is_admin');
            if (isset($is_admin)) {
                $is_admin = 'true';
            } else {
                $is_admin = 'false';
            }

            $is_truongbomon = filter_input(INPUT_POST, 'is_truongbomon');
            if (isset($is_truongbomon)) {
                $is_truongbomon = 'true';
            } else {
                $is_truongbomon = 'false';
            }

            $is_gv = 'true';
            $is_sv = 'false';
        
            //giangvien
            $hovaten = filter_input(INPUT_POST, 'hovaten');
            $cdkh = filter_input(INPUT_POST, 'cdkh');
            $chuyennganh = filter_input(INPUT_POST, 'chuyennganh');
            $chucvu = filter_input(INPUT_POST, 'chucvu');
            $message = '';

            //user phai unique
            if (is_valid_taikhoan($taikhoan)) {
                $message = 'Tài khoản đã tồn tại *';
                include 'admin/view_register_gv.php';
                break;
            }
            //password not empty
            if ($pass == ''){
                $message = 'Password không được rỗng *';
                include 'admin/view_register_gv.php';
                break;
            }
            //hovaten not empty
            if ($hovaten == ''){
                $message = 'Họ và tên không được rỗng *';
                include 'admin/view_register_gv.php';
                break;
            }

            //add user rồi tới giảng viên
            if(add_user($taikhoan,$pass,$is_admin,$is_gv,$is_sv,$is_truongbomon)) {
                if(add_giangvien($taikhoan,$hovaten,$cdkh,$chuyennganh,$chucvu)){
                    $message = 'Thêm thành công !';
                } else {
                    $message = 'Thêm giảng viên không thành công *';
                    include 'admin/view_register_gv.php';
                    break;
                }
            }else {
                $message = 'Thêm không thành công *';
                include 'admin/view_register_gv.php';
                break;
            }


        }
        include 'admin/view_register_gv.php';
        break;
    case 'update_gv':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $taikhoan = filter_input(INPUT_POST, 'taikhoan');
            $pass = filter_input(INPUT_POST, 'pass');     

            $is_admin = filter_input(INPUT_POST, 'is_admin');
            if (isset($is_admin)) {
                $is_admin = 'true';
            } else {
                $is_admin = 'false';
            }

            $is_truongbomon = filter_input(INPUT_POST, 'is_truongbomon');
            if (isset($is_truongbomon)) {
                $is_truongbomon = 'true';
            } else {
                $is_truongbomon = 'false';
            }


            //lấy para từ post
            $hovaten = filter_input(INPUT_POST, 'hovaten');
            $cdkh = filter_input(INPUT_POST, 'cdkh');
            $chuyennganh = filter_input(INPUT_POST, 'chuyennganh');
            $chucvu = filter_input(INPUT_POST, 'chucvu');

            //đổi thông tin
            if (update_priveledge($taikhoan,$is_admin,$is_truongbomon)) {
                if(update_giangvien($taikhoan,$hovaten,$cdkh,$chuyennganh,$chucvu)){
                    $message = 'Cập nhật thành công !';
                    include 'admin/view_update_gv.php';
                    break;
                } else {
                    $message = 'Cập nhật thất bại !';
                    include 'admin/view_update_gv.php';
                    break;
                }
            } else {
                $message = 'Sửa quyền thất bại !';
                include 'admin/view_update_gv.php';
                break;
            }

        }

        include 'admin/view_update_gv.php';
        break;
        
    case 'view_update_sv':
        if ($action == filter_input(INPUT_POST, 'action')) {
            $idd = filter_input(INPUT_POST, 'id');
        }
        include 'admin/view_update_sv.php.php';
        break;
    case 'view_sv':
        $thangsinhvien = get_mot_thang_sinhvien('test1@gmail.com');
        include 'admin/view_view_sv.php';
        break;
    case 'register_sv':
        if ($action == filter_input(INPUT_POST, 'action')) {
            //user
            $taikhoan = filter_input(INPUT_POST, 'taikhoan');
            $password = filter_input(INPUT_POST, 'password');
            $is_admin = 'false';
            $is_gv = 'false';
            $is_sv = 'true';
            $is_truongbomon = 'false';



            //ttsinhvien
            $hovaten = filter_input(INPUT_POST, 'hovaten');
            $ngaysinh = filter_input(INPUT_POST, 'ngaysinh');
            $gioitinh = filter_input(INPUT_POST, 'gioitinh');
            $doituong = filter_input(INPUT_POST, 'doituong');
            $ctdt = filter_input(INPUT_POST, 'ctdt');
            $lop = filter_input(INPUT_POST, 'lop');
            $chuyennganh = filter_input(INPUT_POST, 'chuyennganh');
            $tinchitichluy = filter_input(INPUT_POST, 'tinchitichluy');

            if (is_valid_taikhoan($taikhoan)) {
                $message = 'Tai khoan da ton tai';
                include 'admin/view_register_sv.php';
                break;
            }


            if (add_user($taikhoan, $password, $is_admin, $is_gv, $is_sv, $is_truongbomon)) {
                if (add_sinhvien($taikhoan, $hovaten, $ngaysinh, $gioitinh, $doituong, $ctdt, $lop, $chuyennganh, $tinchitichluy)) {
                    $message = 'Dang ky thanh cong';
                    include 'admin/view_register_sv.php';
                    break;
                } else {
                    $message = 'add sinh vien khong thanh cong';
                    include 'admin/view_register_sv.php';
                    break;
                }
            } else {
                $message = 'add user khong thanh cong';
                include 'admin/view_register_sv.php';
                break;
            }
        }
        include 'admin/view_register_sv.php';
        break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}
?>