<?php include 'view/header.php'; ?>
<?php include 'view/sidebar.php'; ?>
<?php   
    
?>
    <div class="bang" style="width:78%;">

      <!--<div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 30%;">Tai khoan</div>background-color: #f5f5f5;margin-top:5px
        <div class="bang_tencot_1">Ho va ten</div>
        <div class="bang_tencot_1" style="width: 10%;">CDKH</div>
        <div class="bang_tencot_1" style="width: 20%;">Chuyen nganh</div>
        <div class="bang_tencot_1">Chuc vu</div>
      </div> -->
      <?php
      $id = filter_input(INPUT_GET, 'id');
      $dotdangky = get_one_ddk($id); 
      ?>
      <div class="bang_hang" style="border:1px solid #dee2e6;margin-top:10px;margin-bottom:10px;background-color: #f5f5f5">
        <div class="bang_hang_1" style="width: 20%;text-align:center;background-color:#0a426e;
             line-height:30px;color:#fff;margin-right:10px;margin-top:10px;border-radius: 2px;font-weight:700"><?php echo $dotdangky['batdau']; ?></div>
        <div class="bang_hang_1" style="width: 70%;"><?php echo $dotdangky['title']; ?></div>
      </div>
      <iframe src="<?php echo $dotdangky['file']; ?>" 
        width="100%" height="480" allow="autoplay"></iframe>
    </div>

  </div>
  </div>
<?php include 'view/footer.php'; ?>