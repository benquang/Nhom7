<?php
require_once('../util/main.php');
require_once('model/user_db.php');
require_once('model/giangvien_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action = 'view_register_gv';
        //if (isset($_SESSION['user'])) {
        //    $action = 'view_account';
        //}
    }
}

// Set up all possible fields to validate

switch ($action) {
    case 'view_register_gv':
        // Clear user data  
        include 'view_register_gv.php';
        break;
    case 'register_gv':
        //not to get this action
        if ($action == filter_input(INPUT_GET, 'action')){
            include 'view_register_gv.php';
            break;
        }
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
        
        //kiem tra tai khoan co ton tai
        if (is_valid_taikhoan($taikhoan)) {
            $message = 'Tai khoan da ton tai';
            include 'admin/view_register_gv.php';
            break;
        }
        
        //them tai khoan vao database
        add_user($taikhoan,$password,$is_admin,$is_gv,$is_sv,$is_truongbomon);
        add_giangvien($taikhoan,$hovaten,$cdkh,$chuyennganh,$chucvu);
        $message = 'Dang ky thanh cong';
        include 'admin/view_register_gv.php';

        break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}
?>