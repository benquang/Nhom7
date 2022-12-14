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
    case 'profile':
        if (isset($_SESSION['gv'])){
            redirect($app_path . 'giangvien?action=profile');
            break;
        }
        if (isset($_SESSION['sv'])){
            redirect($app_path . 'sinhvien?action=profile');
            break; 
        }
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
    case 'view_thongtingiangvien':
        include 'view/thongtingiangvien.php';
        break;
    case 'find_gv':  
        //GET
        $search = filter_input(INPUT_GET, 'tukhoa');
        if (!isset($search)) {
            $search = '';
        } 

        $giangviens = get_giangviens_by_search($search);
        include 'view/thongtingiangvien.php';
        break;
    case 'view_thongtinsinhvien':
        include 'view/thongtinsinhvien.php';
        break;
    case 'find_sv':  
        //GET
        $search = filter_input(INPUT_GET, 'tukhoa');
        if (!isset($search)) {
            $search = '';
        } 

        $sinhviens = get_sinhviens_by_search($search);
        include 'view/thongtinsinhvien.php';
        break;
    case 'register_detai':
        require_once('util/valid_user.php');
        if (isset($_SESSION['gv'])){
            redirect($app_path . 'giangvien?action=register_detai');
            break;
        }
        if (isset($_SESSION['sv'])){
            redirect($app_path . 'sinhvien?action=register_detai');
            break; 
        }
        break;
    case 'search_detai_by_chuyennganh':
            //GET
            $doituong = filter_input(INPUT_GET, 'doituong');
            $hocky = filter_input(INPUT_GET, 'hocky');
            $nienkhoa = filter_input(INPUT_GET, 'nienkhoa');
            $loaidetai = filter_input(INPUT_GET, 'loaidetai');

            $chuyennganh = filter_input(INPUT_GET, 'chuyennganh');
            if (!isset($chuyennganh)) {
                break;
            } 
            if ($chuyennganh == 'All') {
                redirect($app_path . '?action=view_danhsachdetai&doituong='.$doituong.'&hocky='.$hocky.'&nienkhoa='.$nienkhoa.'&loaidetai='.$loaidetai);
                break;
            } 
    
            $detais = get_all_detai_by_danhmuc_chuyennganh($loaidetai,$doituong,$hocky,$nienkhoa,$chuyennganh);
            include 'view/danhsachdetai.php';
            break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}





?>

