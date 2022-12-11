<?php include 'view/header.php'; ?>
<?php include 'view/sidebar.php'; ?>
<?php   
    $thongbao_url = $app_path . '?action=view_thongbao';
?>
    <div class="bang" style="width:78%">
      <div class="bang1" style="background-color: #f5f5f5;margin-top:5px">
        <div class="bang_title">Thong bao</div>
        <!--<a class="bang_addgv">Add more</a>-->
      </div>
      <?php 
        echo $doc_root;
      ?>
      <br>
      <?php 
        echo $uri;
      ?>
      <br>
      <?php 
        echo $dirs[1];
      ?>
      <br>
      <?php 
        echo $dirs[2];
      ?>
      <br>
      <?php 
        echo $app_path;
      ?>
      <br>
      <?php 
        echo set_include_path($doc_root . $app_path);
      ?>
      <br>

      <!--<div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 30%;">Tai khoan</div>
        <div class="bang_tencot_1">Ho va ten</div>
        <div class="bang_tencot_1" style="width: 10%;">CDKH</div>
        <div class="bang_tencot_1" style="width: 20%;">Chuyen nganh</div>
        <div class="bang_tencot_1">Chuc vu</div>
        /storage/ssd3/167/19987167/public_html
        /storage/ssd3/167/19987167/public_html
      </div> -->
      <?php
      $dotdangkys = get_all_ddk();
      foreach($dotdangkys as $dotdangky) :
      ?>
      <div class="bang_hang" style="border:1px solid #dee2e6;margin-top:10px">
        <a href="<?php echo $thongbao_url . '&id=' . $dotdangky['id']; ?>" class="bang_hang_1" style="width: 20%;text-align:center;background-color:#0a426e;
             line-height:30px;color:#fff;margin-right:10px;margin-top:10px;border-radius: 2px;font-weight:700">
             <?php echo $dotdangky['batdau']; ?></a>
        <a href="<?php echo $thongbao_url . '&id=' . $dotdangky['id']; ?>" class="bang_hang_1" style="width: 70%;">
            <?php echo $dotdangky['title']; ?></a>

        <?php if ($dotdangky['hinhthuc'] == 1): //dang ky?>
          <div class="bang_hang_1" style="width: 5%;text-align:center;background-color:#d3232a;
             line-height:30px;color:#fff;margin-right:10px;margin-top:10px;border-radius: 2px;font-weight:700">ĐK</div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
  </div>
<?php include 'view/footer.php'; ?>