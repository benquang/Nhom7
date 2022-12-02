<?php include '../view/header.php'; ?>
<?php if (!isset($message)) {
    $message = '';
} ?>

<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
<form action="." method="post">
    <input type="hidden" name="action" value="register_gv">
    <th><input type="submit" name="register" value="Them giang vien"></td>
</form>
<table style="width:100%">
    <thead>
        <tr>
            <th>Tai khoan</th>
            <th>Ho va ten</th>
            <th>CDKH</th>
            <th>Chuyen nganh</th>
            <th>Chuc vu</th>
            <th>Sua</th>
            <th>Xoa</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $item_per_page = !empty((int)filter_input(INPUT_GET, 'perpage')) ? (int)filter_input(INPUT_GET, 'perpage') : 10;
        $current_page = (int)filter_input(INPUT_GET, 'page');

        $offset = ($current_page - 1) * $item_per_page;



        require_once('../model/database.php');
        require_once('../model/giangvien_db.php');
        //$sinhviens = get_sinhvien_paging($item_per_page, $offset);
        //count
        //$totalRecords = count_sinhvien();
        //$totalPages = ceil($totalRecords / $item_per_page);


        $giangviens = get_all_giangvien();
        foreach ($giangviens as $giangvien) :
            //set bien
            $taikhoan = $giangvien['user'];
            $hovaten = $giangvien['hovaten'];
            $cdkh = $giangvien['cdkh'];
            $chuyennganh = $giangvien['chuyennganh'];
            $chucvu = $giangvien['chucvu'];

        ?>
            <tr>
                <td><?php echo $taikhoan; ?></td>
                <td><?php echo $hovaten; ?></td>
                <td><?php echo $cdkh; ?></td>
                <td><?php echo $chuyennganh; ?></td>
                <td><?php echo $chucvu; ?></td>

                <form action="view_update_gv.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $taikhoan; ?>">
                    <th><input type="submit" name="edit" value="Edit"></td>

                </form>
                <!--Can sua doan nay-->
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_gv">
                    <input type="hidden" name="id" value="<?php echo $taikhoan; ?>">
                    <th><input type="submit" name="delete" value="Delete"></td>
                </form>
            </tr>
        <?php endforeach; ?>
        <?php # include '../view/pagination.php'; 
        ?>
    </tbody>
</table>
<span class="error"><?php echo $message; ?></span><br>
<?php include '../view/footer.php'; ?>