<?php include '../view/header.php'; ?>
<?php 
if (!isset($taikhoan)) { $taikhoan = ''; } 
if (!isset($password)) { $password = ''; } 
if (!isset($hovaten)) { $hovaten = ''; } 
if (!isset($cdkh)) { $cdkh = ''; } 

if (!isset($chucvu)) { $chucvu = ''; } 

if (!isset($message)) { $message = ''; } 
?>
<main>
    <h1>User</h1>
    <form action="." method="post" id="register_form">

        <h2>User Account</h2>
        <input type="hidden" name="action" value="register_gv">

        <label>Tai khoan:</label>
        <input type="text" name="taikhoan"
               value="<?php echo $taikhoan; ?>" size="30">

        <label>Password:</label>
        <input type="password" name="password" size="30">

        <h2>Thong tin giang vien</h2>
        <label>Ho va ten:</label>
        <input type="text" name="hovaten"
               value="<?php echo $hovaten; ?>"
               size="30">

        <label>CDKH:</label>
        <input type="text" name="cdkh"
               value="<?php echo $cdkh; ?>"
               size="30">

        <label>Chuyen nganh:</label>
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
       </select>

        <label>Chuc vu:</label>
        <input type="text" name="chucvu"
               value="<?php echo $chucvu; ?>"
               size="30">

        <label>&nbsp;</label>
        <input type="submit" value="Dang ky">
    </form>
    <span class="error"><?php echo $message; ?></span><br>
</main>
<?php include '../view/footer.php'; ?>