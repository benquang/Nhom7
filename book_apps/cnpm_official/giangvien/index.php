<?php
require_once('../util/main.php');
require_once('../util/valid_gv.php');

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
            //id tự động
            $last = last_id_detai();
            if ($last == NULL){
                $id = 1000;
            }
            else {
                $id = $last['id'] + 1;
            }

            $tendetai = filter_input(INPUT_POST, 'tendetai');
            $muctieu = filter_input(INPUT_POST, 'muctieu');
            $yeucau = filter_input(INPUT_POST, 'yeucau');
            $sanpham = filter_input(INPUT_POST, 'sanpham');
            $chuthich = filter_input(INPUT_POST, 'chuthich');
            $dkkcn = filter_input(INPUT_POST, 'dkkcn');
            $chuyennganh = filter_input(INPUT_POST, 'chuyennganh');
            $gvhuongdan = $_SESSION['user'];
            $soluongsv = filter_input(INPUT_POST, 'soluongsv');
            $trangthai = filter_input(INPUT_POST, 'trangthai');
            $ddk = filter_input(INPUT_POST, 'ddk');

            $ddk_doituong = filter_input(INPUT_POST, 'ddk_doituong');

            $sv1 = filter_input(INPUT_POST, 'sv1');
            $sv2 = filter_input(INPUT_POST, 'sv2');

            $au1 = is_sv_thuocdoituong($sv1,$ddk_doituong);
            $au2 = is_sv_thuocdoituong($sv2,$ddk_doituong);

            if ($sv1 != NULL and $sv2 != NULL and $sv1 == $sv2){ //trùng nhau
                $_SESSION['message'] = 'Nhập sinh viên không được trùng nhau';
                include 'giangvien/view_register_detai.php';
                break;
            }

            if ($sv1 != NULL){
                if (is_valid_taikhoan($sv1) == FALSE){ //ko ton tai sinh vien
                    $_SESSION['message'] = 'Sinh viên 1 không tồn tại';
                    include 'giangvien/view_register_detai.php';
                    break;
                }
                if ($au1 == FALSE){ //sv1 ko thuoc doituong
                    $_SESSION['message'] = 'Sinh viên 1 không thuộc đối tượng đăng ký, vui lòng nhập lại';
                    include 'giangvien/view_register_detai.php';
                    break;
                }
            }
            if ($sv2 != NULL){
                if (is_valid_taikhoan($sv2) == FALSE){ //ko ton tai sinh vien
                    $_SESSION['message'] = 'Sinh viên 2 không tồn tại';
                    include 'giangvien/view_register_detai.php';
                    break;
                }
                if ($au2 == FALSE){ //sv1 ko thuoc doituong
                    $_SESSION['message'] = 'Sinh viên 2 không thuộc đối tượng đăng ký, vui lòng nhập lại';
                    include 'giangvien/view_register_detai.php';
                    break;
                }
            }

            if ($dkkcn == 'false'){ //ko đc phép đki khác chuyên ngành
                $in1 = is_sv_thuocchuyennganh($sv1,$chuyennganh);
                $in2 = is_sv_thuocchuyennganh($sv2,$chuyennganh);

                if ($sv1 != NULL){
                    if ($in1 == FALSE){ //sv1 ko thuoc chuyen nganh
                        $_SESSION['message'] = 'Sinh viên 1 không thuộc chuyên ngành, vui lòng nhập lại';
                        include 'giangvien/view_register_detai.php';
                        break;
                    }
                }
                if ($sv2 != NULL){
                    if ($in2 == FALSE){ //sv1 ko thuoc doituong
                        $_SESSION['message'] = 'Sinh viên 2 không thuộc chuyên ngành, vui lòng nhập lại';
                        include 'giangvien/view_register_detai.php';
                        break;
                    }
                }

            }

            if ($soluongsv == '1' and $sv1 != NULL and $sv2 != NULL){//nhập số lượng 1 nhưng nhưng điền cả 2 sv
                $_SESSION['message'] = 'Số lượng không phù hợp, vui lòng nhập lại';
                include 'giangvien/view_register_detai.php';
                break;  
            }
            //thêm vào chi tiết đề tài
            add_detai($id, $tendetai, $muctieu, $yeucau, $sanpham, $chuthich, $dkkcn, $chuyennganh, $gvhuongdan, $soluongsv, $trangthai, $ddk);

            $is_truongnhom = filter_input(INPUT_POST, 'is_truongnhom');
            if ($sv1 != NULL and $sv2 != NULL and $is_truongnhom == NULL){ //nếu điền cả 2 sv mà k chọn trưởng nhóm
                $is_truongnhom = 'truongnhom1'; //sv1 là nhóm trưởng
            }
            if ($sv1 != NULL and $sv2 == NULL){ //điền sv 1 mà ko điền sv2 
                $is_truongnhom = 'truongnhom1';
            }
            if ($sv2 != NULL and $sv1 == NULL){ //điền sv 2 mà ko điền sv1 
                $is_truongnhom = 'truongnhom2';
            }

            if ($is_truongnhom == 'truongnhom1'){
                add_sinhvienthuchien($id,$sv1,'true');
                if ($sv2 != NULL){
                    add_sinhvienthuchien($id,$sv2,'false');
                }
            }
            if ($is_truongnhom == 'truongnhom2'){
                add_sinhvienthuchien($id,$sv2,'true');
                if ($sv1 != NULL){
                    add_sinhvienthuchien($id,$sv1,'false');
                }
            }

            //thành công
            redirect($app_path . '?action=view_danhmucdetai');

        }
        include 'giangvien/view_register_detai.php';
        break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}