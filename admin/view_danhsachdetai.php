<?php include '../view/header.php'; ?>
<?php
$loaidetai = filter_input(INPUT_POST, 'id');


?>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
<table style="width:100%">
    <thead>
        <tr>
            <th>STT</th>
            <th>Ten de tai</th>
            <th>GVHD</th>
            <th>Chi tiet</th>
            <th>Them hoi dong</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $item_per_page = !empty((int)filter_input(INPUT_GET, 'perpage')) ? (int)filter_input(INPUT_GET, 'perpage') : 10;
        $current_page = (int)filter_input(INPUT_GET, 'page');

        $offset = ($current_page - 1) * $item_per_page;



        require_once('../model/database.php');
        require_once('../model/chitietdetai_db.php');
        require_once('../model/giangvien_db.php');
        //$sinhviens = get_sinhvien_paging($item_per_page, $offset);
        //count
        //$totalRecords = count_sinhvien();
        //$totalPages = ceil($totalRecords / $item_per_page);

        $detais = get_all_detai($loaidetai);
        $i = 0;
        foreach ($detais as $detai) :
            $i++;
            $tendetai = $detai['tendetai'];
            $gvhd = get_one_giangvien($detai['gvhuongdan'])['hovaten'];


        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $tendetai; ?></td>
                <td><?php echo $gvhd; ?></td>
                <form action="view_chitietdetai.php" method="post">
                    <!-- truyen id -->
                    <input type="hidden" name="id" value="<?php echo $detai['id'] ?>">
                    <th><input type="submit" name="view" value="Xem chi tiet"></td>
                </form>
                <form action="view_themhoidong.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $tendetai; ?>">
                    <th><input type="submit" name="view" value="Them hoi dong"></td>
                </form>

            </tr>
        <?php endforeach; ?>
        <?php # include '../view/pagination.php'; 
        ?>
    </tbody>
</table>
<?php include '../view/footer.php'; ?>