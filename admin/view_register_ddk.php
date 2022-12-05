<?php include '../view/header.php'; ?>
<?php
if (!isset($batdau)) {
    $batdau = '';
}
if (!isset($ketthuc)) {
    $ketthuc = '';
}
if (!isset($hocky)) {
    $hocky = '';
}
if (!isset($nienkhoa)) {
    $nienkhoa = '';
}
if (!isset($id)) {
    $id = '';
}
if (!isset($message)) {
    $message = '';
}

?>
<main>
    <h1>Dot dang ky</h1>
    <form action="." method="post">

        <h2>Thoi gian dang ky</h2>
        <input type="hidden" name="action" value="register_ddk">

        <label>Id:</label>
        <input type="text" name="id" value="<?php echo $id; ?>" size="30">

        <label>Ngay bat dau:</label>
        <input type="date" name="batdau" value="<?php echo $batdau; ?>" size="30">

        <label>Password:</label>
        <input type="date" name="ketthuc" value="<?php echo $ketthuc; ?>" size="30">

        <h2>Thong tin dot dang ky</h2>
        <label>Hoc ky:</label>
        <input type="text" name="hocky" value="<?php echo $hocky; ?>" size="30">

        <label>Nien khoa:</label>
        <input type="text" name="nienkhoa" value="<?php echo $nienkhoa; ?>" size="30">

        <label>Hinh thuc:</label>
        <select name="hinhthuc">
            <option value="online">Online</option>
            <option value="offline">Offline</option>
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
                <option value="<?php echo $name; ?>">
                    <?php echo $name; ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <label>Nien khoa:</label>
        <input type="text" name="nienkhoa" value="<?php echo $nienkhoa; ?>" size="30">

        <h2>Doi tuong dang ky</h2>
        <?php 
            require_once('../model/database.php');
            require_once('../model/doituong_db.php');
            $doituongs = get_all_doituong();
            foreach ($doituongs as $doituong):
                $dt = $doituong['doituong'];

        ?>
        <input type="checkbox" name="doituong" value="<?php echo $dt; ?>">
        <label for="doituong"><?php echo $dt ?></label>
        <?php endforeach; ?><br>

        <form action="." method="post">
            <input type="hidden" name="action" value="register_ddk">
            <th><input type="submit" name="dang ky" value="Dang ky"></td>
        </form>

        <form action="." method="post">
            <input type="hidden" name="action" value="view_ddk">
            <th><input type="submit" name="cancel" value="Cancel"></td>
        </form>
        <span class="error"><?php echo $message; ?></span><br>
</main>