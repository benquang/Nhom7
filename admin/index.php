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
        $action = 'register_gv';
        //if (isset($_SESSION['user'])) {
        //    $action = 'view_account';
        //}
    }
}

// Set up all possible fields to validate

switch ($action) {

    case 'view_sv':
        include 'admin/view_view_sv.php';
        break;

    case 'register_sv':
        if ($action == filter_input(INPUT_POST, 'action')){
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
          
                        
            if(add_user($taikhoan,$password,$is_admin,$is_gv,$is_sv,$is_truongbomon)) {
                if(add_sinhvien($taikhoan,$hovaten,$ngaysinh,$gioitinh,$doituong,$ctdt,$lop,$chuyennganh,$tinchitichluy)){
                    $message = 'Dang ky thanh cong';
                } else {
                    $message = 'add sinh vien khong thanh cong';
                    include 'admin/view_register_sv.php';
                    break;
                }
            }else {
                $message = 'add user khong thanh cong';
                include 'admin/view_register_sv.php';
                break;
            }
        
        }
        include 'admin/view_register_sv.php';
        break;
    case 'register_gv':  //this is POST
        //not to get this action, just POST
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $taikhoan = filter_input(INPUT_POST, 'taikhoan');
            $password = filter_input(INPUT_POST, 'password');
            $is_admin = 'false';
            $is_gv = 'true';
            $is_sv = 'false';
            $is_truongbomon = 'false';
            //giangvien
            $hovaten = filter_input(INPUT_POST, 'hovaten');
            $cdkh = filter_input(INPUT_POST, 'cdkh');
            $chuyennganh = filter_input(INPUT_POST, 'chuyennganh');
            $chucvu = filter_input(INPUT_POST, 'chucvu');
            $message = '';

            if (is_valid_taikhoan($taikhoan)) {
                $message = 'Tai khoan da ton tai';
                include 'admin/view_register_gv.php';
                break;
            }

            if ($password == ''){
                $message = 'Password ko duoc rong';
                include 'admin/view_register_gv.php';
                break;
            }

            if ($hovaten == ''){
                $message = 'Ho va ten ko duoc rong';
                include 'admin/view_register_gv.php';
                break;
            }

            if(add_user($taikhoan,$password,$is_admin,$is_gv,$is_sv,$is_truongbomon)) {
                if(add_giangvien($taikhoan,$hovaten,$cdkh,$chuyennganh,$chucvu)){
                    $message = 'Dang ky thanh cong';
                } else {
                    $message = 'add giang vien khong thanh cong';
                    include 'admin/view_register_gv.php';
                    break;
                }
            }else {
                $message = 'add user khong thanh cong';
                include 'admin/view_register_gv.php';
                break;
            }
        }
        include 'admin/view_register_gv.php';
        break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}
?>