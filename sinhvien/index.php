<?php
require_once('../util/main.php');
require_once('../util/valid_sv.php');

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
    case 'profile':
        include 'profile.php';
        break;
    case 'register_detai':
        if ($action == filter_input(INPUT_POST, 'action')){
            //lấy id đề tài được chọn
            $dangky = filter_input(INPUT_POST, 'dangky');
            $message = '';
            $sv = $_SESSION['user'];

            if ($dangky === NULL) { //ko chọn đề tài nào
                $message = 'Vui lòng chọn đề tài';
                include 'sinhvien/view_register_detai.php';
                break;  
            }

            $is_co_de_tai = get_all_sinhvienthuchien_by_sinhvien($sv);
            if($is_co_de_tai != NULL){//sinh viên đã có đề tài
                //xóa sinh viên khỏi đề tài của sv đó
                delete_sinhvienthuchien_by_sinhvien($sv);
                //lấy sinh viên còn lại
                //$svconlai = get_sinhvienconlai($dangky);
                //set quyền nhóm trưởng cho sv còn lại
                //update_sinhvienthuchienconlai($svconlai['sinhvien']);
            }


            //lấy user hiện tại

            //check lại lần nữa trước khi đăng ký
            //$count = count_svthuchien_by_detai($dangky);
            /*if ($count != NULL){ //đã có sinh viên đăng ký nhanh hơn (có thể là vài giây)
                $message = 'Đề tài đã có sinh viên đăng ký';
                include 'sinhvien/view_register_detai.php';
                break; 
            }*/
            $count = count_svthuchien_by_detai_istruongnhom($dangky);
            if ($count != NULL){ //đã có nhóm trưởng
                add_sinhvienthuchien($dangky,$sv,'false');
                $message = 'Đăng ký thành công';
            }
            else{
                add_sinhvienthuchien($dangky,$sv,'true');
                $message = 'Đăng ký thành công';
            }

        }
        include 'sinhvien/view_register_detai.php';
        break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}