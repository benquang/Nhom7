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
            <th>GVPB</th>
            <th>Chi tiet</th>
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
        foreach ($detais as $detai) :
            $id = $detai['id'];
            $tendetai = $detai['tendetai'];
            $gvhd = get_one_giangvien($detai['gvhuongdan'])['hovaten'];
            $gvpb = get_one_giangvien($detai['gvphanbien']);



        ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $tendetai; ?></td>
                <td><?php echo $gvhd; ?></td>
                <?php if ($gvpb != null) { ?>
                    <td><?php echo $gvpb['hovaten'] ?></td>
                <?php } else { ?>
                    <form action="view_phangvpb.php" method="post">
                        <!-- truyen id -->
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <th><input type="submit" name="phancong" value="Phan cong"></td>
                    </form>
                <?php } ?>
                <form action="view_chitietdetai.php" method="post">
                    <!-- truyen id -->
                    <input type="hidden" name="id" value="<?php echo $detai['id'] ?>">
                    <th><input type="submit" name="view" value="Xem chi tiet"></td>
                </form>


            </tr>
        <?php endforeach; ?>
        <?php # include '../view/pagination.php'; 
        ?>
    </tbody>
</table>
<?php include '../view/footer.php'; ?>