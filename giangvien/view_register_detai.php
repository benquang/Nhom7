<?php include '../view/header.php'; ?>
<?php
if (!isset($id)) {
    $id = '';
}
if (!isset($tendetai)) {
    $tendetai = '';
}
if (!isset($muctieu)) {
    $muctieu = '';
}
if (!isset($yeucau)) {
    $yeucau = '';
}
if (!isset($sanpham)) {
    $sanpham = '';
}
if (!isset($chuthich)) {
    $chuthich = '';
}
if (!isset($soluongsv)) {
    $soluongsv = '';
}
if (!isset($trangthai)) {
    $trangthai = 'Được bảo vệ';
}
if (!isset($message)) {
    $message = '';
}

?>
<main>
    <h1>Dang ky de tai</h1>
    <form action="." method="post">

        <h2>Thong tin de tai</h2>
        <input type="hidden" name="action" value="register_ddk">

        <label>Id:</label>
        <input type="text" name="id" value="<?php echo $id; ?>" size="30">

        <label>Ten de tai:</label>
        <input type="text" name="tendetai" value="<?php echo $tendetai; ?>" size="30">

        <label>Muc tieu:</label>
        <input type="text" name="muctieu" value="<?php echo $muctieu; ?>" size="30">

        <label>Yeu cau:</label>
        <input type="text" name="yeucau" value="<?php echo $yeucau; ?>" size="30">

        <label>San pham:</label>
        <input type="text" name="sanpham" value="<?php echo $sanpham; ?>" size="30">

        <label>Chu thich:</label>
        <input type="text" name="chuthich" value="<?php echo $chuthich; ?>" size="30">

        <label>Cho phep dang ky chuyen nganh:</label>
        <select name="dkkcn">
            <option value="true">Co</option>
            <option value="false">Khong</option>
        </select>

        <label>Chuyen nganh:</label>
        <select name="chuyennganh" style="height: 36px;font-size: 17px;">
            <?php
            require_once('../model/database.php');
            require_once('../model/chuyennganh_db.php');
            $chuyennganhs = get_all_chuyennganh();
            foreach ($chuyennganhs as $chuyennganh) :
                $name = $chuyennganh['tenchuyennganh'];
            ?>
                <option value="<?php echo $name; ?>">
                    <?php echo $name; ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <label>So luong sinh vien:</label>
        <input type="number" name="soluongsv" value="<?php echo $soluongsv; ?>" size="30">

        <input type="hidden" name="trangthai" value="<?php echo $trangthai; ?>"
        <br>
        <form action="." method="post">
            <input type="hidden" name="action" value="register_detai">
            <th><input type="submit" name="dang ky" value="Dang ky"></td>
        </form>
        <br>
        <form action="." method="post">
            <input type="hidden" name="action" value="view_ddk">
            <th><input type="submit" name="cancel" value="Cancel"></td>
        </form>
        <span class="error"><?php echo $message; ?></span><br>
</main>
<?php include '../view/footer.php'; ?>