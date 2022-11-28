<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include '../model/database.php';
        include '../model/sinhvien_db.php';
        include '../model/user_db.php';
        
        $id = $_POST['id'];
        $sinhvien = get_one_sinhvien($id);
        $user = get_one_user($id);
        //$taikhoan = $id;
        $taikhoan = $id;
        $password = $user['pass'];
        $hovaten = $sinhvien['hovaten'];
        $ngaysinh = $sinhvien['ngaysinh'];
        $lop = $sinhvien['lop'];
        $tinchitichluy = $sinhvien['tinchitichluy'];
        

    ?>
    
    
    <a><?php echo $hovaten; ?></a>
    <a><?php echo $ngaysinh; ?></a>
    <a><?php echo $lop; ?></a>
    <a><?php echo $tinchitichluy; ?></a>

</body>
</html>