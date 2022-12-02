<?php include '../view/header.php'; ?>
<?php   
    require_once('model/database.php');
    require_once('model/chuyennganh_db.php');
    if (!isset($taikhoan)) { $taikhoan = ''; } 
    if (!isset($pass)) { $pass = ''; } 
    if (!isset($hovaten)) { $hovaten = ''; } 
    if (!isset($ngaysinh)) { $ngaysinh = ''; } 
    if (!isset($lop)) { $lop = ''; } 
    if (!isset($tinchitichluy)) { $tinchitichluy = ''; } 

    if (!isset($message)) { $message = ''; } 

    $admin_url = $app_path . 'admin';
    $view_update_sv_url = $admin_url . '?action=update_sv';
?>
<div class="thanhtitle"  style="margin-bottom: 20px;">
 <div class="thanhtitle1">
   <a href="<?php echo $admin_url; ?>" class="thanhtitle2">Admin</a>
 </div>
 <div class="thanhtitle1">
    <span class="thanhtitle3">Admin / Dang ky sinh vien</span>
 </div>
</div>

<div class="addgv">
 <div class="addgv1">
    <form action="." method="post">
        <input type="hidden" name="action" value="register_sv">
        <div class="addgv_title">Dang ky sinh vien moi</div>
        <div class="adgv2">
            <div class="addgv_tb" style="width: 40%;">
                <div class="addgv_tb1" >User</div>
                <input type="text" name="taikhoan" value="<?php echo $taikhoan; ?>" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 30%;">
                <div class="addgv_tb1">Password</div>
                <input type="password" name="pass" class="addgv_tb2">
            </div>

        </div>
        <div class="adgv2">
            <div class="addgv_tb" style="width: 35%;">
                <div class="addgv_tb1" >Ho va ten</div>
                <input type="text" name="hovaten" value="<?php echo $hovaten; ?>" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 18%;">
                <div class="addgv_tb1" >Ngày sinh</div>
                <input type="date" name="ngaysinh" value="<?php echo $ngaysinh; ?>" style="height: 33px;font-size: 17px;">
            </div>
            <div class="addgv_tb" style="width: 10%;">
                <div class="addgv_tb1" >Giới tính</div>
                <select name="gioitinh" style="height: 36px;font-size: 17px;">
                  <option value="true">Nam</option>
                  <option value="false">Nu</option>
                </select>
            </div>
            <div class="addgv_tb" style="width: 12%;">
                <div class="addgv_tb1" >Đối tượng</div>
                <select name="doituong" style="height: 36px;font-size: 17px;">
                 <?php
                  require_once('model/database.php');
                  require_once('model/doituong_db.php');

                  $doituongs = get_all_doituong();
                  foreach ($doituongs as $doituong) :
                    $name = $doituong['doituong'];
                ?>
                <option value="<?php echo $name; ?>">
                    <?php echo $name; ?>
                </option>
                <?php endforeach; ?>
            </select>
            </div>
            <div class="addgv_tb" style="width: 25%;">
                <div class="addgv_tb1">Chương trình đào tạo</div>
                <select name="ctdt" style="height: 36px;font-size: 17px;">
                <?php
                 require_once('model/database.php');
                  require_once('model/ctdt_db.php');

                  $ctdts = get_all_ctdt();
                 foreach ($ctdts as $ctdt) :
                 $name = $ctdt['ctdt'];
                  ?>
                <option value="<?php echo $name; ?>">
                    <?php echo $name; ?>
                </option>
                <?php endforeach; ?>
                 </select>
            </div>
            </div>
            <div class="adgv2">
              <div class="addgv_tb" style="width: 35%;">
                <div class="addgv_tb1" >Lớp</div>
                <input type="text" name="lop" value="<?php echo $lop; ?>" class="addgv_tb2">
              </div>
              <div class="addgv_tb" style="width: 25%;">
                <div class="addgv_tb1" >Chuyên ngành</div>
                <select name="chuyennganh" style="height: 36px;font-size: 17px;">
                    <?php          
                      $chuyennganhs = get_all_chuyennganh();
                      foreach($chuyennganhs as $chuyennganh) :
                         $name = $chuyennganh['tenchuyennganh'];
                    ?>
                    <option value="<?php echo $name; ?>" >
                        <?php echo $name; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="addgv_tb" style="width: 30%;">
                <div class="addgv_tb1" >Tín chỉ tích lũy</div>
                <input type="text" name="tinchitichluy" value="<?php echo $hovaten; ?>" class="addgv_tb2">
              </div>

            </div>

        <div class="addgv_hangcuoi">
              <div class="addgv_message"><?php echo $message; ?></div>
              <input type="submit" value="Add" class="addgv_button">
        </div>

    </form>
 </div>
</div>
<?php include '../view/footer.php'; ?>