<?php include '../view/header.php'; ?>
<?php   
  $chitietdetai_url = $app_path . '?action=view_chitietdetai';
  if (!isset($message)) { $message = ''; } 

?>
<div class="thanhtitle"  style="margin-bottom: 20px;">
 <div class="thanhtitle1">
   <a class="thanhtitle2">Sinh viên</a>
 </div>
 <div class="thanhtitle1">
    <span class="thanhtitle3">Trang cá nhân</span>
 </div>
</div>

<?php 
  $sv = get_one_sinhvien($_SESSION['user']);
  $nganhdaotao = get_one_ctdt($sv['ctdt']);
  $detai = get_one_detai_by_sinhvien($sv['user']);
  if ($detai != NULL){
    $thanhviens = get_all_sinhvienthuchien_by_detai($detai['id']);
  }
  else{
    $thanhviens = NULL;
  }

?>
<div class="addgv" >
 <div class="addgv1">
    <div style="width:100px;height:250px;display:block; border:1px solid #797f89;width:190px;height:250px;margin-top:15px;margin-left:10px;float:left"></div>
    <div class="addgv_tb" style="width: 27%;margin-top:15px;margin-left:15px">
        <div class="addgv_tb1" >Họ và tên:</div>
        <input type="text" name="hovaten" value="<?php echo $sv['hovaten']?>" class="addgv_tb2" readonly style="border:0px;font-size:20px">
    </div>
    <div class="addgv_tb" style="width: 12%;margin-top:15px;margin-left:15px">
        <div class="addgv_tb1" >Ngày sinh:</div>
        <input type="text" name="hovaten" value="<?php echo $sv['ngaysinh']?>" class="addgv_tb2" readonly style="border:0px;font-size:20px">
    </div>
    <div class="addgv_tb" style="width: 10%;margin-top:15px;margin-left:60px">
        <div class="addgv_tb1" >Giới tính:</div>
        <?php if ($sv['gioitinh'] == '1'): ?>
          <input type="text" name="hovaten" value="Nam" class="addgv_tb2" readonly style="border:0px;font-size:20px">
        <?php else: ?>
          <input type="text" name="hovaten" value="Nam" class="addgv_tb2" readonly style="border:0px;font-size:20px">
        <?php endif; ?>
    </div>
    <div class="addgv_tb" style="width: 10%;margin-top:15px;margin-left:30px">
        <div class="addgv_tb1" >Đối tượng:</div>
        <input type="text" name="hovaten" value="<?php echo $sv['doituong']?>" class="addgv_tb2" readonly style="border:0px;font-size:20px">
    </div>
    <div class="addgv_tb" style="width: 22%;margin-top:15px;margin-left:15px">
        <div class="addgv_tb1" >Ngành đào tạo:</div>
        <input type="text" name="hovaten" value="<?php echo $nganhdaotao['nganhdaotao']?>" class="addgv_tb2" readonly style="border:0px;font-size:20px">
    </div>
    <div class="addgv_tb" style="width: 10%;margin-top:15px;margin-left:15px">
        <div class="addgv_tb1" >Lớp:</div>
        <input type="text" name="hovaten" value="<?php echo $sv['lop']?>" class="addgv_tb2" readonly style="border:0px;font-size:20px">
    </div>
    <div class="addgv_tb" style="width: 25%;margin-top:15px;margin-left:45px">
        <div class="addgv_tb1" >Chuyên ngành:</div>
        <input type="text" name="hovaten" value="<?php echo $sv['chuyennganh']?>" class="addgv_tb2" readonly style="border:0px;font-size:20px">
    </div>
    <div class="addgv_tb" style="width: 15%;margin-top:15px;margin-left:30px">
        <div class="addgv_tb1" >Tín chỉ tích lũy:</div>
        <input type="text" name="hovaten" value="<?php echo $sv['tinchitichluy']?>" class="addgv_tb2" readonly style="border:0px;font-size:20px">
    </div>
  </div>
 <div class="bang" style="margin-top:10px">
      <div class="bang1">
        <div class="bang_title">Đề tài</div>
      </div>
      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 10%;">ID</div>
        <div class="bang_tencot_1" style="width: 53%;">Tên đề tài</div>
        <div class="bang_tencot_1" style="width: 25%;">GV hướng dẫn</div>
        <div class="bang_tencot_1" style="width: 12%;">Trưởng nhóm</div>
      </div>
      <?php

      ?>
      <?php if ($detai != NULL): ?>
      <div class="bang_hang">
        <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="width: 10%;"><?php echo $detai['id']; ?></a>
        <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="width: 53%;"><?php echo $detai['tendetai']; ?></a>
        <?php $gv = get_one_giangvien($detai['gvhuongdan']); ?>
          <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="width: 25%;"><?php echo $gv['hovaten']; ?></a>
        <?php if ($detai['is_truongnhom'] == '1'): ?>
          <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="width: 12%;"><input type="checkbox" style="width: 20px;height: 20px;margin-left:40px" checked disabled="disabled"></a>
        <?php else: ?>
          <a href="<?php echo $chitietdetai_url; ?>&id=<?php echo $detai['id']; ?>" class="bang_hang_1" style="width: 12%;"><input type="checkbox" style="width: 20px;height: 20px;margin-left:40px" disabled="disabled"></a>
        <?php endif; ?>
        </a>
      <?php endif; ?>
      <form action="../truongnhom" method="get">
        <input type="hidden" name="action" value="nopbaocao">
        <input type="hidden" name="id" value="<?php echo $detai['id']; ?>">

        <div class="addgv_hangcuoi">
              <div class="addgv_message"><?php echo $message; ?></div>
              <input type="submit" value="Nộp báo báo" class="addgv_button" style="background-color:#0a426e;float:right">
        </div>
      </form>
      <div class="bang1">
        <div class="bang_title">Thành viên</div>
      </div>
      <?php

      ?>
        <?php 
        if ($thanhviens != NULL):
          foreach($thanhviens as $thanhvien):
          $sv1 = get_one_sinhvien($thanhvien['sinhvien']);    
        ?>
          <div class="bang_hang">
            <a class="bang_hang_1" style="width: 10%;"><?php echo $thanhvien['sinhvien'];?></a>
            <div class="bang_hang_1" style="width: 53%;"><?php echo $sv1['hovaten'];?></div>
          </div>
        <?php endforeach; ?>
        <?php endif ; ?>


      <!--<div class="bang1">
        <div class="bang_title" style="color:#d3232a">Quan tâm</div>
      </div>
      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 10%;">MSSV</div>
        <div class="bang_tencot_1" style="width: 25%;">Họ và tên</div>

      </div>
      <?php

      ?>
      <div class="bang_hang">
        <a href="" class="bang_hang_1" style="width: 10%;">1001</a>
        <div class="bang_hang_1" style="width: 25%;">Lê Văn Pê</div>
        <input type="radio" name="dangky" value="" style="width: 20px;height: 20px;margin-left:50px;margin-top:14px">
      </div>
      <div class="addgv_hangcuoi">
              <div class="addgv_message"></div>
              <input type="submit" value="Thêm vào nhóm" class="addgv_button" style="background-color:#0a426e;float:left;margin-left:240px">
        </div>-->



      

    </div>
</div>
<?php include '../view/footer.php'; ?>