<?php include '../view/header.php'; ?>
<?php   
    $admin_url = $app_path . 'admin';
    if (!isset($message)) { $message = ''; } 

?>
<div class="thanhtitle"  style="margin-bottom: 20px;">
 <div class="thanhtitle1">
    <a href="<?php echo $admin_url; ?>" class="thanhtitle2">Trưởng bộ môn</a>
 </div>
 <div class="thanhtitle1">
    <span class="thanhtitle3">Phân giảng viên phản biện</span>
 </div>
</div>

<?php 
    $id = filter_input(INPUT_GET, 'id');
    $detai = get_one_chitietdetai($id); 
?>
<div class="addgv">
 <div class="addgv1">
    <form action="." method="post">
        <input type="hidden" name="action" value="phan_gv_phanbien">
        <?php 
        ?> 
        <div class="addgv_title"></div>
        <div class="adgv2">
            <div class="addgv_tb" style="width: 7%;">
                <div class="addgv_tb1" >ID</div>
                <input type="text" name="id" value="<?php echo $detai['id']; ?>" class="addgv_tb2" readonly>
            </div>
            <div class="addgv_tb" style="width: 90%;margin-left:20px">
                <div class="addgv_tb1" >Tên đề tài</div>
                <input type="text" name="tendetai" value="<?php echo $detai['tendetai']; ?>" class="addgv_tb2" readonly style="width:100%">
            </div>
            <div class="addgv_tb" style="width: 30%;">
                <div class="addgv_tb1"></div>
                <!--<input type="password" name="pass" class="addgv_tb2">-->
            </div>
        </div>
        <div class="adgv2">
        <div class="addgv_message" style="margin-left:100px"><?php echo $message; ?></div>

            <div class="addgv_tb" style="width: 25%;margin-left:360px">
                <div class="addgv_tb1" >Giảng viên phản biện</div>
                <?php 
                  if ($detai['gvphanbien'] == NULL):
                ?>
                <select name="gvphanbien" style="height: 36px;font-size: 17px;">
                    <option value="none" selected>
                        
                    </option>
                    <?php          
                      $giangviens = get_all_giangvien_by_chuyennganh($detai['chuyennganh']);
                      foreach($giangviens as $giangvien) :
                         $name = $giangvien['user'];
                    ?>
                      <option value="<?php echo $name; ?>">
                        <?php echo $giangvien['hovaten']; ?>
                      </option>
                    <?php endforeach; ?>
                </select> 
                <?php else:?>
                  <select name="gvphanbien" style="height: 36px;font-size: 17px;">
                    <?php          
                      $giangviens = get_all_giangvien_by_chuyennganh($detai['chuyennganh']);
                      foreach($giangviens as $giangvien) :
                         $name = $giangvien['user'];
                    ?>
                      <?php if ($name == $detai['gvphanbien']):?>
                        <option value="<?php echo $name; ?>" selected>
                          <?php echo $giangvien['hovaten']; ?>
                        </option>
                      <?php else:?>
                        <option value="<?php echo $name; ?>">
                          <?php echo $giangvien['hovaten']; ?>
                        </option>
                      <?php endif; ?>  
                      <?php endforeach; ?>
                  </select>  
                <?php endif; ?>                              
              </div>
              <input type="submit" value="Update" class="addgv_button" style="float:right">

        </div>
      </form>
 </div>
</div>
<?php include '../view/footer.php'; ?>