<?php include '../view/header.php'; ?>
<?php   
    $admin_url = $app_path . 'admin';
    if (!isset($message)) { $message = ''; } 
?>
<div class="thanhtitle"  style="margin-bottom: 20px;">
 <div class="thanhtitle1">
    <a href="<?php echo $admin_url; ?>" class="thanhtitle2">Sinh viên</a>
 </div>
 <div class="thanhtitle1">
    <span class="thanhtitle3">Trưởng nhóm / Nộp báo cáo</span>
 </div>
</div>

<div class="addgv">
 <div class="addgv1">
    <form action="." method="post">
        <?php 
          $id = filter_input(INPUT_GET, 'id');
          $detai = get_one_chitietdetai($id);
        ?> 
        <input type="hidden" name="action" value="nopbaocao">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="addgv_title">Nhập link tài liệu báo cáo</div>
        <div class="adgv2">
            <div class="addgv_tb" style="width: 10%;">
                <div class="addgv_tb1" >ID</div>
                <input type="text" name="id" value="<?php echo $detai['id']; ?>" class="addgv_tb2" readonly>
            </div>
            <div class="addgv_tb" style="width: 85%;margin-left:20px">
                <div class="addgv_tb1" >Title</div>
                <input type="text" name="tile" value="<?php echo $detai['tendetai']; ?>" class="addgv_tb2" readonly>
            </div>
        </div>
        <div class="adgv2">
            <div class="addgv_tb" style="width: 100%;">
                <div class="addgv_tb1" >File</div>
                <input type="text" name="file" value="<?php echo $detai['file']; ?>" class="addgv_tb2">
            </div>
        </div>
        </div>
        <div class="addgv_hangcuoi">
              <div class="addgv_message"><?php echo $message; ?></div>
              <input type="submit" value="Update" class="addgv_button">
        </form>
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_file_baocao">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" value="Delete" class="addgv_button" style="background-color: #d73d32">
              </form>
        </div>

    
 </div>
</div>
<?php include '../view/footer.php'; ?>