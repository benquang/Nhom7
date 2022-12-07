<?php include '../view/header.php'; ?>
<?php   
    require_once('model/loaidetai_db.php');
    require_once('model/nganhdaotao_db.php');
    require_once('model/chuyennganh_db.php');
    require_once('model/ctdt_db.php');
    require_once('model/doituong_db.php');

    $admin_url = $app_path . 'admin';
    $view_regist_gv_url = $admin_url . '?action=register_gv';
    $view_regist_sv_url = $admin_url . '?action=register_sv';
    $view_regist_ddk_url = $admin_url . '?action=register_ddk';

    $view_loaidetai_url = $admin_url . '?action=update_loaidetai';
    $view_chuyennganh_url = $admin_url . '?action=update_chuyennganh';
    $view_ctdt_url = $admin_url . '?action=update_ctdt';
    $view_doituong_url = $admin_url . '?action=update_doituong';

?>

  <div class="thanhtitle"  style="margin-bottom: 20px;">
    <div class="thanhtitle1">
    <a href="<?php echo $admin_url; ?>" class="thanhtitle2">Admin</a>
    </div>
    <div class="thanhtitle1">
      <span class="thanhtitle3">Admin / Trang chủ</span>
    </div>
  </div>

  <div class="me">
  <div class="men">
    <div class="men05">
    <div class="men1">
      <h3 class="men2">Trang chủ</h3>
      <ul class="men3">
        <li class="men4">
          <a href="<?php echo $admin_url ?>" class="men5">
            <span class="men8">
              <span class="men9">DANH MỤC</span>
            </span>
          </a>
        </li>
        <li class="men4" style="margin-top: 12px;">
          <a href="<?php echo $view_regist_ddk_url; ?>" class="men5" style="border-bottom: 0px">
            <span class="men8">
              <span class="men9">THÔNG BÁO</span>
            </span>
          </a>
        </li>
        <li class="men4">
          <a href="<?php echo $view_regist_ddk_url; ?>" class="men5">
            <span class="men8">
              <span class="men9">ĐỢT ĐĂNG KÝ</span>
            </span>
          </a>
        </li>
        <li class="men4" style="margin-top: 12px;">
          <a href="<?php echo $view_regist_gv_url ?>" class="men5">
            <span class="men8">
              <span class="men9">GIẢNG VIÊN</span>
            </span>
          </a>
        </li>
        <li class="men4" style="margin-top: 12px;">
          <a href="<?php echo $view_regist_sv_url ?>" class="men5">
            <span class="men8">
              <span class="men9">SINH VIÊN</span>
            </span>
          </a>
        </li>
        <li class="men4" style="margin-top: 12px;">
          <a class="men5">
            <span class="men8">
              <span class="men9">HỘI ĐỒNG</span>
            </span>
          </a>
        </li>
      </ul>
    </div>
    
  </div>

  <!---->
  <div style="overflow: auto;">
  <div class="bang" style="width: 895px; margin-bottom: 15px">
      <div class="bang1">
        <div class="bang_title">Loại Đề Tài</div>
        <!--<a class="bang_addgv" style="width:30%">Add more</a>-->
      </div>

      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 45%;">Loại đề tài</div>
        <div class="bang_tencot_1" style="width:55%">Mô tả</div>
      </div>
      <?php 
        $loaidetais = get_all_loaidetai(); 
        for ($i = 0; $i < count($loaidetais); $i++):
            if (fmod($i,2) == 0): 
      ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <a href="<?php echo $view_loaidetai_url . '&loaidetai=' . $loaidetais[$i]['loaidetai']; ?>" class="bang_hang_1" style="width: 45%;"><?php echo $loaidetais[$i]['loaidetai']?></a>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
           <?php echo $loaidetais[$i]['ghichu']?></div>
      </div>
      <?php else:?>
      <div class="bang_hang">
        <a href="<?php echo $view_loaidetai_url . '&loaidetai=' . $loaidetais[$i]['loaidetai']; ?>" class="bang_hang_1" style="width: 45%;"><?php echo $loaidetais[$i]['loaidetai']?></a>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
           <?php echo $loaidetais[$i]['ghichu']?></div>      
        </div>
      <?php endif; ?>
      <?php endfor; ?>

      <div style="overflow: auto; margin-top:10px">
        <form action="." method="post">
          <input type="hidden" name="action" value="add_loaidetai">
          <input type="text" name="loaidetai" class="addgv_tb2" style="width:35%;float:left" placeholder="loai de tai">
          <input type="text" name="mota" class="addgv_tb2" style="width:25%;float:left;margin-left:20px" placeholder="mo ta">
          <input type="submit" value="Add" class="addgv_button" style="margin-top:0px">
        </form>
      </div>
    </div>


    <div class="bang" style="width:435px">
      <div class="bang1">
        <div class="bang_title">Ngành Đào Tạo</div>
        <!--<a class="bang_addgv" style="width:30%">Add more</a>-->
      </div>

      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 45%;">Tên ngành đào tạo</div>
        <div class="bang_tencot_1" style="width:55%">Mô tả</div>
      </div>
      <?php 
        $nganhdaotaos = get_all_nganhdaotao(); 
        for ($i = 0; $i < count($nganhdaotaos); $i++):
            if (fmod($i,2) == 0): 
      ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <a href="<?php echo $view_loaidetai_url . '&nganhdaotao=' . $nganhdaotaos[$i]['tennganh']; ?>" class="bang_hang_1" style="width: 45%;"><?php echo $nganhdaotaos[$i]['tennganh']?></a>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
          <?php echo $nganhdaotaos[$i]['mota']?></div>
      </div>
      <?php else:?>
      <div class="bang_hang">
        <a href="<?php echo $view_loaidetai_url . '&nganhdaotao=' . $nganhdaotaos[$i]['tennganh']; ?>" class="bang_hang_1" style="width: 45%;"><?php echo $nganhdaotaos[$i]['tennganh']?></a>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
          <?php echo $nganhdaotaos[$i]['mota']?></div>
      </div>
      <?php endif; ?>
      <?php endfor; ?>

      <div style="overflow: auto; margin-top:10px">
      <form action="." method="post">
          <input type="hidden" name="action" value="add_nganhdaotao">
          <input type="text" name="tennganh" class="addgv_tb2" style="width:35%;float:left" placeholder="ten nganh">
          <input type="text" name="mota" class="addgv_tb2" style="width:25%;float:left;margin-left:20px" placeholder="mo ta">
          <input type="submit" value="Add" class="addgv_button" style="margin-top:0px">
        </form>
      </div>
    </div>


    <div class="bang" style="width:435px">
      <div class="bang1">
        <div class="bang_title">Chuyên Ngành</div>
        <!--<a class="bang_addgv" style="width:30%">Add more</a>-->
      </div>

      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 45%;">Tên chuyên ngành</div>
        <div class="bang_tencot_1" style="width:55%">Mô tả</div>
      </div>
      <?php 
        $chuyennganhs = get_all_chuyennganh(); 
        for ($i = 0; $i < count($chuyennganhs); $i++):
            if (fmod($i,2) == 0): 
      ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <a href="<?php echo $view_chuyennganh_url . '&tenchuyennganh=' . $chuyennganhs[$i]['tenchuyennganh']; ?>" 
           class="bang_hang_1" style="width: 45%;"><?php echo $chuyennganhs[$i]['tenchuyennganh']?></a>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
        <?php echo $chuyennganhs[$i]['mota']?></div>
      </div>
      <?php else:?>
      <div class="bang_hang">
      <a href="<?php echo $view_chuyennganh_url . '&tenchuyennganh=' . $chuyennganhs[$i]['tenchuyennganh']; ?>"
          class="bang_hang_1" style="width: 45%;"><?php echo $chuyennganhs[$i]['tenchuyennganh']?></a>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
        <?php echo $chuyennganhs[$i]['mota']?></div>
      </div>
      <?php endif; ?>
      <?php endfor; ?>

      <div style="overflow: auto; margin-top:10px">
      <form action="." method="post">
          <input type="hidden" name="action" value="add_chuyennganh">
          <input type="text" name="tenchuyennganh" class="addgv_tb2" style="width:35%;float:left" placeholder="chuyen nganh">
          <input type="text" name="mota" class="addgv_tb2" style="width:25%;float:left;margin-left:20px" placeholder="mo ta">
          <input type="submit" value="Add" class="addgv_button" style="margin-top:0px">
        </form>
      </div>
    </div>

    <div class="bang" style="width:435px;margin-top:15px">
      <div class="bang1">
        <div class="bang_title" style="width:70%">Chương Trình Đào Tạo</div>
        <!--<a class="bang_addgv" style="width:30%">Add more</a>-->
      </div>

      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 45%;">CTĐT</div>
        <div class="bang_tencot_1" style="width:55%">Ngành đào tạo</div>
      </div>
      <?php 
        $ctdts = get_all_ctdt(); 
        for ($i = 0; $i < count($ctdts); $i++):
            if (fmod($i,2) == 0): 
      ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <a href="<?php echo $view_ctdt_url . '&ctdt=' . $ctdts[$i]['ctdt']; ?>" 
            class="bang_hang_1" style="width: 45%;"><?php echo $ctdts[$i]['ctdt']?></a>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
          <?php echo $ctdts[$i]['nganhdaotao']?></div>
      </div>
      <?php else:?>
      <div class="bang_hang">
        <a href="<?php echo $view_ctdt_url . '&ctdt=' . $ctdts[$i]['ctdt']; ?>" 
          class="bang_hang_1" style="width: 45%;"><?php echo $ctdts[$i]['ctdt']?></a>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
          <?php echo $ctdts[$i]['nganhdaotao']?></div>
      </div>
      <?php endif; ?>
      <?php endfor; ?>

      <div style="overflow: auto; margin-top:10px">
      <form action="." method="post">
          <input type="hidden" name="action" value="add_ctdt">
          <input type="text" name="ctdt" class="addgv_tb2" style="width:35%;float:left" placeholder="ctdt">
          <input type="text" name="nganhdaotao" class="addgv_tb2" style="width:25%;float:left;margin-left:20px" placeholder="nganh dao tao">
          <input type="submit" value="Add" class="addgv_button" style="margin-top:0px">
        </form>
      </div>
    </div>

    <div class="bang" style="width:435px;margin-top:15px">
      <div class="bang1">
        <div class="bang_title" style="width:70%">Đối Tượng</div>
        <!--<a class="bang_addgv" style="width:30%">Add more</a>-->
      </div>

      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 45%;">Đối tượng</div>
        <div class="bang_tencot_1" style="width:55%">Niên khóa</div>
      </div>
      <?php 
        $doituongs = get_all_doituong(); 
        for ($i = 0; $i < count($doituongs); $i++):
            if (fmod($i,2) == 0): 
      ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <a href="<?php echo $view_doituong_url . '&doituong=' . $doituongs[$i]['doituong']; ?>"
            class="bang_hang_1" style="width: 45%;"><?php echo $doituongs[$i]['doituong']?></a>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
          <?php echo $doituongs[$i]['nienkhoa']?></div>
      </div>
      <?php else:?>
      <div class="bang_hang">
      <a href="<?php echo $view_doituong_url . '&doituong=' . $doituongs[$i]['doituong']; ?>"
          class="bang_hang_1" style="width: 45%;"><?php echo $doituongs[$i]['doituong']?></a>

        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
          <?php echo $doituongs[$i]['nienkhoa']?></div>
      </div>
      <?php endif; ?>
      <?php endfor; ?>

      <div style="overflow: auto; margin-top:10px">
        <form action="." method="post">
          <input type="hidden" name="action" value="add_doituong">
          <input type="text" name="doituong" class="addgv_tb2" style="width:35%;float:left" placeholder="doi tuong">
          <input type="text" name="nienkhoa" class="addgv_tb2" style="width:25%;float:left;margin-left:20px" placeholder="nien khoa">
          <input type="submit" value="Add" class="addgv_button" style="margin-top:0px">
        </form>
      </div>
    </div>
    </div>


  </div>
</div>
</div>
<?php include '../view/footer.php'; ?>