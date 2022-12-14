<?php
require_once('../util/main.php');

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


//xác minh nhóm trưởng
require_once('../util/valid_truongnhom.php');

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
    case 'nopbaocao':
        if ($action == filter_input(INPUT_POST, 'action')){
            //
            $id = filter_input(INPUT_POST, 'id');
            $file = filter_input(INPUT_POST, 'file');

            if ($file != NULL){
                //update file
                update_file_baocao($id,$file);
                redirect($app_path . 'truongnhom?action=nopbaocao&id=' . $id);
                break;
            }

        }
        include 'truongnhom/view_nopbaocao.php';
        break;
    case 'delete_file_baocao':
        if ($action == filter_input(INPUT_POST, 'action')){
            //
            $id = filter_input(INPUT_POST, 'id');

            //set file = empty
            update_file_baocao($id,'');
            redirect($app_path . 'truongnhom?action=nopbaocao&id=' . $id);

        }
        include 'truongnhom/view_nopbaocao.php';
        break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}