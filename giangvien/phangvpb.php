<?php include '../view/header.php'; ?>
<?php   
    require_once('model/chuyennganh_db.php');
    require_once('model/nganhdaotao_db.php');

    $admin_url = $app_path . 'giangvien';
?>

  <div class="thanhtitle"  style="margin-bottom: 20px;">
    <div class="thanhtitle1">
    <a href="<?php echo $admin_url; ?>" class="thanhtitle2">Admin</a>
    </div>
    <div class="thanhtitle1">
      <span class="thanhtitle3">Danh mục / CTĐT</span>
    </div>
  </div>


  <!---->
  <div style="overflow: auto; width: 950px;margin: 0 auto;">
  <div style="overflow: auto;">
  <div class="bang" style="width: 895px; margin-bottom: 15px">
      <div class="bang1">
        <div class="bang_title">Chương Trình Đào Tạo</div>
        <!--<a class="bang_addgv" style="width:30%">Add more</a>-->
      </div>

      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 45%;">CTĐT</div>
        <div class="bang_tencot_1" style="width:55%">Ngành đào tạo</div>
      </div>
      <?php 
          $id = filter_input(INPUT_GET, 'ctdt');
          
          $ctdt = get_one_ctdt($id); 
      ?>
      <form action="." method="post">
        <input type="hidden" name="action" value="update_ctdt">
      <div class="bang_hang" style="background-color: #f5f5f5">
        <input type="textbox" name="id" value="<?php echo $ctdt['ctdt']?>" class="tx_noneborder" style="width: 45%;" readonly>
        <select name="nganhdaotao" style="height: 36px;font-size: 17px;">
                    <?php          
                      $nganhdaotaos = get_all_nganhdaotao();
                      foreach($nganhdaotaos as $nganhdaotao) :
                         $name = $nganhdaotao['tennganh'];
                    ?>
                    <?php if ($name == $ctdt['nganhdaotao']):?>
                      <option value="<?php echo $name; ?>" selected>
                        <?php echo $name; ?>
                      </option>
                    <?php else:?>
                      <option value="<?php echo $name; ?>">
                        <?php echo $name; ?>
                      </option>
                    <?php endif; ?>                   
                    <?php endforeach; ?>
        </select>
      </div>

      <div style="overflow: auto; margin-top:10px">
          <input type="submit" value="Update" class="addgv_button" style="margin-top:0px">
        </form>
        <form action="." method="post"> 
          <input type="hidden" name="action" value="delete_ctdt">
          <input type="hidden" name="id" value="<?php echo $ctdt['ctdt']; ?>">
          <input type="submit" value="Delete" class="addgv_button" style="background-color: #d73d32;margin-top:0px">
        </form>
      </div>
      </div>


  </div>
</div>
</div>
      </div>
<?php include '../view/footer.php'; ?>