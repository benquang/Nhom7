<?php
function is_valid_taikhoan($taikhoan) {
    global $db;
    $query = '
        SELECT taikhoan FROM "user"
        WHERE taikhoan = :taikhoan';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->execute();
        $valid = ($statement->rowCount() == 1);
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
    return $valid;
}
function get_user($taikhoan) { // return class
    global $db;
    $query = '
        SELECT * FROM "user"
        WHERE taikhoan = :taikhoan';
    $statement = $db->prepare($query);
    $statement->bindValue(':taikhoan', $taikhoan);
    $statement->execute();
    $user = $statement->fetch();
    
    $statement->closeCursor();
    return $user;
}
function add_user($taikhoan, $password, $is_admin, $is_gv, $is_sv, $is_truongbomon) { //void
    global $db;
    //$user = new User();
    $password = sha1($taikhoan . $password);  //ham bam

    $query = '
        INSERT INTO "user"
        VALUES (:taikhoan, :password, :is_admin, :is_gv, :is_sv, :is_truongbomon)';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':is_admin', $is_admin);
        $statement->bindValue(':is_gv', $is_gv);
        $statement->bindValue(':is_sv', $is_sv);
        $statement->bindValue(':is_truongbomon', $is_truongbomon);
        $statement->execute();
        $statement->closeCursor();
        return true;
    } catch (PDOException $e) {
        //$error_message = $e->getMessage();
        //display_db_error($error_message);
        return false;
    }

}

function get_one_user($taikhoan) {
    global $db;
    $query = "SELECT * FROM user WHERE taikhoan=".$taikhoan."";
    
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
?>