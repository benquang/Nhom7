<?php
require_once('../util/main.php');
require_once('../util/valid_admin.php');

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
        include 'admin/home.php';
        break;
    case 'register_gv':
        if ($action == filter_input(INPUT_POST, 'action')){ //POST
            //user
            $taikhoan = filter_input(INPUT_POST, 'taikhoan');
            $pass = filter_input(INPUT_POST, 'pass');

            $is_admin = filter_input(INPUT_POST, 'is_admin');
            if (isset($is_admin)) {
                $is_admin = 'true';
            } else {
                $is_admin = 'false';
            }

            $is_truongbomon = filter_input(INPUT_POST, 'is_truongbomon');
            if (isset($is_truongbomon)) {
                $is_truongbomon = 'true';
            } else {
                $is_truongbomon = 'false';
            }

            $is_gv = 'true';
            $is_sv = 'false';
        
            //giangvien
            $hovaten = filter_input(INPUT_POST, 'hovaten');
            $cdkh = filter_input(INPUT_POST, 'cdkh');
            $chuyennganh = filter_input(INPUT_POST, 'chuyennganh');
            $chucvu = filter_input(INPUT_POST, 'chucvu');

            //user phai unique
            if (is_valid_taikhoan($taikhoan)) {
                $message = 'Tài khoản đã tồn tại *';
                include 'admin/view_register_gv.php';
                break;
            }
            //password not empty
            if ($pass == ''){
                $message = 'Password không được rỗng *';
                include 'admin/view_register_gv.php';
                break;
            }
            //hovaten not empty
            if ($hovaten == ''){
                $message = 'Họ và tên không được rỗng *';
                include 'admin/view_register_gv.php';
                break;
            }

            //add user rồi tới giảng viên
            if(add_user($taikhoan,$pass,$is_admin,$is_gv,$is_sv,$is_truongbomon)) {
                if(add_giangvien($taikhoan,$hovaten,$cdkh,$chuyennganh,$chucvu)){
                    $message = 'Thêm thành công !';
                    include 'admin/view_register_gv.php';
                    break;
                } else {
                    $message = 'Thêm giảng viên không thành công *';
                    include 'admin/view_register_gv.php';
                    break;
                }
            }else {
                $message = 'Thêm không thành công *';
                include 'admin/view_register_gv.php';
                break;
            }
        }
        //GET
        include 'admin/view_register_gv.php';
        break;
    case 'update_gv':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $taikhoan = filter_input(INPUT_POST, 'taikhoan');
            //$pass = filter_input(INPUT_POST, 'pass');     

            $is_admin = filter_input(INPUT_POST, 'is_admin');
            if (isset($is_admin)) {
                $is_admin = 'true';
            } else {
                $is_admin = 'false';
            }

            $is_truongbomon = filter_input(INPUT_POST, 'is_truongbomon');
            if (isset($is_truongbomon)) {
                $is_truongbomon = 'true';
            } else {
                $is_truongbomon = 'false';
            }


            //lấy para từ post
            $hovaten = filter_input(INPUT_POST, 'hovaten');
            $cdkh = filter_input(INPUT_POST, 'cdkh');
            $chuyennganh = filter_input(INPUT_POST, 'chuyennganh');
            $chucvu = filter_input(INPUT_POST, 'chucvu');

            //đổi thông tin
            update_priveledge($taikhoan,$is_admin,$is_truongbomon);
            update_giangvien($taikhoan,$hovaten,$cdkh,$chuyennganh,$chucvu);

            //neu update thanh cong
            redirect($app_path . 'admin/?action=register_gv');

        }
        
        $user = filter_input(INPUT_GET, 'user');        
        $giangvien = get_one_giangvien($user); 

        include 'admin/view_update_gv.php';
        break;
    case 'delete_gv':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $taikhoan = filter_input(INPUT_POST, 'taikhoan');

            delete_giangvien($taikhoan);
            delete_user($taikhoan);

            //neu update thanh cong
            redirect($app_path . 'admin/?action=register_gv');
        }

        include 'admin/view_update_sv.php';
        break;
    case 'find_gv':  
        //GET
        $search = filter_input(INPUT_GET, 'tukhoa');
        if (!isset($search)) {
            $search = '';
        } 

        $giangviens = get_giangviens_by_search($search);
        include 'admin/view_register_gv.php';
        break;

    case 'register_sv':
        if ($action == filter_input(INPUT_POST, 'action')) {
            //user
            $taikhoan = filter_input(INPUT_POST, 'taikhoan');
            $password = filter_input(INPUT_POST, 'pass');
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

            if (add_user($taikhoan, $password, $is_admin, $is_gv, $is_sv, $is_truongbomon)) {
                if (add_sinhvien($taikhoan, $hovaten, $ngaysinh, $gioitinh, $doituong, $ctdt, $lop, $chuyennganh, $tinchitichluy)) {
                    $message = 'Dang ky thanh cong';
                    include 'admin/view_register_sv.php';
                    break;
                } else {
                    $message = 'add sinh vien khong thanh cong';
                    include 'admin/view_register_sv.php';
                    break;
                }
            } else {
                $message = 'add user khong thanh cong';
                include 'admin/view_register_sv.php';
                break;
            }
        }
        include 'admin/view_register_sv.php';
        break;
    case 'update_sv':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $taikhoan = filter_input(INPUT_POST, 'taikhoan');
            //$pass = filter_input(INPUT_POST, 'pass');     

            //lấy para từ post
            $hovaten = filter_input(INPUT_POST, 'hovaten');
            $ngaysinh = filter_input(INPUT_POST, 'ngaysinh');
            $gioitinh = filter_input(INPUT_POST, 'gioitinh');
            $doituong = filter_input(INPUT_POST, 'doituong');
            $ctdt = filter_input(INPUT_POST, 'ctdt');
            $lop = filter_input(INPUT_POST, 'lop');
            $chuyennganh = filter_input(INPUT_POST, 'chuyennganh');
            $tinchitichluy = filter_input(INPUT_POST, 'tinchitichluy');

            //đổi thông tin
            update_sinhvien($taikhoan,$hovaten,$ngaysinh,$gioitinh,$doituong,$ctdt,$lop,$chuyennganh,$tinchitichluy);
            
            //update thanh cong
            redirect($app_path . 'admin/?action=register_sv');
        }

        $user = filter_input(INPUT_GET, 'user');         
        $sinhvien = get_one_sinhvien($user); 

        include 'admin/view_update_sv.php';
        break;
    case 'delete_sv':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $taikhoan = filter_input(INPUT_POST, 'taikhoan');

            delete_sinhvien($taikhoan);
            delete_user($taikhoan);

            //update thanh cong
            redirect($app_path . 'admin/?action=register_sv');
        }

        include 'admin/view_update_sv.php';
        break;
    case 'find_sv':  
            //GET
            $search = filter_input(INPUT_GET, 'tukhoa');
            if (!isset($search)) {
                $search = '';
            } 
    
            $sinhviens = get_sinhviens_by_search($search);
            include 'admin/view_register_sv.php';
            break;
    
    //DANH MUC
    case 'add_loaidetai':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $loaidetai = filter_input(INPUT_POST, 'loaidetai');
            $mota = filter_input(INPUT_POST, 'mota');

            add_loaidetai($loaidetai,$mota);

        }
        redirect($app_path . 'admin');
        break;
    case 'update_loaidetai':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $id = filter_input(INPUT_POST, 'id');
            $ghichu = filter_input(INPUT_POST, 'ghichu');

            update_loaidetai($id,$ghichu);
            redirect($app_path . 'admin');
        }
        include 'admin/view_loaidetai.php';
        break;
    case 'delete_loaidetai':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $id = filter_input(INPUT_POST, 'id');

            delete_loaidetai($id);
            redirect($app_path . 'admin');
        }
        include 'admin/view_loaidetai.php';
        break;
    case 'add_nganhdaotao':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $tennganh = filter_input(INPUT_POST, 'tennganh');
            $mota = filter_input(INPUT_POST, 'mota');

            add_nganhdaotao($tennganh,$mota);

        }
        redirect($app_path . 'admin');
        break;
    case 'update_nganhdaotao':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $id = filter_input(INPUT_POST, 'id');
            $ghichu = filter_input(INPUT_POST, 'ghichu');

            update_loaidetai($id,$ghichu);
            redirect($app_path . 'admin');
        }
        include 'admin/view_nganhdaotao.php';
        break;
    case 'delete_nganhdaotao':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $id = filter_input(INPUT_POST, 'id');

            delete_loaidetai($id);
            redirect($app_path . 'admin');
        }
        include 'admin/view_nganhdaotao.php';
        break;
    //chuyennganh
    case 'add_chuyennganh':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $tenchuyennganh = filter_input(INPUT_POST, 'tenchuyennganh');
            $mota = filter_input(INPUT_POST, 'mota');

            add_chuyennganh($tenchuyennganh,$mota);

        }
        redirect($app_path . 'admin');
        break;
    case 'update_chuyennganh':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $tenchuyennganh = filter_input(INPUT_POST, 'tenchuyennganh');
            $mota = filter_input(INPUT_POST, 'mota');

            update_chuyennganh($tenchuyennganh,$mota);
            redirect($app_path . 'admin');
        }
        include 'admin/view_chuyennganh.php';
        break;
    case 'delete_chuyennganh':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $tenchuyennganh = filter_input(INPUT_POST, 'tenchuyennganh');

            delete_chuyennganh($tenchuyennganh);
            redirect($app_path . 'admin');
        }
        include 'admin/view_loaidetai.php';
        break;
    case 'add_ctdt':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $ctdt = filter_input(INPUT_POST, 'ctdt');
            $nganhdaotao = filter_input(INPUT_POST, 'nganhdaotao');

            add_ctdt($ctdt,$nganhdaotao);

        }
        redirect($app_path . 'admin');
        break;
    case 'update_ctdt':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $id = filter_input(INPUT_POST, 'id');
            $nganhdaotao = filter_input(INPUT_POST, 'nganhdaotao');

            update_ctdt($id,$nganhdaotao);
            redirect($app_path . 'admin');
        }
        include 'admin/view_ctdt.php';
        break;
    case 'delete_ctdt':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $id = filter_input(INPUT_POST, 'id');

            delete_ctdt($id);
            redirect($app_path . 'admin');
        }
        include 'admin/view_ctdt.php';
        break;
    case 'add_doituong':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $doituong = filter_input(INPUT_POST, 'doituong');
            $nienkhoa = filter_input(INPUT_POST, 'nienkhoa');

            add_doituong($doituong,$nienkhoa);

        }
        redirect($app_path . 'admin');
        break;
    case 'update_doituong':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $id = filter_input(INPUT_POST, 'id');
            $nienkhoa = filter_input(INPUT_POST, 'nienkhoa');

            update_doituong($id,$nienkhoa);
            redirect($app_path . 'admin');
        }
        include 'admin/view_doituong.php';
        break;
    case 'delete_doituong':
        if ($action == filter_input(INPUT_POST, 'action')){
            //user
            $id = filter_input(INPUT_POST, 'id');

            delete_doituong($id);
            redirect($app_path . 'admin');
        }
        include 'admin/view_doituong.php';
        break;
    
    //dotdangky
    case 'register_ddk':
        if ($action == filter_input(INPUT_POST, 'action')){
            //id tự động
            $last = last_id_ddk();
            if ($last == NULL){
                $id = 100;
            }
            else {
                $id = $last['id'] + 1;
            }

            $batdau = filter_input(INPUT_POST, 'batdau');
            $ketthuc = filter_input(INPUT_POST, 'ketthuc');

            $hocky = filter_input(INPUT_POST, 'hocky');
            $nienkhoa = filter_input(INPUT_POST, 'nienkhoa');
            $hinhthuc = filter_input(INPUT_POST, 'hinhthuc');
            $loaidetai = filter_input(INPUT_POST, 'loaidetai');

            $file = filter_input(INPUT_POST, 'file');
            $title = filter_input(INPUT_POST, 'title');
            $status = filter_input(INPUT_POST, 'status');
            $hinhthuc = filter_input(INPUT_POST, 'hinhthuc');

            //
            $doituong = filter_input(INPUT_POST, 'doituong');

            //add thanh cong
            add_ddk($id, $batdau, $ketthuc, $hocky, $nienkhoa, $loaidetai, $file, $title, $status, $hinhthuc);

            //add đối tượng
            add_ddk_doituong($id, $doituong);
            //var_dump($doituongs);
            /*foreach($doituongs as $doituong):
                $input = filter_input(INPUT_POST, $doituong['doituong']);
                if (isset($input)){
                    $input = $doituong['doituong'];
                    add_ddk_doituong($id, $input);
                }
            endforeach;   */

            redirect($app_path . 'admin');
        }
        include 'admin/view_register_ddk.php';
        break;
    
    case 'update_ddk':
        if ($action == filter_input(INPUT_POST, 'action')){
            //id
            $id = filter_input(INPUT_POST, 'id');
            $batdau = filter_input(INPUT_POST, 'batdau');
            $ketthuc = filter_input(INPUT_POST, 'ketthuc');

            $hocky = filter_input(INPUT_POST, 'hocky');
            $nienkhoa = filter_input(INPUT_POST, 'nienkhoa');
            $hinhthuc = filter_input(INPUT_POST, 'hinhthuc');
            $loaidetai = filter_input(INPUT_POST, 'loaidetai');

            $file = filter_input(INPUT_POST, 'file');
            $title = filter_input(INPUT_POST, 'title');
            $status = filter_input(INPUT_POST, 'status');
            $hinhthuc = filter_input(INPUT_POST, 'hinhthuc');

            //
            $doituong = filter_input(INPUT_POST, 'doituong');
            update_ddk($id, $batdau, $ketthuc, $hocky, $nienkhoa, $loaidetai, $file, $title, $status, $hinhthuc);
            //update đối tượng
            update_ddk_doituong($id,$doituong);

            redirect($app_path . 'admin?action=register_ddk');
        }

        include 'admin/view_update_ddk.php';
        break;
    case 'delete_ddk':
        if ($action == filter_input(INPUT_POST, 'action')){
            //id
            $id = filter_input(INPUT_POST, 'id');

            //xóa trong dotdangky_doituong trước
            delete_ddk_doituong($id);
            //xóa dotdangky
            delete_ddk($id);

            redirect($app_path . 'admin?action=register_ddk'); 
        }

        include 'admin/view_update_ddk.php';
        break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}
?>