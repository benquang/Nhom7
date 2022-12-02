<?php include '../view/header.php'; ?>
<?php   
    require_once('model/database.php');
    require_once('model/chuyennganh_db.php');
    if (!isset($taikhoan)) { $taikhoan = ''; } 
    if (!isset($pass)) { $pass = ''; } 
    if (!isset($hovaten)) { $hovaten = ''; } 
    if (!isset($cdkh)) { $cdkh = ''; } 
    if (!isset($chucvu)) { $chucvu = ''; } 

    if (!isset($message)) { $message = ''; } 

    $admin_url = $app_path . 'admin';
    $view_update_gv_url = $admin_url . '?action=update_gv';
?>
<div class="thanhtitle"  style="margin-bottom: 20px;">
 <div class="thanhtitle1">
   <a href="<?php echo $admin_url; ?>" class="thanhtitle2">Admin</a>
 </div>
 <div class="thanhtitle1">
    <span class="thanhtitle3">Admin / Dang ky giang vien</span>
 </div>
</div>

<div class="addgv">
 <div class="addgv1">
    <form action="." method="post">
        <input type="hidden" name="action" value="register_gv">
        <div class="addgv_title">Dang ky giang vien moi</div>
        <div class="adgv2">
            <div class="addgv_tb" style="width: 40%;">
                <div class="addgv_tb1" >User</div>
                <input type="text" name="taikhoan" value="<?php echo $taikhoan; ?>" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 30%;">
                <div class="addgv_tb1">Password</div>
                <input type="password" name="pass" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 10%;">
                <div class="addgv_tb1">Admin</div>
                <input type="checkbox" name="is_admin" style="width: 20px;height: 20px">
            </div>
            <div class="addgv_tb" style="width: 20%;">
                <div class="addgv_tb1">Truong bo mon</div>
                <input type="checkbox" name="is_truongbomon" style="width: 20px;height: 20px">
            </div>
        </div>
        <div class="adgv2">
            <div class="addgv_tb" style="width: 30%;">
                <div class="addgv_tb1" >Ho va ten</div>
                <input type="text" name="hovaten" value="<?php echo $hovaten; ?>" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 25%;">
                <div class="addgv_tb1" >CDKH</div>
                <input type="text" name="cdkh" value="<?php echo $cdkh; ?>" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 20%;">
                <div class="addgv_tb1" >Chuyen nganh</div>
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
            <div class="addgv_tb" style="width: 25%;">
                <div class="addgv_tb1" >Chuc vu</div>
                <input type="text" name="chucvu" value="<?php echo $chucvu; ?>" class="addgv_tb2">
            </div>
        </div>
        <div class="addgv_hangcuoi">
              <div class="addgv_message"><?php echo $message; ?></div>
              <input type="submit" value="Add" class="addgv_button">
        </div>

    </form>
 </div>
 <div class="bang">
      <div class="bang1">
        <div class="bang_title">List giang vien</div>

      </div>
      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 20%;">Tai khoan</div>
        <div class="bang_tencot_1" style="width: 15%;">Ho va ten</div>
        <div class="bang_tencot_1" style="width: 10%;">CDKH</div>
        <div class="bang_tencot_1" style="width: 20%;">Chuyen nganh</div>
        <div class="bang_tencot_1" style="width: 15%;">Chuc vu</div>
        <div class="bang_tencot_1" style="width: 10%;">Admin</div>
        <div class="bang_tencot_1" style="width: 10%;">Trưởng BM</div>

      </div>
      <?php
                require_once('model/database.php');
                require_once('model/giangvien_db.php');
            
                $giangviens = get_all_giangvien();
                for ($i = 0; $i < count($giangviens); $i++):
                  $view_one_gv_url = $view_update_gv_url . '&user=' . $giangviens[$i]['user'];

      ?>
      <?php     if (fmod($i,2) == 0): ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <a href="<?php echo $view_one_gv_url; ?>" class="bang_hang_1" style="width: 20%;"><?php echo $giangviens[$i]['user']; ?></a>
        <div class="bang_hang_1" style="width: 15%;"><?php echo $giangviens[$i]['hovaten']; ?></div>
        <div class="bang_hang_1" style="width: 10%;"><?php echo $giangviens[$i]['cdkh']; ?></div>
        <div class="bang_hang_1" style="width: 20%;"><?php echo $giangviens[$i]['chuyennganh']; ?></div>
        <div class="bang_hang_1" style="width: 15%;height:1px"><?php echo $giangviens[$i]['chucvu']; ?></div>
        <?php     if ($giangviens[$i]['is_admin'] == '1'): ?>
          <div class="bang_hang_1" style="width: 10%;"><input type="checkbox" style="width: 20px;height: 20px;margin-left:30px" checked disabled="disabled"></div>
        <?php else:?>
           <div class="bang_hang_1" style="width: 10%;"><input type="checkbox" style="width: 20px;height: 20px;margin-left:30px" disabled="disabled"></div>
        <?php endif; ?>

        <?php     if ($giangviens[$i]['is_truongbomon'] == '1'): ?>
          <div class="bang_hang_1" style="width: 10%;"><input type="checkbox" style="width: 20px;height: 20px;margin-left:40px" checked disabled="disabled"></div>
        <?php else:?>
          <div class="bang_hang_1" style="width: 10%;"><input type="checkbox" style="width: 20px;height: 20px;margin-left:40px" disabled="disabled"></div>
        <?php endif; ?>

      </div>
      <?php else:?>
        <div class="bang_hang">
        <a href="<?php echo $view_one_gv_url; ?>" class="bang_hang_1" style="width: 20%;"><?php echo $giangviens[$i]['user']; ?></a>
        <div class="bang_hang_1" style="width: 15%;"><?php echo $giangviens[$i]['hovaten']; ?></div>
        <div class="bang_hang_1" style="width: 10%;"><?php echo $giangviens[$i]['cdkh']; ?></div>
        <div class="bang_hang_1" style="width: 20%;"><?php echo $giangviens[$i]['chuyennganh']; ?></div>
        <div class="bang_hang_1" style="width: 15%;height:1px"><?php echo $giangviens[$i]['chucvu']; ?></div>
        <?php     if ($giangviens[$i]['is_admin'] == '1'): ?>
          <div class="bang_hang_1" style="width: 10%;"><input type="checkbox" style="width: 20px;height: 20px;margin-left:30px" checked disabled="disabled"></div>
        <?php else:?>
           <div class="bang_hang_1" style="width: 10%;"><input type="checkbox" style="width: 20px;height: 20px;margin-left:30px" disabled="disabled"></div>
        <?php endif; ?>
        
        <?php     if ($giangviens[$i]['is_truongbomon'] == '1'): ?>
          <div class="bang_hang_1" style="width: 10%;"><input type="checkbox" style="width: 20px;height: 20px;margin-left:40px" checked disabled="disabled"></div>
        <?php else:?>
          <div class="bang_hang_1" style="width: 10%;"><input type="checkbox" style="width: 20px;height: 20px;margin-left:40px" disabled="disabled"></div>
        <?php endif; ?>
      </div>
      <?php endif; ?>

      <?php endfor; ?>
    </div>
</div>
<?php include '../view/footer.php'; ?>