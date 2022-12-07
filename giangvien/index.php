<?php




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

    case 'register_detai':
        if ($action == filter_input(INPUT_POST, 'action')) {
            $id = filter_input(INPUT_POST, 'id');
            $tendetai = filter_input(INPUT_POST, 'tendetai');
            $muctieu = filter_input(INPUT_POST, 'muctieu');
            $yeucau = filter_input(INPUT_POST, 'yeucau');
            $sanpham = filter_input(INPUT_POST, 'sanpham');
            $chuthich = filter_input(INPUT_POST, 'chuthich');
            $dkkcn = filter_input(INPUT_POST, 'dkkcn');
            $chuyennganh = filter_input(INPUT_POST, 'chuyennganh');
            $soluongsv = filter_input(INPUT_POST, 'soluongsv');
            $trangthai = filter_input(INPUT_POST, 'trangthai');

            require_once('../model/database.php');
            require_once('../model/chitietdetai_db.php');
            add_detai($id, $tendetai, $muctieu, $yeucau, $sanpham, $chuthich, $dkkcn, $chuyennganh, $soluongsv, $trangthai);
        }
        break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}
