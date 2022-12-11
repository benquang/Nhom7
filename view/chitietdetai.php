<?php include 'view/header.php'; ?>
<?php include 'view/sidebar.php'; ?>
<?php   
    
?>
      <div class="bang" style="width: 895px; margin-bottom: 15px;">
      <div class="bang1" style="margin-bottom:10px;border-bottom: 3px solid #dee2e6;background-color: #f5f5f5;margin-top:5px">
        <div class="bang_title">Chi tiết đề tài</div>
      </div>
      <?php
        $id = filter_input(INPUT_GET, 'id');
        $detai = get_one_chitietdetai($id); 
        $gv = get_one_giangvien($detai['gvhuongdan']);
        if ($detai['gvphanbien'] != NULL){
          $gv1 = get_one_giangvien($detai['gvphanbien']);
        }
        else {
          $gv1['hovaten'] = '';
        }

        $count = count_svthuchien_by_detai($detai['id']);
        if ($count == NULL){
          $count_svthuchien = 0;
        }
        else {
          $count_svthuchien = $count['count'];
        }
        $sinhviens = get_all_sinhvienthuchien_by_detai($detai['id']);
      ?>

      <div class="bang_tencot" style="padding-left:0px;border: 1px solid #dee2e6">
        <div class="bang_tencot_1" style="width: 48%;padding-left:10px">Id</div>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
        <?php echo $detai['id']; ?></div>
      </div>
      
      <div class="bang_tencot" style="padding-left:0px;border: 1px solid #dee2e6">
        <div class="bang_tencot_1" style="width: 48%;padding-left:10px">Tên đề tài</div>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
        <?php echo $detai['tendetai']; ?></div>
      </div>
      <div class="bang_tencot" style="padding-left:0px;border: 1px solid #dee2e6">
        <div class="bang_tencot_1" style="width: 48%;padding-left:10px">Mục tiêu</div>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
        <?php echo $detai['muctieu']; ?></div>
      </div>
      <div class="bang_tencot" style="padding-left:0px;border: 1px solid #dee2e6">
        <div class="bang_tencot_1" style="width: 48%;padding-left:10px">Yêu cầu</div>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
        <?php echo $detai['yeucau']; ?></div>
      </div>   
      <div class="bang_tencot" style="padding-left:0px;border: 1px solid #dee2e6">
        <div class="bang_tencot_1" style="width: 48%;padding-left:10px">Sản phẩm</div>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
        <?php echo $detai['sanpham']; ?></div>
      </div>  
      <div class="bang_tencot" style="padding-left:0px;border: 1px solid #dee2e6">
        <div class="bang_tencot_1" style="width: 48%;padding-left:10px">Chú thích</div>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
        <?php echo $detai['chuthich']; ?></div>
      </div>  
      <div class="bang_tencot" style="padding-left:0px;border: 1px solid #dee2e6">
        <div class="bang_tencot_1" style="width: 48%;padding-left:10px">SL sinh viên</div>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
        <?php echo $count_svthuchien; ?>/<?php echo $detai['soluongsv']; ?></div>
      </div>  
      <div class="bang_tencot" style="padding-left:0px;border: 1px solid #dee2e6">
        <div class="bang_tencot_1" style="width: 48%;padding-left:10px">Được phép đăng ký khác chuyên ngành</div>
        <?php if ($detai['dkkhacchuyennganh'] == '1'): ?>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
        Được</div>
        <?php else: ?>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
        Không</div> 
        <?php endif; ?> 
      </div> 
      <div class="bang_tencot" style="padding-left:0px;border: 1px solid #dee2e6">
        <div class="bang_tencot_1" style="width: 48%;padding-left:10px">Chuyên ngành</div>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
        <?php echo $detai['chuyennganh']; ?></div>
      </div> 
      <div class="bang_tencot" style="padding-left:0px;border: 1px solid #dee2e6">
        <div class="bang_tencot_1" style="width: 48%;padding-left:10px">Trạng thái</div>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
        <?php echo $detai['trangthai']; ?></div>
      </div> 
      <div class="bang_tencot" style="padding-left:0px;border: 1px solid #dee2e6">
        <div class="bang_tencot_1" style="width: 48%;padding-left:10px">Trưởng nhóm</div>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
        <?php foreach($sinhviens as $sinhvien): 
            if ($sinhvien['is_truongnhom'] == '1'){
              $sv = get_one_sinhvien($sinhvien['sinhvien']);  
              echo $sv['hovaten']; 
            }
        endforeach; ?>
        </div>
      </div> 
      <div class="bang_tencot" style="padding-left:0px;border: 1px solid #dee2e6">
        <div class="bang_tencot_1" style="width: 48%;padding-left:10px">Thành viên</div>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
          <?php foreach($sinhviens as $sinhvien): 
            $sv = get_one_sinhvien($sinhvien['sinhvien']);  
            echo $sv['hovaten']; ?>
            <br>
          <?php endforeach; ?>
        </div>  
      </div> 
      <div class="bang_tencot" style="padding-left:0px;border: 1px solid #dee2e6">
        <div class="bang_tencot_1" style="width: 48%;padding-left:10px">GV hướng dẫn</div>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
        <?php echo $gv['hovaten']; ?></div>
      </div> 
      <div class="bang_tencot" style="padding-left:0px;border: 1px solid #dee2e6">
        <div class="bang_tencot_1" style="width: 48%;padding-left:10px">GV phản biện</div>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
        <?php echo $gv1['hovaten']; ?></div>
      </div> 
      <div class="bang_tencot" style="padding-left:0px;border: 1px solid #dee2e6">
        <div class="bang_tencot_1" style="width: 48%;padding-left:10px">Điểm</div>
        <div class="bang_hang_1" style="width: 49%;border-left: 1px solid #dee2e6;padding-left:10px">
        <?php echo $detai['diemdetai']; ?></div>
      </div> 
      <div class="addgv_hangcuoi">
        <div class="addgv_message"></div>
        <input type="submit" value="Update" class="addgv_button">
      </div>
    </div>

    

  </div>
  </div>
<?php include 'view/footer.php'; ?>