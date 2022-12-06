<?php include '../view/header.php'; ?>
<?php
require_once('../model/database.php');
require_once('../model/dotdangky_db.php');
require_once('../model/doituong_db.php');

?>

<?php
$id = filter_input(INPUT_POST, 'id');
$ddk = get_one_ddk($id);
$doituongsget = get_doituong($id);
$batdau = $ddk['batdau'];
$ketthuc = $ddk['ketthuc'];
$hocky = $ddk['hocky'];
$nienkhoa = $ddk['nienkhoa'];
$hinhthuc = $ddk['hinhthuc'];
$ldt = $ddk['loaidetai'];

?>
<form action="." method="post">
    <input type="hidden" name="action" value="update_gv">
    <div class="addgv_title">Cập nhật thông tin dot dang ky</div>

    <h2>Thoi gian dang ky</h2>
    <input type="hidden" name="action" value="register_ddk">

    <label>Id:</label>
    <input type="text" name="id" value="<?php echo $id; ?>" size="30">

    <label>Ngay bat dau:</label>
    <input type="date" name="batdau" value="<?php echo $batdau; ?>" size="30">

    <label>Ngay ket thuc:</label>
    <input type="date" name="ketthuc" value="<?php echo $ketthuc; ?>" size="30">

    <h2>Thong tin dot dang ky</h2>
    <label>Hoc ky:</label>
    <input type="text" name="hocky" value="<?php echo $hocky; ?>" size="30">

    <label>Nien khoa:</label>
    <input type="text" name="nienkhoa" value="<?php echo $nienkhoa; ?>" size="30">

    <label>Hinh thuc:</label>
    <select name="hinhthuc">
        <?php if ($hinhthuc == 'Online') { ?>
            <option value="online" selected>Online</option>
            <option value="offline">Offline</option>
        <?php } else { ?>
            <option value="Online">Online</option>
            <option value="Offline" selected>Offline</option>
        <?php } ?>
    </select>

    <label>Loai de tai:</label>
    <select name="loaidetai">
        <?php
        require_once('../model/database.php');
        require_once('../model/loaidetai_db.php');

        $loaidetais = get_all_loaidetai();
        foreach ($loaidetais as $loaidetai) :
            $name = $loaidetai['loaidetai'];
        ?>
            <!-- Cần nâng cấp thêm -->
            <?php if ($ldt == $name) { ?>
                <option value="<?php echo $name; ?>" selected><?php echo $name; ?></option>
            <?php } else { ?>
                <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
            <?php } ?>
        <?php endforeach; ?>
    </select>

    <h2>Doi tuong dang ky</h2>
    <?php
    $doituongs = get_all_doituong();
    foreach ($doituongs as $doituong) :
        $dt = $doituong['doituong'];
        $checkdt = 0;
        foreach ($doituongsget as $doituongget) :
            $dtget = $doituongget['doituong'];
    ?>
            <?php if ($dtget == $dt) { ?>
                <input type="checkbox" name="<?php echo $dt; ?>" value="<?php echo $dt; ?>" checked>
                <label for="<?php echo $dt; ?>"><?php echo $dt ?></label>
            <?php }
            if ($dtget != $dt) {
                $checkdt++;
            } ?>
            <?php if ($checkdt == count($doituongsget)) { ?>
                <input type="checkbox" name="<?php echo $dt; ?>" value="<?php echo $dt; ?>">
                <label for="<?php echo $dt; ?>"><?php echo $dt ?></label>
            <?php } ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
    <br>
    <form action="." method="post">
        <input type="hidden" name="action" value="update_ddk">
        <th><input type="submit" name="update" value="Update"></td>
    </form>

</form>