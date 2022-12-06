<?php
require_once('../util/main.php');
require_once('../model/user_db.php');

$_SESSION['message'] =null;
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action = 'homeview.php';
    }
}

switch ($action) {
    case 'home':
        include 'homeview.php';
        break;
    
    case 'login':
        if ($action == filter_input(INPUT_POST, 'action')){
            $taikhoan = filter_input(INPUT_POST, 'taikhoan');
            $pass = filter_input(INPUT_POST, 'pass');
            $user = check_taikhoan_pass($taikhoan,$pass);
            if ($user!=null)
            {
                $_SESSION['user'] = $user ;
                include 'homeview.php';
                break;
            }
            else $_SESSION['message'] = "Người dùng không tồn tại";

        }
        include 'account/login.php';
        break;
    case 'changePass':
        if ($_SESSION["user"] == null)
        {
            include 'account/login.php';
            break;
        }

        if ($action == filter_input(INPUT_POST, 'action'))
        {
            $taikhoan = $_SESSION["user"]["taikhoan"];
            $pass = filter_input(INPUT_POST, 'pass');
            $confirm_pass = filter_input(INPUT_POST, 'confirm_pass');

            if (strcmp($pass,$confirm_pass))
            {
                $_SESSION['message'] = "Mật khẩu xác nhận không đúng!!!";
                include 'account/changePass.php';
                break;
            }
            $is_success = change_password($taikhoan,$pass);
            if (!$is_success)
            {
                $_SESSION['message'] = "Thay đổi mật khẩu không thành công!";
            }

        }
        include 'account/changePass.php';
        break;
    case "logOut":
        $_SESSION['user'] = null;
        include 'homeview.php';
        break;
    
    default:
        display_error("Unknown account action: " . $action);
        break;

    
}
?>