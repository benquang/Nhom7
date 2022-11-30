<?php include '../view/header.php'; ?>
<style>
table, th, td {
  border:1px solid black;
}
</style>

<table style="width:100%">
    <thead>
        <tr>
            <th>Tai khoan</th>
            <th>Ho va ten</th>
            <th>Ngay sinh</th>
            <th>Gioi tinh</th>
            <th>Doi tuong</th>
            <th>Chuong trinh dao tao</th>
            <th>Lop</th>
            <th>Chuyen nganh</th>
            <th>Tin chi tich luy</th>
            <th>Sua</th>
            <th>Xoa</th>
        </tr>
    </thead>
    <tbody>
        <?php

            $item_per_page = !empty((int)filter_input(INPUT_GET, 'perpage'))?(int)filter_input(INPUT_GET, 'perpage'):10;
            $current_page = (int)filter_input(INPUT_GET, 'page');

            $offset = ($current_page - 1) * $item_per_page;

            

            require_once('model/database.php');
            require_once('model/sinhvien_db.php');
            $sinhviens = get_sinhvien_paging($item_per_page, $offset);
            //count
            $totalRecords = count_sinhvien();
            $totalPages = ceil($totalRecords / $item_per_page);


            //$sinhviens = get_all_sinhvien();
            foreach($sinhviens as $sinhvien) :
                //set bien
                $taikhoan = $sinhvien['user'];
                $hovaten = $sinhvien['hovaten'];
                $ngaysinh = $sinhvien['ngaysinh'];
                $gioitinh = $sinhvien['gioitinh'];
                if ($gioitinh == 'true'){
                    $gioitinh ='Nam';
                }
                else{
                    $gioitinh = 'Nu';
                }
                $doituong = $sinhvien['doituong'];
                $ctdt = $sinhvien['ctdt'];
                $lop = $sinhvien['lop'];
                $chuyennganh = $sinhvien['chuyennganh'];
                $tinchitichluy = $sinhvien['tinchitichluy'];

        ?>
            <tr>
                <td><?php echo $taikhoan; ?></td>
                <td><?php echo $hovaten; ?></td>
                <td><?php echo $ngaysinh; ?></td>
                <td><?php echo $gioitinh; ?></td>
                <td><?php echo $doituong; ?></td>
                <td><?php echo $ctdt; ?></td>
                <td><?php echo $lop; ?></td>
                <td><?php echo $chuyennganh; ?></td>
                <td><?php echo $tinchitichluy; ?></td>

                <form action="view_update_sv.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $taikhoan; ?>">
                    <th><input type="submit" name="edit" value="Edit"></td>
                    
                </form>
                <!--Can sua doan nay-->
                <form action = "delete_sinhvien.php" method="post" >
                    <input type="hidden" name="id" value="<?php echo $taikhoan; ?>">
                    <th><input type="submit" name="delete" value="Delete"></td>
                </form>
            </tr>
        <?php endforeach; ?>
        <?php include '../view/pagination.php'; ?>
    </tbody>
</table>

<?php include '../view/footer.php'; ?>