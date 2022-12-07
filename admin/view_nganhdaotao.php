<?php include '../view/header.php'; ?>
<?php   
    require_once('model/nganhdaotao_db.php');

    $admin_url = $app_path . 'admin';
?>

  <div class="thanhtitle"  style="margin-bottom: 20px;">
    <div class="thanhtitle1">
    <a href="<?php echo $admin_url; ?>" class="thanhtitle2">Admin</a>
    </div>
    <div class="thanhtitle1">
      <span class="thanhtitle3">Admin / Trang chủ</span>
    </div>
  </div>


  <!---->
  <div style="overflow: auto; width: 950px;margin: 0 auto;">
  <div style="overflow: auto;">
  <div class="bang" style="width: 895px; margin-bottom: 15px">
      <div class="bang1">
        <div class="bang_title">Ngành Đào Tạo</div>
        <!--<a class="bang_addgv" style="width:30%">Add more</a>-->
      </div>

      <div class="bang_tencot">
        <div class="bang_tencot_1" style="width: 45%;">Tên ngành đào tạo</div>
        <div class="bang_tencot_1" style="width:55%">Mô tả</div>
      </div>
      <?php 
          $id = filter_input(INPUT_GET, 'nganhdaotao');
          $nganhdaotao = get_one_nganhdaotao($id); 
      ?>
      <form action="." method="post">
        <input type="hidden" name="action" value="update_loaidetai">
      <div class="bang_hang" style="background-color: #f5f5f5">
        <input type="textbox" name="id" value="<?php echo $nganhdaotao['tennganh']?>" class="tx_noneborder" style="width: 45%;" readonly>
        <input type="textbox" name="ghichu" value="<?php echo $nganhdaotao['mota']?>" class="tx_noneborder" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width:53%">
      </div>

      <div style="overflow: auto; margin-top:10px">
          <input type="submit" value="Update" class="addgv_button" style="margin-top:0px">
        </form>
        <form action="." method="post"> 
          <input type="hidden" name="action" value="delete_loaidetai">
          <input type="hidden" name="id" value="<?php echo $nganhdaotao['tennganh']; ?>">
          <input type="submit" value="Delete" class="addgv_button" style="background-color: #d73d32;margin-top:0px">
        </form>
      </div>
      </div>


  </div>
</div>
</div>
      </div>
<?php include '../view/footer.php'; ?>