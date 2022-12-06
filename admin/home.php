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
      <h3 class="men2">Trang chu</h3>
      <ul class="men3">
        <li class="men4">
          <a href="<?php echo $admin_url ?>" class="men5">
            <span class="men8">
              <span class="men9">DANH MUC</span>
            </span>
          </a>
        </li>
        <li class="men4" style="margin-top: 12px;">
          <a class="men5">
            <span class="men8">
              <span class="men9">DOT DANG KY</span>
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
              <span class="men9">HOI DONG</span>
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
        <div class="bang_title">Loai De Tai</div>
        <!--<a class="bang_addgv" style="width:30%">Add more</a>-->
      </div>

      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 45%;">Loai de tai</div>
        <div class="bang_tencot_1" style="width:55%">Mo ta</div>
      </div>
      <?php 
        $loaidetais = get_all_loaidetai(); 
        for ($i = 0; $i < count($loaidetais); $i++):
            if (fmod($i,2) == 0): 
      ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <div class="bang_hang_1" style="width: 45%;"><?php echo $loaidetais[$i]['loaidetai']?></div>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
           <?php echo $loaidetais[$i]['ghichu']?></div>
      </div>
      <?php else:?>
      <div class="bang_hang">
        <div class="bang_hang_1" style="width: 45%;"><?php echo $loaidetais[$i]['loaidetai']?></div>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
           <?php echo $loaidetais[$i]['ghichu']?></div>      </div>
      <?php endif; ?>
      <?php endfor; ?>

      <div style="overflow: auto; margin-top:10px">
        <form action="." method="post">
          <input type="hidden" name="action" value="add_loaidetai">
          <input type="text" name="loaidetai" class="addgv_tb2" style="width:35%;float:left" placeholder="loai de tai">
          <input type="text" name="mota" class="addgv_tb2" style="width:25%;float:left;margin-left:20px" placeholder="ghi chu">
          <input type="submit" value="Add" class="addgv_button" style="margin-top:0px">
        </form>
      </div>
    </div>


    <div class="bang" style="width:435px">
      <div class="bang1">
        <div class="bang_title">Nganh dao tao</div>
        <!--<a class="bang_addgv" style="width:30%">Add more</a>-->
      </div>

      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 45%;">Ten nganh dao tao</div>
        <div class="bang_tencot_1" style="width:55%">Mo ta</div>
      </div>
      <?php 
        $nganhdaotaos = get_all_nganhdaotao(); 
        for ($i = 0; $i < count($nganhdaotaos); $i++):
            if (fmod($i,2) == 0): 
      ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <div class="bang_hang_1" style="width: 45%;"><?php echo $nganhdaotaos[$i]['tennganh']?></div>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
          <?php echo $nganhdaotaos[$i]['mota']?></div>
      </div>
      <?php else:?>
      <div class="bang_hang">
        <div class="bang_hang_1" style="width: 45%;"><?php echo $nganhdaotaos[$i]['tennganh']?></div>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
          <?php echo $nganhdaotaos[$i]['mota']?></div>
      </div>
      <?php endif; ?>
      <?php endfor; ?>

      <div style="overflow: auto; margin-top:10px">
      <form action="." method="post">
          <input type="hidden" name="action" value="add_nganhdaotao">
          <input type="text" name="tennganh" class="addgv_tb2" style="width:35%;float:left" placeholder="ten nganh">
          <input type="text" name="mota" class="addgv_tb2" style="width:25%;float:left;margin-left:20px" placeholder="ghi chu">
          <input type="submit" value="Add" class="addgv_button" style="margin-top:0px">
        </form>
      </div>
    </div>


    <div class="bang" style="width:435px">
      <div class="bang1">
        <div class="bang_title">Chuyen nganh</div>
        <!--<a class="bang_addgv" style="width:30%">Add more</a>-->
      </div>

      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 45%;">Ten chuyen nganh</div>
        <div class="bang_tencot_1" style="width:55%">Mo ta</div>
      </div>
      <?php 
        $chuyennganhs = get_all_chuyennganh(); 
        for ($i = 0; $i < count($chuyennganhs); $i++):
            if (fmod($i,2) == 0): 
      ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <div class="bang_hang_1" style="width: 45%;"><?php echo $chuyennganhs[$i]['tenchuyennganh']?></div>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
        <?php echo $chuyennganhs[$i]['mota']?></div>
      </div>
      <?php else:?>
      <div class="bang_hang">
        <div class="bang_hang_1" style="width: 45%;"><?php echo $chuyennganhs[$i]['tenchuyennganh']?></div>
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
        <div class="bang_title" style="width:70%">Chuong trinh dao tao</div>
        <!--<a class="bang_addgv" style="width:30%">Add more</a>-->
      </div>

      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 45%;">CTDT</div>
        <div class="bang_tencot_1" style="width:55%">Nganh dao tao</div>
      </div>
      <?php 
        $ctdts = get_all_ctdt(); 
        for ($i = 0; $i < count($ctdts); $i++):
            if (fmod($i,2) == 0): 
      ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <div class="bang_hang_1" style="width: 45%;"><?php echo $ctdts[$i]['ctdt']?></div>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
          <?php echo $ctdts[$i]['nganhdaotao']?></div>
      </div>
      <?php else:?>
      <div class="bang_hang">
        <div class="bang_hang_1" style="width: 45%;"><?php echo $ctdts[$i]['ctdt']?></div>
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
        <div class="bang_title" style="width:70%">Doi Tuong</div>
        <!--<a class="bang_addgv" style="width:30%">Add more</a>-->
      </div>

      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 45%;">Doi tuong</div>
        <div class="bang_tencot_1" style="width:55%">Nien Khoa</div>
      </div>
      <?php 
        $doituongs = get_all_doituong(); 
        for ($i = 0; $i < count($doituongs); $i++):
            if (fmod($i,2) == 0): 
      ?>
      <div class="bang_hang" style="background-color: #f5f5f5">
        <div class="bang_hang_1" style="width: 45%;"><?php echo $doituongs[$i]['doituong']?></div>
        <div class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:55%">
          <?php echo $doituongs[$i]['nienkhoa']?></div>
      </div>
      <?php else:?>
      <div class="bang_hang">
        <div class="bang_hang_1" style="width: 45%;"><?php echo $doituongs[$i]['doituong']?></div>
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