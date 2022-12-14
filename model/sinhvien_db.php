<?php
function is_sv_thuocdoituong($taikhoan, $doituong) {
    global $db;
    $query = '
        select * from sinhvien where "user" = :taikhoan and doituong = :doituong';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->bindValue(':doituong', $doituong);

        $statement->execute();
        $valid = ($statement->rowCount() == 1);
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        //return false;
    }
    return $valid;
}
function is_sv_thuocchuyennganh($taikhoan, $chuyennganh) {
    global $db;
    $query = '
        select * from sinhvien where "user" = :taikhoan and chuyennganh = :chuyennganh';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->bindValue(':chuyennganh', $chuyennganh);

        $statement->execute();
        $valid = ($statement->rowCount() == 1);
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        //return false;
    }
    return $valid;
}
function add_sinhvien($taikhoan,$hovaten,$ngaysinh,$gioitinh,$doituong,$ctdt,$lop,$chuyennganh,$tinchitichluy) { //void
    global $db;

    $query = '
        INSERT INTO sinhvien
        VALUES (:taikhoan, :hovaten, :ngaysinh, :gioitinh, :doituong, :ctdt, :lop, :chuyennganh, :tinchitichluy)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->bindValue(':hovaten', $hovaten);
        $statement->bindValue(':ngaysinh', $ngaysinh);
        $statement->bindValue(':gioitinh', $gioitinh);
        $statement->bindValue(':doituong', $doituong);
        $statement->bindValue(':ctdt', $ctdt);
        $statement->bindValue(':lop', $lop);
        $statement->bindValue(':chuyennganh', $chuyennganh);
        $statement->bindValue(':tinchitichluy', $tinchitichluy);
        
        $statement->execute();
        $statement->closeCursor();
        return true;
    } catch (PDOException $e) {
        //$error_message = $e->getMessage();
        //display_db_error($error_message);
        return false;
    }
}
function get_all_sinhvien() {
    global $db;
    $query = '
    SELECT * FROM sinhvien';
    
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return null;
    }
}
function get_sinhviens_by_search($tukhoa) {
    $tukhoa1 = '%' . $tukhoa . '%';

    global $db;
    $query = '
    select * from sinhvien join "user" on sinhvien."user" = "user".taikhoan 
    where taikhoan like :tukhoa1 or hovaten like :tukhoa2';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':tukhoa1', $tukhoa1);
        $statement->bindValue(':tukhoa2', $tukhoa1);

        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return null;
    }
}

function get_one_sinhvien($taikhoan) {
    global $db;
    $query = '
    select * from sinhvien where "user" = :taikhoan';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return null;
    }
}
function update_sinhvien($taikhoan,$hovaten,$ngaysinh,$gioitinh,$doituong,$ctdt,$lop,$chuyennganh,$tinchitichluy) {
    global $db;   
  
    $query = '
    update sinhvien set hovaten = :hovaten, ngaysinh = :ngaysinh, gioitinh = :gioitinh,
    doituong = :doituong, ctdt = :ctdt, lop = :lop, chuyennganh = :chuyennganh, 
    tinchitichluy = :tinchitichluy where "user" = :taikhoan';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->bindValue(':hovaten', $hovaten);
        $statement->bindValue(':ngaysinh', $ngaysinh);
        $statement->bindValue(':gioitinh', $gioitinh);
        $statement->bindValue(':doituong', $doituong);
        $statement->bindValue(':ctdt', $ctdt);
        $statement->bindValue(':lop', $lop);
        $statement->bindValue(':chuyennganh', $chuyennganh);
        $statement->bindValue(':tinchitichluy', $tinchitichluy);

        $statement->execute();
        $statement->closeCursor();
        return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return false;
    }
}
function delete_sinhvien($taikhoan)
{
    global $db;
    $query = '
    DELETE FROM "sinhvien" WHERE "user" = :taikhoan';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->execute();
        $statement->closeCursor();
        //return true;

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        //return false;

    }
}


//thong ke
function count_sinhvien()
{
    global $db;
    $query = '
    SELECT COUNT(\'user\') from sinhvien';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();
        //return true;

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return null;
    }
}

function count_giangvien()
{
    global $db;
    $query = '
    SELECT COUNT(\'user\') from giangvien';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();
        //return true;

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return null;
    }
}
?>