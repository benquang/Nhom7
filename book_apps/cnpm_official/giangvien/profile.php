<?php include '../view/header.php'; ?>
<?php   
  $chitietdetai_url = $app_path . '?action=view_chitietdetai';
  $phangvphanvien_url = $app_path . 'truongbomon?action=phan_gv_phanbien';

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

?>
<div class="addgv" >
 <div class="addgv1">
    <div style="width:100px;height:250px;display:block; border:1px solid #797f89;width:190px;height:250px;margin-top:15px;margin-left:10px;float:left"></div>
    <div class="addgv_tb" style="width: 30%;margin-top:15px;margin-left:15px">
        <div class="addgv_tb1" >Họ và tên:</div>
        <input type="text" name="hovaten" value="Nguyễn Thị Thanh Vân" class="addgv_tb2" readonly style="border:0px;font-size:20px">
    </div>
    <div class="addgv_tb" style="width: 10%;margin-top:15px;margin-left:15px">
        <div class="addgv_tb1" >CDKH:</div>
        <input type="text" name="hovaten" value="GVC, ThS" class="addgv_tb2" readonly style="border:0px;font-size:20px">
    </div>
    <div class="addgv_tb" style="width: 20%;margin-top:15px;margin-left:120px">
        <div class="addgv_tb1" >Chức vụ:</div>
        <input type="text" name="hovaten" value="Trưởng bộ môn" class="addgv_tb2" readonly style="border:0px;font-size:20px">
    </div>
    <div class="addgv_tb" style="width: 30%;margin-top:15px;margin-left:15px">
        <div class="addgv_tb1" >Chuyên ngành:</div>
        <input type="text" name="hovaten" value="Mạng Và An Ninh Mạng" class="addgv_tb2" readonly style="border:0px;font-size:20px">
    </div>

  </div>
 <div class="bang" style="margin-top:10px">
      <div class="bang1">
        <div class="bang_title">Đề tài</div>
      </div>
      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 10%;">ID</div>
        <div class="bang_tencot_1" style="width: 68%;">Tên đề tài</div>
        <div class="bang_tencot_1" style="width: 10%;">Đối tượng</div>
        <div class="bang_tencot_1" style="width: 10%;">Số lượng</div>
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
      <div class="bang_hang">
        <a href="<?php echo $chitietdetai_url; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $detais[$i]['id']?></a>
        <a href="<?php echo $phangvphanvien_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="width: 68%;"><?php echo $detais[$i]['tendetai']?></a>
        <a href="<?php echo $phangvphanvien_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $detais[$i]['doituong']?></a>
        <a href="<?php echo $phangvphanvien_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $count_svthuchien; ?>/<?php echo $detais[$i]['soluongsv']; ?></a>
      </div>
      <?php else: ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <a href="<?php echo $chitietdetai_url; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $detais[$i]['id']?></a>
        <a href="<?php echo $phangvphanvien_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="width: 68%;"><?php echo $detais[$i]['tendetai']?></a>
        <a href="<?php echo $phangvphanvien_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $detais[$i]['doituong']?></a>
        <a href="<?php echo $phangvphanvien_url; ?>&id=<?php echo $detais[$i]['id']; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $count_svthuchien; ?>/<?php echo $detais[$i]['soluongsv']; ?></a>
      </div>
      <?php endif; ?>
      <?php endfor; ?>

    </div>
</div>
<?php include '../view/footer.php'; ?>