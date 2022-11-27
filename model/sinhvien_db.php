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
        $statement->bindValue(':chuyenganh', $chuyennganh);
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
?>