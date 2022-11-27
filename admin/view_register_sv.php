<?php include '../view/header.php'; ?>
<?php 
if (!isset($taikhoan)) { $taikhoan = ''; } 
if (!isset($password)) { $password = ''; } 

if (!isset($hovaten)) { $hovaten = ''; } 
if (!isset($ngaysinh)) { $ngaysinh = ''; } 
if (!isset($lop)) { $lop = ''; } 
if (!isset($tinchitichluy)) { $tinchitichluy = ''; } 

if (!isset($message)) { $message = ''; } 
?>
<main>
    <h1>User</h1>
    <form action="." method="post" id="register_form">

        <h2>User Account</h2>
        <input type="hidden" name="action" value="register_sv">

        <label>Tai khoan:</label>
        <input type="text" name="taikhoan"
               value="<?php echo $taikhoan; ?>" size="30">

        <label>Password:</label>
        <input type="password" name="password" size="30">

        <h2>Thong tin sinh vien</h2>
        <label>Ho va ten:</label>
        <input type="text" name="hovaten"
               value="<?php echo $hovaten; ?>"
               size="30">

        <label>Ngay sinh:</label>
        <input type="date" name="ngaysinh"
               value="<?php echo $ngaysinh; ?>"
               size="30">

        
        
        
        
        <label>Gioi tinh:</label>
        <select name="gioitinh">
            <option value="true">Nam</option>
            <option value="false">Nu</option>
        </select>

        <label>Doi tuong:</label>
        <select name="doituong">
            <?php
                require_once('model/database.php');
                require_once('model/doituong_db.php');
            
                $doituongs = get_all_doituong();
                foreach($doituongs as $doituong) :
                    $name = $doituong['doituong'];
            ?>
              <option value="<?php echo $name; ?>" >
                    <?php echo $name; ?>
              </option>
        <?php endforeach; ?>
       </select>

        <lable>Chuong trinh dao tao:</lable>
        <select name="ctdt">
            <?php
                require_once('model/database.php');
                require_once('model/ctdt_db.php');
            
                $ctdts = get_all_ctdt();
                foreach($ctdts as $ctdt) :
                    $name = $ctdt['ctdt'];
            ?>
              <option value="<?php echo $name; ?>" >
                    <?php echo $name; ?>
              </option>
        <?php endforeach; ?>
       </select>

        <label>Lop:</label>
        <input type="text" name="lop"
               value="<?php echo $lop; ?>"
               size="10">
        
        <lable>Chuyen nganh:</lable>
        <select name="chuyennganh">
            <?php
                require_once('model/database.php');
                require_once('model/chuyennganh_db.php');
            
                $chuyennganhs = get_all_chuyennganh();
                foreach($chuyennganhs as $chuyennganh) :
                    $name = $chuyennganh['tenchuyennganh'];
            ?>
              <option value="<?php echo $name; ?>" >
                    <?php echo $name; ?>
              </option>
        <?php endforeach; ?>
       </select><br>
        
       <label>Tin chi tich luy:</label>
        <input type="number" name="tinchitichluy"
               value="<?php echo $tinchitichluy; ?>">

        <label>&nbsp;</label>
        <input type="submit" value="Dang ky">
    </form>
    <span class="error"><?php echo $message; ?></span><br>
</main>
<?php include '../view/footer.php'; ?>