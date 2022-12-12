<?php include '../view/header.php'; ?>
<?php   
    $admin_url = $app_path . 'admin';
    $update_ddk_url = $admin_url . '?action=update_ddk';

?>
<div class="thanhtitle"  style="margin-bottom: 20px;">
 <div class="thanhtitle1">
    <a href="<?php echo $admin_url; ?>" class="thanhtitle2">Admin</a>
 </div>
 <div class="thanhtitle1">
    <span class="thanhtitle3">Admin / Update thông báo</span>
 </div>
</div>

<div class="addgv">
 <div class="addgv1">
    <form action="." method="post">
        <?php 
          $id = filter_input(INPUT_GET, 'id');
          $thongbao = get_one_ddk($id);
        ?> 
        <input type="hidden" name="action" value="update_ddk">
        <input type="hidden" name="id" value="<?php echo $thongbao['id']; ?>">
        <div class="addgv_title">Thông báo</div>

        <div class="adgv2">
            <div class="addgv_tb" style="width: 40%;">
                <div class="addgv_tb1" >Tiêu đề</div>
                <input type="text" value="<?php echo $thongbao['title']; ?>" name="title" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 50%;">
                <div class="addgv_tb1" >File</div>
                <input type="text" value="<?php echo $thongbao['file']; ?>" name="file" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 10%;">
                <div class="addgv_tb1" >Trạng thái</div>
                <select name="status" style="height: 36px;font-size: 17px;">
                <?php if ($thongbao['status'] == '1'): ?>
                      <option value="true" selected>
                        sẵn sàng
                      </option>
                      <option value="false">
                        kết thúc
                      </option>
                <?php else: ?>
                    <option value="true" >
                        sẵn sàng
                      </option>
                      <option value="false" selected>
                        kết thúc
                      </option>
                <?php endif; ?>
                </select>
            </div>
        </div>

        <div class="adgv2">
            <div class="addgv_tb" style="width: 15%;">
                <div class="addgv_tb1" >Ngày bắt đầu</div>
                <input type="date" name="batdau" value="<?php echo $thongbao['batdau']; ?>" style="height: 33px;font-size: 17px;">
            </div>
            <div class="addgv_tb" style="width: 15%;margin-left:45px">
                <div class="addgv_tb1" >Ngày kết thúc</div>
                <input type="date" name="ketthuc" value="<?php echo $thongbao['ketthuc']; ?>" style="height: 33px;font-size: 17px;">
            </div>
            <div class="addgv_tb" style="width: 10%;margin-left:40px">
                <div class="addgv_tb1" >Học kỳ</div>
                <input type="text" name="hocky" value="<?php echo $thongbao['hocky']; ?>" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 10%;margin-left:40px">
                <div class="addgv_tb1" >Niên khóa</div>
                <input type="text" name="nienkhoa" value="<?php echo $thongbao['nienkhoa']; ?>" class="addgv_tb2">
            </div>
            <div class="addgv_tb" style="width: 10%;margin-left:40px">
                <div class="addgv_tb1" >Hình thức</div>
                <select name="hinhthuc" style="height: 36px;font-size: 17px;">
                <?php if ($thongbao['hinhthuc'] == '1'): ?>
                      <option value="true" selected>
                        đăng ký
                      </option>
                      <option value="false">
                        thông báo
                      </option>
                <?php else: ?>
                    <option value="true">
                        đăng ký
                      </option>
                      <option value="false" selected>
                        thông báo
                      </option>
                <?php endif; ?>
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
                <?php if ($thongbao['loaidetai'] == '1'): ?>
                    <option value="<?php echo $name; ?>" selected>
                        <?php echo $name; ?>
                    </option>
                <?php else: ?>
                    <option value="<?php echo $name; ?>">
                        <?php echo $name; ?>
                    </option>
                <?php endif; ?>
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
                <?php if ($thongbao['doituong'] == $doituong['doituong']): ?>
                  <input type="radio" name="doituong" value="<?php echo $doituong['doituong']; ?>" style="width: 20px;height: 20px" checked>
                <?php else: ?>
                  <input type="radio" name="doituong" value="<?php echo $doituong['doituong']; ?>" style="width: 20px;height: 20px">
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="addgv_hangcuoi">
              <div class="addgv_message"></div>
              <input type="submit" value="Update" class="addgv_button">
        </form>
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_ddk">
                <input type="hidden" name="id" value="<?php echo $thongbao['id']; ?>">
                <input type="submit" value="Delete" class="addgv_button" style="background-color: #d73d32">
              </form>
        </div>
    
 </div>
</div>
<?php include '../view/footer.php'; ?>