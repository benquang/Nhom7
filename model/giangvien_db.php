<?php
function add_giangvien($taikhoan, $hovaten, $cdkh, $chuyennganh, $chucvu) { //
    global $db;

    $query = '
        INSERT INTO giangvien
        VALUES (:taikhoan, :hovaten, :cdkh, :chuyennganh, :chucvu)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->bindValue(':hovaten', $hovaten);
        $statement->bindValue(':cdkh', $cdkh);
        $statement->bindValue(':chuyennganh', $chuyennganh);
        $statement->bindValue(':chucvu', $chucvu);

        $statement->execute();
        $statement->closeCursor();
        return true;
    } catch (PDOException $e) {
        //$error_message = $e->getMessage();
        //display_db_error($error_message);
        return false;
    }
}
function get_all_giangvien_by_chuyennganh($chuyennganh) {
    global $db;
    $query = '
        select * from giangvien where chuyennganh = :chuyennganh';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':chuyennganh', $chuyennganh);
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
function get_all_giangvien() {
    global $db;
    $query = '
    select * from giangvien join "user" on giangvien."user" = "user".taikhoan';
    
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
function get_giangviens_by_search($tukhoa) {
    $tukhoa1 = '%' . $tukhoa . '%';

    global $db;
    $query = '
    select * from giangvien join "user" on giangvien."user" = "user".taikhoan 
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
function get_one_giangvien($taikhoan) {
    global $db;
    $query = '
    select * from giangvien join "user" on giangvien."user" = "user".taikhoan where taikhoan = :taikhoan';
    
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
function update_giangvien($taikhoan, $hovaten, $cdkh, $chuyennganh, $chucvu) {
    global $db;
    
    $query = '
    update giangvien set hovaten = :hovaten, cdkh = :cdkh, chuyennganh = :chuyennganh, chucvu = :chucvu where "user" = :user';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':user', $taikhoan);
        $statement->bindValue(':hovaten', $hovaten);
        $statement->bindValue(':cdkh', $cdkh);
        $statement->bindValue(':chuyennganh', $chuyennganh);
        $statement->bindValue(':chucvu', $chucvu);

        $statement->execute();
        $statement->closeCursor();
        //return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        //return false;
    }
}
function delete_giangvien($taikhoan)
{
    global $db;
    $query = '
    DELETE FROM "giangvien" WHERE "user" = :taikhoan';
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

?>