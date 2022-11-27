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
            <th>Hanh dong</th>
        </tr>
    </thead>
    <tbody>
        <?php
            require_once('model/database.php');
            require_once('model/sinhvien_db.php');
                    
            $sinhviens = get_all_sinhvien();
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
                    <input type="hidden" name="id" value="<?php echo $sinhvien['user'] ?>">
                    <td><input type="submit" name="edit" value="Edit"></td>
                <td><a href="" class="button">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include '../view/footer.php'; ?>