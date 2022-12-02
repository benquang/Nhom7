<?php
function add_giangvien($taikhoan, $hovaten, $cdkh, $chuyennganh, $chucvu) { //void
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

function get_all_giangvien(){
    global $db;
    $query ='
    SELECT * FROM "giangvien"';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return null;
    }
    return $result;
}

function delete_giangvien($taikhoan)
{
    global $db;
    $query = '
    DELETE FROM "giangvien" WHERE giangvien.user = :taikhoan';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_one_giangvien($taikhoan)
{
    global $db;
    $query = '
        SELECT * 
        FROM "giangvien" 
        WHERE giangvien.user = :taikhoan';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
    return $result;
}
?>