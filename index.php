<?php
require_once('util/main.php');
//require_once('../util/valid_admin.php');

//model
require_once('model/user_db.php');
require_once('model/giangvien_db.php');
require_once('model/sinhvien_db.php');
require_once('model/loaidetai_db.php');
require_once('model/nganhdaotao_db.php');
require_once('model/chuyennganh_db.php');
require_once('model/ctdt_db.php');
require_once('model/doituong_db.php');
require_once('model/dotdangky_db.php');
require_once('model/chitietdetai_db.php');
require_once('model/sinhvienthuchien_db.php');



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

switch ($action) {
    case 'home':
        // Display the home page
        include('homeview.php');
        break;
    case 'view_thongbao':
        include 'view/thongbao.php';
        break;
    case 'view_danhmucdetai':
        include 'view/danhmucdetai.php';
        break;
    case 'view_danhsachdetai':
        include 'view/danhsachdetai.php';
        break;
    case 'view_chitietdetai':
        include 'view/chitietdetai.php';
        break;
    case 'register_detai':
        require_once('util/valid_user.php');
        if (isset($_SESSION['gv'])){
            redirect($app_path . 'giangvien?action=register_detai');
            break;
        }
        if (isset($_SESSION['sv'])){
            
        }
        break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}





?>

