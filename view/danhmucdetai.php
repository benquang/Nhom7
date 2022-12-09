<?php include 'view/header.php'; ?>
<?php include 'view/sidebar.php'; ?>
<?php   
    $danhsachdetai_url = $app_path . '?action=view_danhsachdetai';
?>
      <div class="bang" style="width: 895px; margin-bottom: 15px">
      <div class="bang1">
        <div class="bang_title">Danh mục các loại đề tài</div>
        <!--<a class="bang_addgv" style="width:30%">Add more</a>-->
      </div>

      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 10%;">STT</div>
        <div class="bang_tencot_1" style="width: 90%">Loại đề tài</div>
      </div>
      <?php 
      $danhmucdetais = get_all_phanloaidetai();
      for ($i = 0; $i < count($danhmucdetais); $i++):
        if (fmod($i,2) == 0): 
      ?>
  
      <div class="bang_hang" style="background-color: #f5f5f5">
        <a href="<?php echo $danhsachdetai_url; ?>&doituong=<?php echo $danhmucdetais[$i]['doituong'];?>&hocky=<?php echo $danhmucdetais[$i]['hocky'];?>&nienkhoa=<?php echo $danhmucdetais[$i]['nienkhoa'];?>&loaidetai=<?php echo $danhmucdetais[$i]['loaidetai'];?>" 
           class="bang_hang_1" style="width: 10%;"><?php echo $i+1; ?></a>
        <a href="<?php echo $danhsachdetai_url; ?>&doituong=<?php echo $danhmucdetais[$i]['doituong'];?>&hocky=<?php echo $danhmucdetais[$i]['hocky'];?>&nienkhoa=<?php echo $danhmucdetais[$i]['nienkhoa'];?>&loaidetai=<?php echo $danhmucdetais[$i]['loaidetai'];?>" 
          class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:90%">
           <?php echo $danhmucdetais[$i]['loaidetai']; ?> - <?php echo $danhmucdetais[$i]['doituong']; ?> - Học kỳ <?php echo $danhmucdetais[$i]['hocky']; ?> (<?php echo $danhmucdetais[$i]['nienkhoa']; ?>)</a>
      </div>
      <?php else:?>
      <div class="bang_hang">
      <a href="<?php echo $danhsachdetai_url; ?>&doituong=<?php echo $danhmucdetais[$i]['doituong'];?>&hocky=<?php echo $danhmucdetais[$i]['hocky'];?>&nienkhoa=<?php echo $danhmucdetais[$i]['nienkhoa'];?>&loaidetai=<?php echo $danhmucdetais[$i]['loaidetai'];?>" 
           class="bang_hang_1" style="width: 10%;"><?php echo $i+1; ?></a>
        <a href="<?php echo $danhsachdetai_url; ?>&doituong=<?php echo $danhmucdetais[$i]['doituong'];?>&hocky=<?php echo $danhmucdetais[$i]['hocky'];?>&nienkhoa=<?php echo $danhmucdetais[$i]['nienkhoa'];?>&loaidetai=<?php echo $danhmucdetais[$i]['loaidetai'];?>" 
          class="bang_hang_1" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:90%">
           <?php echo $danhmucdetais[$i]['loaidetai']; ?> - <?php echo $danhmucdetais[$i]['doituong']; ?> - Học kỳ <?php echo $danhmucdetais[$i]['hocky']; ?> (<?php echo $danhmucdetais[$i]['nienkhoa']; ?>)</a>
      </div>
      <?php endif; ?>
      <?php endfor; ?>
      <div style="overflow: auto; margin-top:10px">
      </div>
    </div>

  </div>
  </div>
<?php include 'view/footer.php'; ?>