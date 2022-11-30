<?php include '../view/header.php'; ?>
<?php 
if (!isset($message)) { $message = ''; } 

$taikhoan = filter_input(INPUT_POST, 'id');
require_once('../model/database.php');
require_once('../model/sinhvien_db.php');
require_once('../model/user_db.php');
if(delete_sinhvien($taikhoan)) {
    if (delete_user($taikhoan)) {
        $message = 'Xoa thanh cong';
    }
    $message = 'Xoa user khong thanh cong';
}
else {
    $message = 'Xoa sinhvien khong thanh cong';
}
?>
<span class="error"><?php echo $message; ?></span><br>
<?php include '../view/footer.php'; ?>
