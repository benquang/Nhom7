<?php include '../view/header.php'; ?>
<?php   

    $admin_url = $app_path . 'admin';
?>
<div class="thanhtitle"  style="margin-bottom: 20px;">
 <div class="thanhtitle1">
    <a href="<?php echo $admin_url; ?>" class="thanhtitle2">Admin</a>
 </div>
 <div class="thanhtitle1">
    <span class="thanhtitle3">Admin / Đợt đăng ký</span>
 </div>
</div>

<div class="addgv">
 <div class="addgv1">
    <form action="." method="post">
        <input type="hidden" name="action" value="register_ddk">
        <?php 
        ?> 
        <div class="addgv_title">Thông báo</div>

        <div class="adgv2">
            <div class="addgv_tb" style="width: 40%;">
                <div class="addgv_tb1" >Tiêu đề</div>
                <input type="text" name="title" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 50%;">
                <div class="addgv_tb1" >File</div>
                <input type="text" name="file" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 10%;">
                <div class="addgv_tb1" >Trạng thái</div>
                <select name="status" style="height: 36px;font-size: 17px;">
                      <option value="true" selected>
                        sẵn sàng
                      </option>
                      <option value="false">
                        kết thúc
                      </option>
                </select>
            </div>
        </div>

        <div class="adgv2">
            <div class="addgv_tb" style="width: 15%;">
                <div class="addgv_tb1" >Ngày bắt đầu</div>
                <input type="date" name="batdau" style="height: 33px;font-size: 17px;">
            </div>
            <div class="addgv_tb" style="width: 15%;margin-left:45px">
                <div class="addgv_tb1" >Ngày kết thúc</div>
                <input type="date" name="ketthuc" style="height: 33px;font-size: 17px;">
            </div>
            <div class="addgv_tb" style="width: 10%;margin-left:40px">
                <div class="addgv_tb1" >Học kỳ</div>
                <input type="text" name="hocky" value="" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 10%;margin-left:40px">
                <div class="addgv_tb1" >Niên khóa</div>
                <input type="text" name="nienkhoa" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 10%;margin-left:40px">
                <div class="addgv_tb1" >Hình thức</div>
                <select name="hinhthuc" style="height: 36px;font-size: 17px;">
                      <option value="true" selected>
                        đăng ký
                      </option>
                      <option value="false">
                        thông báo
                      </option>
                </select>
            </div>
            <div class="addgv_tb" style="width: 20%;margin-left:40px">
                <div class="addgv_tb1" >Loại đề tài</div>
                <select name="loaidetai" style="height: 36px;font-size: 17px;">
                <?php

                $loaidetais = get_all_loaidetai();
                foreach ($loaidetais as $loaidetai) :
                    $name = $loaidetai['loaidetai'];
                ?>
                    <option value="<?php echo htmlspecialchars($name); ?>">
                        <?php echo htmlspecialchars($name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            </div>

        </div>
        <div class="adgv2">
            <?php 
                $doituongs = get_all_doituong();
                foreach ($doituongs as $doituong):
            ?>
            <div class="addgv_tb" style="width: 10%;">
                <div class="addgv_tb1"><?php echo $doituong['doituong']; ?></div>
                <input type="checkbox" name="<?php echo $doituong['doituong']; ?>" style="width: 20px;height: 20px">
            </div>
            <?php endforeach; ?>
        </div>
        <div class="addgv_hangcuoi">
              <div class="addgv_message"></div>
              <input type="submit" value="Add" class="addgv_button">
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