<?php include 'view/header.php'; ?>
<?php include 'view/sidebar.php'; ?>
<?php   
  $chitietdetai_url = $app_path . '?action=view_chitietdetai';

?>
      <div class="bang" style="width: 895px; margin-bottom: 15px">
      <?php
        $doituong = filter_input(INPUT_GET, 'doituong');
        $hocky = filter_input(INPUT_GET, 'hocky');
        $nienkhoa = filter_input(INPUT_GET, 'nienkhoa');
        $loaidetai = filter_input(INPUT_GET, 'loaidetai');

        $current_url = $app_path . '?action=view_danhsachdetai&doituong=' . $doituong . '&hocky=' . $hocky . '&nienkhoa=' . $nienkhoa . '&loaidetai=' . $loaidetai . '&page=';

      ?>
      <div class="bang1">
        <div class="bang_title" style="width:58%"><?php echo $loaidetai; ?> - <?php echo $doituong; ?> - Học kỳ <?php echo $hocky; ?> (<?php echo $nienkhoa; ?>)</div>
        <form action="." method="get">
        <input type="hidden" name="action" value="search_detai_by_chuyennganh">
        <input type="hidden" name="doituong" value="<?php echo $doituong; ?>">
        <input type="hidden" name="hocky" value="<?php echo $hocky; ?>">
        <input type="hidden" name="nienkhoa" value="<?php echo $nienkhoa; ?>">
        <input type="hidden" name="loaidetai" value="<?php echo $loaidetai; ?>">

        <select name="chuyennganh" style="height: 36px;font-size: 17px;margin-top:15px;margin-left:50px">
            <option value="All" >
                All
            </option>
            <?php          
              $chuyennganhs = get_all_chuyennganh();
              foreach($chuyennganhs as $chuyennganh) :
                  $name = $chuyennganh['tenchuyennganh'];
            ?>
            <?php if ($name == filter_input(INPUT_GET, 'chuyennganh')): ?>
              <option value="<?php echo $name; ?>" selected>
                <?php echo $name; ?>
              </option>
            <?php else: ?>
              <option value="<?php echo $name; ?>" >
                <?php echo $name; ?>
              </option>
            <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Get" class="addgv_button" style="background-color:#d3232a;width:10%;margin-top:12px">
        <form>
      </div>

      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 10%;">Id</div>
        <div class="bang_tencot_1" style="width: 55%;">Tên đề tài</div>
        <div class="bang_tencot_1" style="width: 30%;margin-left:30px">GV hướng dẫn</div>
      </div>
      <?php 
        $pag = 5;
        $num_page = filter_input(INPUT_GET, 'page');   
        if ($num_page == NULL) {
          $num_page = 1;
        }  

        if (!isset($detais)) {
          $detais = get_all_detai_by_danhmuc($loaidetai,$doituong,$hocky,$nienkhoa);
        } 
        else {
          $pag = count($detais); //liet ke het
        }


        for ($i = ($num_page * $pag) - $pag; $i < ($num_page * $pag) and $i < count($detais); $i++):
          $gv = get_one_giangvien($detais[$i]['gvhuongdan']);
          if (fmod($i,2) == 0): 
      ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $detais[$i]['id']; ?></a>
        <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
          <?php echo $detais[$i]['tendetai']; ?></a>
        <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:30%;margin-left:30px">
          <?php echo $gv['hovaten']; ?></a>
      </div>
      <?php else:?>
        <div class="bang_hang">
        <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $detais[$i]['id']; ?></a>
        <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
          <?php echo $detais[$i]['tendetai']; ?></a>
        <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:30%;margin-left:30px">
          <?php echo $gv['hovaten']; ?></a>
      </div>
      <?php endif; ?>
      <?php endfor; ?>

      <div class="pagina">
      <?php     if ($num_page == 1): ?>
        <a class="pagina_lui" 
        style="background-color: #0a426e; border-color: #0a426e; color:#fff"><?php echo $num_page;?></a>
          <?php     if ((count($detais)-$pag) > 0): ?>
            <a href="<?php echo $current_url . $num_page + 1; ?>" 
            class="pagina_lui"><?php echo $num_page + 1; ?></a>
            <a href="<?php echo $current_url .  (int)(count($detais)/$pag) ?>" class="pagina_lui">-></a>
          <?php endif; ?>
      <?php elseif ($num_page * $pag == count($detais) or count($detais) - $num_page * $pag < 0):?>
        <a href="<?php echo $current_url; ?>" class="pagina_lui"><-</a>
        <a href="<?php echo $current_url . $num_page - 1; ?>" class="pagina_lui"><?php echo $num_page - 1;?></a>
        <a style="background-color: #0a426e; border-color: #0a426e; color:#fff" class="pagina_lui"><?php echo $num_page; ?></a>
      <?php else:?>
        <a href="<?php echo $current_url; ?>" class="pagina_lui"><-</a>
        <a href="<?php echo $current_url . $num_page - 1; ?>"  class="pagina_lui"><?php echo $num_page - 1;?></a>
        <a class="pagina_lui" style="background-color: #0a426e; border-color: #0a426e; color:#fff"><?php echo $num_page; ?></a>
        <a href="<?php echo $current_url . $num_page + 1; ?>"  class="pagina_lui"><?php echo $num_page + 1; ?></a>
        <a href="<?php echo $current_url .  (int)(count($detais)/$pag) ?>" class="pagina_lui">-></a>
      <?php endif; ?>
      </div>

      </div>

    </div>

    

  </div>
  </div>
<?php include 'view/footer.php'; ?>