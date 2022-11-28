<?php
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

function get_one_sinhvien($taikhoan) {
    global $db;
    $query = '
        SELECT * 
        FROM "sinhvien" 
        WHERE sinhvien.user = :taikhoan';
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
    } 
}

function get_sinhvien_paging($item_per_page, $offset){
    global $db;
    $query = '
    SELECT * FROM "sinhvien" ORDER BY doituong ASC LIMIT :ipp OFFSET :offset';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':ipp', $item_per_page);
        $statement->bindValue(':offset', $offset);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    } 
}

function count_sinhvien(){
    global $db;
    $query = '
    SELECT * FROM sinhvien';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $count = $statement->rowCount();
        $statement->closeCursor();
    }
    catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
    return $count;
}
?>