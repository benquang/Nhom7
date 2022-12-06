<?php include '../view/header.php'; ?>
<?php   
    require_once('model/database.php');
    require_once('model/giangvien_db.php');
    require_once('model/chuyennganh_db.php');
    
    if (!isset($taikhoan)) { $taikhoan = ''; } 
    if (!isset($pass)) { $pass = ''; } 
    if (!isset($hovaten)) { $hovaten = ''; } 
    if (!isset($cdkh)) { $cdkh = ''; } 
    if (!isset($chucvu)) { $chucvu = ''; } 

    $admin_url = $app_path . 'admin';
    $view_update_gv_url = $admin_url . '?action=update_gv';
    $view_regist_gv_url = $admin_url . '?action=register_gv';
?>
<div class="thanhtitle"  style="margin-bottom: 20px;">
 <div class="thanhtitle1">
   <a href="<?php echo $admin_url; ?>" class="thanhtitle2">Admin</a>
 </div>
 <div class="thanhtitle1">
    <span class="thanhtitle3"><a href="<?php echo $view_regist_gv_url;?>" style="color:#797f89">Giảng viên</a> / Đăng ký</span>
 </div>
</div>

<div class="addgv" >
 <div class="addgv1">
    <form action="." method="post">
        <input type="hidden" name="action" value="register_gv">
        <!--<div class="addgv_title" style="color: #d73d32">Đăng ký giảng viên mới</div>-->
        <div class="adgv2" style="margin-top:10px">
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
                <div class="addgv_tb1">Trưởng bộ môn</div>
                <input type="checkbox" name="is_truongbomon" style="width: 20px;height: 20px">
            </div>
        </div>
        <div class="adgv2">
            <div class="addgv_tb" style="width: 30%;">
                <div class="addgv_tb1" >Họ và tên</div>
                <input type="text" name="hovaten" value="<?php echo $hovaten; ?>" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 25%;">
                <div class="addgv_tb1" >CDKH</div>
                <input type="text" name="cdkh" value="<?php echo $cdkh; ?>" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 20%;">
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
            <div class="addgv_tb" style="width: 25%;">
                <div class="addgv_tb1" >Chức vụ</div>
                <input type="text" name="chucvu" value="<?php echo $chucvu; ?>" class="addgv_tb2">
            </div>
        </div>
        <div class="addgv_hangcuoi">
              <div class="addgv_message"><?php echo $_SESSION['message']; ?></div>
              <input type="submit" value="Add" class="addgv_button">
        </div>

    </form>
 </div>
 <div class="bang" style="margin-top:10px">
      <div class="bang1">
        <div class="bang_title">List giảng viên</div>
        <form action="." method="get" class="shop3" style="float:right;">
          <input type="hidden" name="action" value="find_gv">
          <input type="text" name="tukhoa" class="shop4 no-outline" placeholder="User hoặc họ và tên" style="font-size:17px">
          <input type="image" src="<?php echo $app_path ?>img/search_icon2.png" alt="Submit" class="shop5" value="">
        </form>
      </div>
      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 20%;">Tài khoản</div>
        <div class="bang_tencot_1" style="width: 15%;">Họ và tên</div>
        <div class="bang_tencot_1" style="width: 10%;">CDKH</div>
        <div class="bang_tencot_1" style="width: 20%;">Chuyên ngành</div>
        <div class="bang_tencot_1" style="width: 15%;">Chức vụ</div>
        <div class="bang_tencot_1" style="width: 10%;">Admin</div>
        <div class="bang_tencot_1" style="width: 10%;">Trưởng BM</div>

      </div>
      <?php
          $pag = 20;
          $num_page = filter_input(INPUT_GET, 'page');   
          if ($num_page == NULL) {
            $num_page = 1;
          }    

          if (!isset($giangviens)) {
            $giangviens = get_all_giangvien();
          } 
          else {
            $pag = count($giangviens); //liet ke het
          }

          for ($i = ($num_page * $pag) - $pag; $i < ($num_page * $pag) and $i < count($giangviens); $i++):
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
      <div class="pagina">
      <?php     if ($num_page == 1): ?>
        <a class="pagina_lui" 
        style="background-color: #0a426e; border-color: #0a426e; color:#fff"><?php echo $num_page;?></a>
          <?php     if ((count($giangviens)-$pag) > 0): ?>
            <a href="<?php echo $admin_url . '?action=register_gv&page=' . $num_page + 1; ?>" 
            class="pagina_lui"><?php echo $num_page + 1; ?></a>
            <a href="<?php echo $admin_url . '?action=register_gv&page=' .  (int)(count($giangviens)/$pag) ?>" class="pagina_lui">-></a>
          <?php endif; ?>
      <?php elseif ($num_page * $pag == count($giangviens) or count($giangviens) - $num_page * $pag < 0):?>
        <a href="<?php echo $admin_url . '?action=register_gv&page=1' ?>" class="pagina_lui"><-</a>
        <a href="<?php echo $admin_url . '?action=register_gv&page=' . $num_page - 1; ?>" class="pagina_lui"><?php echo $num_page - 1;?></a>
        <a style="background-color: #0a426e; border-color: #0a426e; color:#fff" class="pagina_lui"><?php echo $num_page; ?></a>
      <?php else:?>
        <a href="<?php echo $admin_url . '?action=register_gv&page=1' ?>" class="pagina_lui"><-</a>
        <a href="<?php echo $admin_url . '?action=register_gv&page=' . $num_page - 1; ?>"  class="pagina_lui"><?php echo $num_page - 1;?></a>
        <a class="pagina_lui" style="background-color: #0a426e; border-color: #0a426e; color:#fff"><?php echo $num_page; ?></a>
        <a href="<?php echo $admin_url . '?action=register_gv&page=' . $num_page + 1; ?>"  class="pagina_lui"><?php echo $num_page + 1; ?></a>
        <a href="<?php echo $admin_url . '?action=register_gv&page=' .  (int)(count($giangviens)/$pag) ?>" class="pagina_lui">-></a>
      <?php endif; ?>
      </div>

    </div>
</div>
<?php include '../view/footer.php'; ?>