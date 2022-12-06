<?php include '../view/header.php'; ?>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
<form action="view_register_ddk.php" method="post">
    <input type="hidden" name="action" value="register_ddk">
    <th><input type="submit" name="register" value="Them dot dang ky"></td>
</form>
<table style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Ngay bat dau</th>
            <th>Ngay ket thuc</th>
            <th>Hoc ky</th>
            <th>Nien khoa</th>
            <th>Hinh thuc</th>
            <th>Loai de tai</th>
            <th>Doi tuong dang ky</th>
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
        require_once('../model/dotdangky_db.php');
        require_once('../model/doituong_db.php');
        //$sinhviens = get_sinhvien_paging($item_per_page, $offset);
        //count
        //$totalRecords = count_sinhvien();
        //$totalPages = ceil($totalRecords / $item_per_page);


        $ddks = get_all_ddk();
        foreach ($ddks as $ddk) :
            //set bien
            $id = $ddk['id'];
            $batdau = $ddk['batdau'];
            $ketthuc = $ddk['ketthuc'];
            $hocky = $ddk['hocky'];
            $nienkhoa = $ddk['nienkhoa'];
            $hinhthuc = $ddk['hinhthuc'];
            $loaidetai = $ddk['loaidetai'];
            $doituong = '';
            $dts = get_doituong($id);

        ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $batdau; ?></td>
                <td><?php echo $ketthuc; ?></td>
                <td><?php echo $hocky; ?></td>
                <td><?php echo $nienkhoa; ?></td>
                <td><?php echo $hinhthuc; ?></td>
                <td><?php echo $loaidetai; ?></td>
                
                <?php foreach ($dts as $dt) :
                    
                    $doituong = $doituong.' '.$dt['doituong'];
                endforeach;?>
                <td><?php echo $doituong; ?></td>

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