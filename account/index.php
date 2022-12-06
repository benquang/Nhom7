<?php
require_once('../util/main.php');
require_once('model/user_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action = 'login';
    }
}

switch ($action) {
    case 'home':
        include 'homeview.php';
        break;
    
    case 'login':
        if ($action == filter_input(INPUT_POST, 'action')){
            //
            $taikhoan = filter_input(INPUT_POST, 'taikhoan');
            $pass = filter_input(INPUT_POST, 'pass');
            $user = check_taikhoan_pass($taikhoan,$pass);
            if ($user != NULL)
            {
                $_SESSION['user'] = $user['taikhoan'];

                //is_admin
                if ($user['is_admin'] == '1') {
                    $_SESSION['admin'] = $user['is_admin'];
                }

                //is_gv
                if ($user['is_gv'] == '1') {
                    $_SESSION['gv'] = $user['is_gv'];
                }

                //is_truongbomon
                if ($user['is_truongbomon'] == '1') {
                    $_SESSION['tbm'] = $user['is_truongbomon'];
                }

                //is_sv
                if ($user['is_sv'] == '1') {
                    $_SESSION['sv'] = $user['is_sv'];
                }

                //chuyen toi trang admin neu la admin
                if (isset($_SESSION['admin'])){
                    redirect($app_path . 'admin');
                }
                redirect($app_path);
                break;
            }
            else {
                $_SESSION['message'] = "Ten dang nhap hoac mat khau khong hop le";
            }
        }
        include 'account/view_login.php';
        break;

    case 'logout':
        //$_SESSION['user'] = null;
        //xoa session['user']
        unset($_SESSION['user']);
        redirect($app_path);
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
    
    default:
        display_error("Unknown account action: " . $action);
        break;

    
}
?>