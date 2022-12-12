<?php include '../view/header.php'; ?>
<?php include '../view/sidebar.php'; ?>
<?php  
  $chitietdetai_url = $app_path . '?action=view_chitietdetai';
  if (!isset($message)) { $message = ''; } 

?>
    <div class="bang" style="width:78%">
      <?php
      $sv = get_one_sinhvien($_SESSION['user']);
      $dotdangky = get_all_ddk_hieuluc_sv($sv['doituong']); 
      if ($dotdangky == NULL): //ko co đợt đăng kỳ hiện thời cho đối tượng sinh viên hiện tại
      ?>
      <div class="bang1" style="background-color: #f5f5f5;margin-top:5px">
      <div class="bang_title" style="color:#0d0d1f;width:95%">Hiện không nằm trong thời gian đăng ký</div>
        <!--<a class="bang_addgv">Add more</a>-->
      </div>
      <?php else:?>

      <div class="bang1" style="background-color: #f5f5f5;margin-top:5px;padding-left:10px">
        <div class="bang_hang_1" style="width: 25%;text-align:center;background-color:#0a426e;
             line-height:30px;color:#fff;margin-right:10px;margin-top:10px;border-radius: 2px;font-weight:700">Cùng chuyên ngành</div>
        <div class="bang_hang_1" style="width: 31%;font-size:20px"><?php echo $sv['chuyennganh']; ?></div>
        <div class="bang_hang_1" style="width: 40%;font-size:20px;float: right;text-align:right;padding-right:15px"><?php echo $dotdangky['loaidetai']; ?> - <?php echo $dotdangky['doituong']; ?></div>
        <!--<a class="bang_addgv">Add more</a>-->
      </div>

      <div class="bang_tencot" style="margin-top:10px">
        <div class="bang_tencot_1" style="width: 10%;">Id</div>
        <div class="bang_tencot_1" style="width: 45%;">Tên đề tài</div>
        <div class="bang_tencot_1" style="width: 25%;margin-left:30px">GV hướng dẫn</div>
        <div class="bang_tencot_1" style="width: 10%;margin-left:30px">Đăng ký</div>
      </div>

      <form action="." method="post">
      <input type="hidden" name="action" value="register_detai">
      <?php 
        $detais_cungchuyennganh = get_all_detai_by_dotdangky_cungchuyennganh($dotdangky['id'], $sv['chuyennganh']);
        foreach ($detais_cungchuyennganh as $detai):
          $gv = get_one_giangvien($detai['gvhuongdan']);
          $count = count_svthuchien_by_detai($detai['id']);
          if ($count == NULL or ($count['count'] != NULL and $count['count'] < $detai['soluongsv'])): //chưa full?> 
            <div class="bang_hang">
            <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $detai['id']; ?></a>
            <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:45%">
              <?php echo $detai['tendetai']; ?></a>
            <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:25%;margin-left:30px">
              <?php echo $gv['hovaten']; ?></a>
              <input type="radio" name="dangky" value="<?php echo $detai['id']; ?>" style="width: 20px;height: 20px;margin-left:50px;margin-top:14px">
          </div>
          <?php else:?>
            <div class="bang_hang" style="background-color: #f5f5f5">
            <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $detai['id']; ?></a>
            <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:45%">
              <?php echo $detai['tendetai']; ?></a>
            <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:25%;margin-left:30px">
              <?php echo $gv['hovaten']; ?></a>
          </div>
        <?php endif;?>

      <?php endforeach; ?>

      <div class="bang1" style="background-color: #f5f5f5;margin-top:15px;padding-left:10px">
        <div class="bang_hang_1" style="width: 25%;text-align:center;background-color:#0a426e;
             line-height:30px;color:#fff;margin-right:10px;margin-top:10px;border-radius: 2px;font-weight:700">Khác chuyên ngành</div>
        <div class="bang_hang_1" style="width: 40%;font-size:20px;float: right;text-align:right;padding-right:15px"><?php echo $dotdangky['loaidetai']; ?> - <?php echo $dotdangky['doituong']; ?></div>
        <!--<a class="bang_addgv">Add more</a>-->
      </div>

      <div class="bang_tencot" style="margin-top:10px">
        <div class="bang_tencot_1" style="width: 10%;">Id</div>
        <div class="bang_tencot_1" style="width: 28%;">Tên đề tài</div>
        <div class="bang_tencot_1" style="width: 22%;margin-left:10px">Chuyên ngành</div>
        <div class="bang_tencot_1" style="width: 25%;margin-left:20px">GV hướng dẫn</div>
        <div class="bang_tencot_1" style="width: 8%;margin-left:30px">Đăng ký</div>
      </div>

      <?php 
        $detais_khacchuyennganh = get_all_detai_by_dotdangky_khacchuyennganh($dotdangky['id'], $sv['chuyennganh']);
        foreach ($detais_khacchuyennganh as $detai):
          $gv = get_one_giangvien($detai['gvhuongdan']);
          $count = count_svthuchien_by_detai($detai['id']);
          if ($count == NULL or ($count['count'] != NULL and $count['count'] < $detai['soluongsv'])): //chưa full?> 
            <div class="bang_hang">
            <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $detai['id']; ?></a>
            <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:28%;margin-left:10px">
              <?php echo $detai['tendetai']; ?></a>
            <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:22%">
              <?php echo $detai['chuyennganh']; ?></a>
            <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:25%;margin-left:20px">
              <?php echo $gv['hovaten']; ?></a>
              <input type="radio" name="dangky" value="<?php echo $detai['id']; ?>" style="width: 20px;height: 20px;margin-left:50px;margin-top:14px">
          </div>
          <?php else:?>
            <div class="bang_hang" style="background-color: #f5f5f5">
            <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $detai['id']; ?></a>
            <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:45%">
              <?php echo $detai['tendetai']; ?></a>
            <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:25%;margin-left:30px">
              <?php echo $detai['gvhuongdan']; ?></a>
          </div>
        <?php endif;?>

      <?php endforeach; ?>

        <div class="addgv_hangcuoi">
              <div class="addgv_message"><?php echo $message; ?></div>
              <input type="submit" value="Đăng ký" class="addgv_button" style="background-color:#d3232a">
        </div>

      </form>
      <?php endif; ?>

      <!--<div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 30%;">Tai khoan</div>
        <div class="bang_tencot_1">Ho va ten</div>
        <div class="bang_tencot_1" style="width: 10%;">CDKH</div>
        <div class="bang_tencot_1" style="width: 20%;">Chuyen nganh</div>
        <div class="bang_tencot_1">Chuc vu</div>
      </div> -->



    </div>

  </div>
  </div>
<?php include '../view/footer.php'; ?>