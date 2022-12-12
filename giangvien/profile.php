<?php include '../view/header.php'; ?>
<?php   
  $chitietdetai_url = $app_path . '?action=view_chitietdetai';
  $phangvphanvien_url = $app_path . 'truongbomon?action=phan_gv_phanbien';
  if (!isset($message)) { $message = ''; } 

?>
<div class="thanhtitle"  style="margin-bottom: 20px;">
 <div class="thanhtitle1">
   <a class="thanhtitle2">Giảng viên</a>
 </div>
 <div class="thanhtitle1">
    <span class="thanhtitle3">Trang cá nhân</span>
 </div>
</div>

<?php 
  $detais = get_all_detai_by_gvhuongdan($_SESSION['user']);
  $gv = get_one_giangvien($_SESSION['user']);

?>
<div class="addgv" >
 <div class="addgv1">
    <div style="width:100px;height:250px;display:block; border:1px solid #797f89;width:190px;height:250px;margin-top:15px;margin-left:10px;float:left"></div>
    <div class="addgv_tb" style="width: 30%;margin-top:15px;margin-left:15px">
        <div class="addgv_tb1" >Họ và tên:</div>
        <input type="text" name="hovaten" value="<?php echo $gv['hovaten']; ?>" class="addgv_tb2" readonly style="border:0px;font-size:20px">
    </div>
    <div class="addgv_tb" style="width: 10%;margin-top:15px;margin-left:15px">
        <div class="addgv_tb1" >CDKH:</div>
        <input type="text" name="hovaten" value="<?php echo $gv['cdkh']; ?>" class="addgv_tb2" readonly style="border:0px;font-size:20px">
    </div>
    <div class="addgv_tb" style="width: 20%;margin-top:15px;margin-left:120px">
        <div class="addgv_tb1" >Chức vụ:</div>
        <input type="text" name="hovaten" value="<?php echo $gv['chucvu']; ?>" class="addgv_tb2" readonly style="border:0px;font-size:20px">
    </div>
    <div class="addgv_tb" style="width: 30%;margin-top:15px;margin-left:15px">
        <div class="addgv_tb1" >Chuyên ngành:</div>
        <input type="text" name="hovaten" value="<?php echo $gv['chuyennganh']; ?>" class="addgv_tb2" readonly style="border:0px;font-size:20px">
    </div>

  </div>
 <div class="bang" style="margin-top:10px">
      <div class="bang1">
        <div class="bang_title">Đề tài</div>
      </div>
      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 10%;">ID</div>
        <div class="bang_tencot_1" style="width: 65%;">Tên đề tài</div>
        <div class="bang_tencot_1" style="width: 10%;">Đối tượng</div>
        <div class="bang_tencot_1" style="width: 8%;">Số lượng</div>
      </div>
      <?php
      for ($i = 0; $i < count($detais); $i++):
        $count = count_svthuchien_by_detai($detais[$i]['id']);
        if ($count == NULL){
          $count_svthuchien = 0;
        }
        else {
          $count_svthuchien = $count['count'];
        }

        if (fmod($i,2) == 0): 
      ?>
      <form action="." method="post">
      <input type="hidden" name="action" value="delete_detai">

      <div class="bang_hang">
        <a href="<?php echo $chitietdetai_url; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $detais[$i]['id']?></a>
        <a href="<?php echo $phangvphanvien_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="width: 65%;color: #0a426e"><?php echo $detais[$i]['tendetai']?></a>
        <a href="<?php echo $phangvphanvien_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $detais[$i]['doituong']?></a>
        <a href="<?php echo $phangvphanvien_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="width: 8%;"><?php echo $count_svthuchien; ?>/<?php echo $detais[$i]['soluongsv']; ?></a>
        <input type="radio" name="id_detai" value="<?php echo $detais[$i]['id']; ?>" style="width: 20px;height: 20px;margin-left:10px;margin-top:14px">
      </div>
      <?php else: ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <a href="<?php echo $chitietdetai_url; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $detais[$i]['id']?></a>
        <a href="<?php echo $phangvphanvien_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="width: 65%;color: #0a426e"><?php echo $detais[$i]['tendetai']?></a>
        <a href="<?php echo $phangvphanvien_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $detais[$i]['doituong']?></a>
        <a href="<?php echo $phangvphanvien_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="width: 8%;"><?php echo $count_svthuchien; ?>/<?php echo $detais[$i]['soluongsv']; ?></a>
        <input type="radio" name="id_detai" value="<?php echo $detais[$i]['id']; ?>" style="width: 20px;height: 20px;margin-left:10px;margin-top:14px">
      </div>
      <?php endif; ?>
      <?php endfor; ?>
      <div class="addgv_hangcuoi">
              <div class="addgv_message"><?php echo $message; ?></div>
              <input type="submit" value="Delete" class="addgv_button">
        </div>
      </form>

    </div>
</div>
