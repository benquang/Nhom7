<?php
require_once('../util/main.php');
require_once('../util/valid_gv.php');
require_once('../util/valid_truongbomon.php');

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

// Set up all possible fields to validate

switch ($action) {
    case 'home':
        include 'homeview.php';
        break;
    case 'phan_gv_phanbien':
        if ($action == filter_input(INPUT_POST, 'action')){
            //
            $id = filter_input(INPUT_POST, 'id');
            $gvphanbien = filter_input(INPUT_POST, 'gvphanbien');

            if ($gvphanbien == 'none'){
                include 'truongbomon/view_phan_gv_phanbien.php';
                break;
            }
            else {
                update_gv_phanbien($id,$gvphanbien);
                //thành công
                redirect($app_path . '?action=view_chitietdetai&id=' . $id);
            }

        }
        include 'truongbomon/view_phan_gv_phanbien.php';
        break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}