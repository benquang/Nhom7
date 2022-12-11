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
      ?>
      <div class="bang1">
        <div class="bang_title" style="width:58%"><?php echo $loaidetai; ?> - <?php echo $doituong; ?> - Học kỳ <?php echo $hocky; ?> (<?php echo $nienkhoa; ?>)</div>
        <select name="chuyennganh" style="height: 36px;font-size: 17px;margin-top:15px;float:right">
                   <option value="All" >
                        All
                    </option>
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

      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 10%;">Id</div>
        <div class="bang_tencot_1" style="width: 55%;">Tên đề tài</div>
        <div class="bang_tencot_1" style="width: 30%;margin-left:30px">GV hướng dẫn</div>
      </div>
      <?php 

        $detais = get_all_detai_by_danhmuc($loaidetai,$doituong,$hocky,$nienkhoa);

        for ($i = 0; $i < count($detais); $i++):
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

      </div>

    </div>

    

  </div>
  </div>
<?php include 'view/footer.php'; ?>