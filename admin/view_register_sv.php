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
 <div class="addgv" style="width:1320px;margin-top:10px">
    <div class="bang" style="margin-top:10px">
      <div class="bang1">
        <div class="bang_title">List sinh vien</div>
        <form action="." method="get" class="shop3" style="float:right;">
          <input type="hidden" name="action" value="register_sv">
          <input type="text" name="tukhoa" class="shop4 no-outline" placeholder="Nhap tu khoa">
          <input type="image" src="<?php echo $app_path ?>img/search_icon2.png" alt="Submit" class="shop5" value="">
        </form>
      </div>
      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 20%;">Tài khoản</div>
        <div class="bang_tencot_1" style="width: 15%;">Họ và tên</div>
        <div class="bang_tencot_1" style="width: 9%;">Ngày sinh</div>
        <div class="bang_tencot_1" style="width: 7%;">Giới tính</div>
        <div class="bang_tencot_1" style="width: 8%;">Đối tượng</div>
        <div class="bang_tencot_1" style="width: 5%;">CTĐT</div>
        <div class="bang_tencot_1" style="width: 6%;">Lớp</div>
        <div class="bang_tencot_1" style="width: 15%;">Chuyên ngành</div>
        <div class="bang_tencot_1" style="width: 15%;">Tín chỉ tích lũy</div>


      </div>
      <?php
                require_once('model/database.php');
                require_once('model/giangvien_db.php');
            
                $sinhviens = get_all_sinhvien();
                for ($i = 0; $i < count($sinhviens); $i++):
                  $view_one_sv_url = $view_update_sv_url . '&user=' . $sinhviens[$i]['user'];

      ?>
      <?php     if (fmod($i,2) == 0): ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <a href="<?php echo $view_one_sv_url; ?>" class="bang_hang_1" style="width: 20%;"><?php echo $sinhviens[$i]['user']; ?></a>
        <div class="bang_hang_1" style="width: 15%;"><?php echo $sinhviens[$i]['hovaten']; ?></div>
        <div class="bang_hang_1" style="width: 9%;"><?php echo $sinhviens[$i]['ngaysinh']; ?></div>
        <?php     if ($sinhviens[$i]['gioitinh'] == '1'): ?>
          <div class="bang_hang_1" style="width: 7%;">Nam</div>
        <?php else:?>
          <div class="bang_hang_1" style="width: 7%;">Nu</div>
        <?php endif; ?>
        <div class="bang_hang_1" style="width: 8%;"><?php echo $sinhviens[$i]['doituong']; ?></div>
        <div class="bang_hang_1" style="width: 5%;"><?php echo $sinhviens[$i]['ctdt']; ?></div>
        <div class="bang_hang_1" style="width: 6%;"><?php echo $sinhviens[$i]['lop']; ?></div>
        <div class="bang_hang_1" style="width: 15%;"><?php echo $sinhviens[$i]['chuyennganh']; ?></div>
        <div class="bang_hang_1" style="width: 15%;"><?php echo $sinhviens[$i]['tinchitichluy']; ?></div>

      </div>
      <?php else:?>
        <div class="bang_hang">
        <a href="<?php echo $view_one_sv_url; ?>" class="bang_hang_1" style="width: 20%;"><?php echo $sinhviens[$i]['user']; ?></a>
        <div class="bang_hang_1" style="width: 15%;"><?php echo $sinhviens[$i]['hovaten']; ?></div>
        <div class="bang_hang_1" style="width: 9%;"><?php echo $sinhviens[$i]['ngaysinh']; ?></div>
        <?php     if ($sinhviens[$i]['gioitinh'] == '1'): ?>
          <div class="bang_hang_1" style="width: 7%;">Nam</div>
        <?php else:?>
          <div class="bang_hang_1" style="width: 7%;">Nu</div>
        <?php endif; ?>
        <div class="bang_hang_1" style="width: 8%;"><?php echo $sinhviens[$i]['doituong']; ?></div>
        <div class="bang_hang_1" style="width: 5%;"><?php echo $sinhviens[$i]['ctdt']; ?></div>
        <div class="bang_hang_1" style="width: 6%;"><?php echo $sinhviens[$i]['lop']; ?></div>
        <div class="bang_hang_1" style="width: 15%;"><?php echo $sinhviens[$i]['chuyennganh']; ?></div>
        <div class="bang_hang_1" style="width: 15%;"><?php echo $sinhviens[$i]['tinchitichluy']; ?></div>

      </div>
      <?php endif; ?>

      <?php endfor; ?>
    </div>
    </div>
<?php include '../view/footer.php'; ?>