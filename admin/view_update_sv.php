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
        include '../model/user_db.php';
        include '../model/sinhvien_db.php';
        $id = $_POST['id'];
        $sinhvien = get_one_sinhvien($id);
        $hovaten = $sinhvien['hovaten'];
    ?>
    <a><?php echo $hovaten; ?></a>
</body>
</html>