<?php include '../view/header.php'; ?>
<?php include '../view/sidebar.php'; ?>
<?php  
    if (!isset($tendetai)) { $tendetai = ''; } 
    if (!isset($muctieu)) { $muctieu = ''; } 
    if (!isset($yeucau)) { $yeucau = ''; } 
    if (!isset($sanpham)) { $sanpham = ''; } 
    if (!isset($chuthich)) { $chuthich = ''; } 
    if (!isset($sv1)) { $sv1 = ''; } 
    if (!isset($sv2)) { $sv2 = ''; } 

?>
    <div class="bang" style="width:78%">
      <?php
      $gvthuchien = get_one_giangvien($_SESSION['user']);
      $dotdangkys = get_all_ddk_hieuluc_gv(); 
      if ($dotdangkys == NULL): //ko co đợt đăng kỳ hiện thời cho giảng viên
      ?>
      <div class="bang1" style="background-color: #f5f5f5;margin-top:5px">
        <div class="bang_title" style="color:#d73d32">Hiện không nằm trong thời gian đăng ký</div>
        <!--<a class="bang_addgv">Add more</a>-->
      </div>
      <?php else:?>

      <div class="bang1" style="background-color: #f5f5f5;margin-top:5px">
        <div class="bang_title" style="color:#d73d32">Đăng ký đề tài cho các khóa, loại đề tài</div>
        <!--<a class="bang_addgv">Add more</a>-->
      </div>
      <?php 
        foreach($dotdangkys as $dotdangky) :
      ?>

    <form action="." method="post">
      <input type="hidden" name="action" value="register_detai">
      <input type="hidden" name="ddk" value="<?php echo $dotdangky['id']; ?>">

      <div class="bang_hang" style="border:1px solid #dee2e6;margin-top:10px;margin-bottom:10px">
        <div class="bang_hang_1" style="width: 30%;text-align:center;background-color:#0a426e;
             line-height:30px;color:#fff;margin-right:10px;margin-top:10px;border-radius: 2px;font-weight:700">Kết thúc: <?php echo $dotdangky['ketthuc']; ?></div>
        <div class="bang_hang_1" style="width: 35%;font-weight:700;font-size:20px"><?php echo $dotdangky['loaidetai']; ?></div>
        <?php 
            $ddk_doituong = get_one_ddk_doituong($dotdangky['id']);
        ?>
        <div class="bang_hang_1" style="width: 30%;font-size:20px"><?php echo $ddk_doituong['doituong']; ?></div>
      </div>

      <input type="hidden" name="ddk_doituong" value="<?php echo $ddk_doituong['doituong']; ?>">

      <div class="adgv2" style="margin-top:10px">
            <div class="addgv_tb" style="width: 100%;">
                <div class="addgv_tb1" >Tên đề tài</div>
                <input type="text" name="tendetai" 
                value="<?php echo $tendetai; ?>" class="addgv_tb2" style="width:99%">
            </div>
        </div>
        <div class="adgv2" style="margin-top:10px">
            <div class="addgv_tb" style="width: 50%;">
                <div class="addgv_tb1">Mục tiêu</div>
                <input type="text" name="muctieu" value="<?php echo $muctieu; ?>" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 50%;">
                <div class="addgv_tb1">Yêu cầu</div>
                <input type="text" name="yeucau" value="<?php echo $yeucau; ?>" class="addgv_tb2" style="width:98%">
            </div>
        </div>
        <div class="adgv2" style="margin-top:10px">
            <div class="addgv_tb" style="width: 50%;">
                <div class="addgv_tb1">Sản phẩm</div>
                <input type="text" name="sanpham" value="<?php echo $sanpham; ?>" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 50%;">
                <div class="addgv_tb1">Chú thích</div>
                <input type="text" name="chuthich" value="<?php echo $chuthich; ?>" class="addgv_tb2" style="width:98%">
            </div>
        </div>
        <div class="adgv2">
            <div class="addgv_tb" style="width: 35%;">
                <div class="addgv_tb1" >ĐK khác chuyên ngành</div>
                <select name="dkkcn" style="height: 36px;font-size: 17px;margin-left:70px">
                    <option value="false" >
                        Không
                    </option>
                    <option value="true" >
                        Được
                    </option>
                </select>
            </div>
            <div class="addgv_tb" style="width: 25%;">
                <div class="addgv_tb1" >Chuyên ngành</div>
                <input type="text" name="chuyennganh" value="<?php echo $gvthuchien['chuyennganh']; ?>" class="addgv_tb2" style="width:96%;background-color:#f5f5f5" readonly>
            </div>
            <div class="addgv_tb" style="width: 20%;margin-left:100px">
                <div class="addgv_tb1">Trạng thái</div>
                <input type="text" name="status" value="được bảo vệ" class="addgv_tb2" style="width:96%;background-color:#f5f5f5" readonly>
            </div>
        </div>
        <div class="adgv2">
            <div class="addgv_tb" style="width: 35%;">
                <div class="addgv_tb1">Giảng viên hướng dẫn</div>
                <input type="text" value="<?php echo $gvthuchien['hovaten']; ?>" class="addgv_tb2" style="width:80%;background-color:#f5f5f5" readonly>
            </div>
            <div class="addgv_tb" style="width: 50%;margin-left:100px">
                <div class="addgv_tb1" >Số lượng sinh viên thực hiện</div>
                <select name="soluongsv" style="height: 36px;font-size: 17px;width:80px;margin-left:170px">
                    <option value="2" >
                        2
                    </option>
                    <option value="1" >
                        1
                    </option>
                </select>
            </div>
        </div>

        <div class="adgv2">
            <div class="addgv_tb" style="width: 45%;margin-right:30px">
                <div class="addgv_tb1">SV1</div>
                <input type="text" name="sv1" value="<?php echo $sv1; ?>" class="addgv_tb2" style="width:98%">
                <input type="radio" name="is_truongnhom" value="truongnhom1" style="width: 20px;height: 20px;margin-left:50px;margin-top:10px">Trưởng nhóm

            </div>
            <div class="addgv_tb" style="width: 45%">
                <div class="addgv_tb1">SV2</div>
                <input type="text" name="sv2" value="<?php echo $sv2; ?>" class="addgv_tb2" style="width:98%">
                <input type="radio" name="is_truongnhom" value="truongnhom2" style="width: 20px;height: 20px;margin-left:50px;margin-top:10px">Trưởng nhóm

            </div>
        </div>

        <div class="addgv_hangcuoi">
              <div class="addgv_message"><?php echo $_SESSION['message']; ?></div>
              <input type="submit" value="Add" class="addgv_button">
        </div>

      </form>
      <?php endforeach; ?>
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