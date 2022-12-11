<?php include '../view/header.php'; ?>
<?php   
    $admin_url = $app_path . 'admin';
?>
<div class="thanhtitle"  style="margin-bottom: 20px;">
 <div class="thanhtitle1">
    <a href="<?php echo $admin_url; ?>" class="thanhtitle2">Admin</a>
 </div>
 <div class="thanhtitle1">
    <span class="thanhtitle3">Admin / Update instructor's information</span>
 </div>
</div>

<div class="addgv">
 <div class="addgv1">
    <form action="." method="post">
        <input type="hidden" name="action" value="update_gv">
        <?php 
        ?> 
        <div class="addgv_title">Cập nhật thông tin giảng viên</div>
        <div class="adgv2">
            <div class="addgv_tb" style="width: 40%;">
                <div class="addgv_tb1" >User</div>
                <input type="text" name="taikhoan" value="<?php echo $giangvien['user']; ?>" class="addgv_tb2" readonly>
            </div>
            <div class="addgv_tb" style="width: 30%;">
                <div class="addgv_tb1"></div>
                <!--<input type="password" name="pass" class="addgv_tb2">-->
            </div>
            <div class="addgv_tb" style="width: 10%;">
                <div class="addgv_tb1">Admin</div>
                <?php     if ($giangvien['is_admin'] == '1'): ?>
                  <input type="checkbox" name="is_admin" style="width: 20px;height: 20px" checked>
                <?php else:?>
                  <input type="checkbox" name="is_admin" style="width: 20px;height: 20px">
                <?php endif; ?>

            </div>
            <div class="addgv_tb" style="width: 20%;">
                <div class="addgv_tb1">Trưởng bộ môn</div>
                <?php     if ($giangvien['is_truongbomon'] == '1'): ?>
                  <input type="checkbox" name="is_truongbomon" style="width: 20px;height: 20px" checked>
                <?php else:?>
                  <input type="checkbox" name="is_truongbomon" style="width: 20px;height: 20px">
                <?php endif; ?>
            </div>
        </div>
        <div class="adgv2">
            <div class="addgv_tb" style="width: 30%;">
                <div class="addgv_tb1" >Họ và tên</div>
                <input type="text" name="hovaten" value="<?php echo $giangvien['hovaten']; ?>" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 25%;">
                <div class="addgv_tb1" >CDKH</div>
                <input type="text" name="cdkh" value="<?php echo $giangvien['cdkh']; ?>" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 20%;">
                <div class="addgv_tb1" >Chuyên ngành</div>
                <select name="chuyennganh" style="height: 36px;font-size: 17px;">
                    <?php          
                      $chuyennganhs = get_all_chuyennganh();
                      foreach($chuyennganhs as $chuyennganh) :
                         $name = $chuyennganh['tenchuyennganh'];
                    ?>
                    <?php if ($name == $giangvien['chuyennganh']):?>
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
            <div class="addgv_tb" style="width: 25%;">
                <div class="addgv_tb1" >Chức vụ</div>
                <input type="text" name="chucvu" value="<?php echo $giangvien['chucvu']; ?>" class="addgv_tb2">
            </div>
        </div>
        <div class="addgv_hangcuoi">
              <div class="addgv_message"></div>
              <input type="submit" value="Update" class="addgv_button">
        </form>
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_gv">
                <input type="hidden" name="taikhoan" value="<?php echo $giangvien['user']; ?>">
                <input type="submit" value="Delete" class="addgv_button" style="background-color: #d73d32">
              </form>
        </div>

    
 </div>
</div>
<?php include '../view/footer.php'; ?>