<?php include 'view/header.php'; ?>
<?php include 'view/sidebar.php'; ?>
<?php   
  $current_url = $app_path . '?action=view_thongtinsinhvien&page=';

?>
     <div class="bang" style="width:895px">
      <div class="bang1">
        <div class="bang_title">List sinh viên</div>
        <form action="." method="get" class="shop3" style="float:right;margin-top:10px">
          <input type="hidden" name="action" value="find_sv">
          <input type="text" name="tukhoa" class="shop4 no-outline" placeholder="User hoặc họ và tên" style="font-size:17px">
          <input type="image" src="<?php echo $app_path ?>img/search_icon2.png" alt="Submit" class="shop5" value="">
        </form>
      </div>
      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 20%;">Tài khoản</div>
        <div class="bang_tencot_1" style="width: 25%;">Họ và tên</div>
        <div class="bang_tencot_1" style="width: 10%;">Giới tính</div>
        <div class="bang_tencot_1" style="width: 10%;margin-left:55px">Lớp</div>
        <div class="bang_tencot_1" style="width: 25%;">Chuyên ngành</div>

      </div>
      <?php
          $pag = 5;
          $num_page = filter_input(INPUT_GET, 'page');   
          if ($num_page == NULL) {
            $num_page = 1;
          }   

          if (!isset($sinhviens)) {
            $sinhviens = get_all_sinhvien();
          } 
          else {
            $pag = count($sinhviens); //liet ke het
          }

          for ($i = ($num_page * $pag) - $pag; $i < ($num_page * $pag) and $i < count($sinhviens); $i++):
            //$view_one_sv_url = $view_update_sv_url . '&user=' . $sinhviens[$i]['user'];

      ?>
      <?php     if (fmod($i,2) == 0): ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <a href="<?php echo $view_one_sv_url; ?>" class="bang_hang_1" style="width: 20%;"><?php echo $sinhviens[$i]['user']; ?></a>
        <div class="bang_hang_1" style="width: 25%;"><?php echo $sinhviens[$i]['hovaten']; ?></div>
        <?php     if ($sinhviens[$i]['gioitinh'] == '1'): ?>
          <div class="bang_hang_1" style="width: 10%;">Nam</div>
        <?php else:?>
          <div class="bang_hang_1" style="width: 10%;">Nữ</div>
        <?php endif; ?>
        <div class="bang_hang_1" style="width: 10%;margin-left:55px"><?php echo $sinhviens[$i]['lop']; ?></div>
        <div class="bang_hang_1" style="width: 25%;"><?php echo $sinhviens[$i]['chuyennganh']; ?></div>

      </div>
      <?php else:?>
        <div class="bang_hang">
        <a href="<?php echo $view_one_sv_url; ?>" class="bang_hang_1" style="width: 20%;"><?php echo $sinhviens[$i]['user']; ?></a>
        <div class="bang_hang_1" style="width: 25%;"><?php echo $sinhviens[$i]['hovaten']; ?></div>
        <?php     if ($sinhviens[$i]['gioitinh'] == '1'): ?>
          <div class="bang_hang_1" style="width: 10%;">Nam</div>
        <?php else:?>
          <div class="bang_hang_1" style="width: 10%;">Nữ</div>
        <?php endif; ?>
        <div class="bang_hang_1" style="width: 10%;margin-left:55px"><?php echo $sinhviens[$i]['lop']; ?></div>
        <div class="bang_hang_1" style="width: 25%;"><?php echo $sinhviens[$i]['chuyennganh']; ?></div>

        </div>
      <?php endif; ?>

      <?php endfor; ?>
      
      <div class="pagina">
      <?php     if ($num_page == 1): ?>
        <a class="pagina_lui" 
        style="background-color: #0a426e; border-color: #0a426e; color:#fff"><?php echo $num_page;?></a>
          <?php     if ((count($sinhviens)-$pag) > 0): ?>
            <a href="<?php echo $current_url . $num_page + 1; ?>" 
            class="pagina_lui"><?php echo $num_page + 1; ?></a>
            <a href="<?php echo $current_url .  (int)(count($sinhviens)/$pag) ?>" class="pagina_lui">-></a>
          <?php endif; ?>
      <?php elseif ($num_page * $pag == count($sinhviens) or count($sinhviens) - $num_page * $pag < 0):?>
        <a href="<?php echo $current_url; ?>" class="pagina_lui"><-</a>
        <a href="<?php echo $current_url . $num_page - 1; ?>" class="pagina_lui"><?php echo $num_page - 1;?></a>
        <a style="background-color: #0a426e; border-color: #0a426e; color:#fff" class="pagina_lui"><?php echo $num_page; ?></a>
      <?php else:?>
        <a href="<?php echo $current_url; ?>" class="pagina_lui"><-</a>
        <a href="<?php echo $current_url . $num_page - 1; ?>"  class="pagina_lui"><?php echo $num_page - 1;?></a>
        <a class="pagina_lui" style="background-color: #0a426e; border-color: #0a426e; color:#fff"><?php echo $num_page; ?></a>
        <a href="<?php echo $current_url . $num_page + 1; ?>"  class="pagina_lui"><?php echo $num_page + 1; ?></a>
        <a href="<?php echo $current_url .  (int)(count($sinhviens)/$pag) ?>" class="pagina_lui">-></a>
      <?php endif; ?>
      </div>

    </div>

    

  </div>
  </div>
<?php include 'view/footer.php'; ?>