<?php include '../view/header.php'; ?>
<?php 
    if (!isset($taikhoan)) { $taikhoan = ''; } 
    if (!isset($message)) { $message = ''; } 

    $account_url = $app_path . 'account';
?>
<div class="thanhtitle"  style="margin-bottom: 20px;">
 <div class="thanhtitle1">
   <a href="<?php echo $account_url; ?>" class="thanhtitle2">Login</a>
 </div>
 <div class="thanhtitle1">
    <span class="thanhtitle3"><a href="<?php echo $view_regist_gv_url;?>" style="color:#797f89">Tài khoản</a> / Login</span>
 </div>
</div>

<div class="addgv" style="width:500px;">
  <div class="addgv1">
    <form action="." method="post">
        <input type="hidden" name="action" value="login">
        <!--<div class="addgv_title" style="color: #d73d32">Đăng ký giảng viên mới</div>-->
        <div class="adgv2" style="margin-top:10px">
            <div class="addgv_tb" style="width: 70%;">
                <div class="addgv_tb1" >User</div>
                <input type="text" name="taikhoan" value="<?php echo $taikhoan; ?>" class="addgv_tb2">
            </div>
        </div>
        <div class="adgv2">
            <div class="addgv_tb" style="width: 70%;">
                <div class="addgv_tb1">Password</div>
                <input type="password" name="pass" class="addgv_tb2">
            </div>
            <input type="submit" value="Login" class="addgv_button" style="margin-top:32px">
        </div>
        <div class="addgv_hangcuoi">
              <div class="addgv_message"><?php echo $message; ?></div>
        </div>
    </form>
 </div>
</div>
<?php include '../view/footer.php'; ?>