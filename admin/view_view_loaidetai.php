<?php include '../view/header.php'; ?>

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
            <th>Loai de tai</th>
            <th>Xem chi tiet</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $item_per_page = !empty((int)filter_input(INPUT_GET, 'perpage')) ? (int)filter_input(INPUT_GET, 'perpage') : 10;
        $current_page = (int)filter_input(INPUT_GET, 'page');

        $offset = ($current_page - 1) * $item_per_page;



        require_once('../model/database.php');
        require_once('../model/loaidetai_db.php');
        //$sinhviens = get_sinhvien_paging($item_per_page, $offset);
        //count
        //$totalRecords = count_sinhvien();
        //$totalPages = ceil($totalRecords / $item_per_page);

        $loaidetais = get_all_loaidetai();
        $i = 0;
        foreach ($loaidetais as $loaidetai) :
            $i++;
            $tenloai = $loaidetai['loaidetai'];


        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $tenloai; ?></td>
                <form action="view_danhsachdetai.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $tenloai; ?>">
                    <th><input type="submit" name="view" value="Xem chi tiet"></td>
                </form>


            </tr>
        <?php endforeach; ?>
        <?php # include '../view/pagination.php'; 
        ?>
    </tbody>
</table>
<?php include '../view/footer.php'; ?>