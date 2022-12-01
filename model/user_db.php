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

function get_one_user($tk) {
    global $db;
    $query = '
    SELECT * FROM "user" WHERE taikhoan= :tk';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':tk', $tk);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return null;
    }
    return $result;
}

function delete_user($taikhoan){
    global $db;
    $query = '
    DELETE FROM "user" WHERE taikhoan = :taikhoan';
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

function update_user($taikhoan, $password){
    global $db;
    $password = sha1($taikhoan . $password);
    $query = 'UPDATE "user" SET pass = :mk where "user".taikhoan = :tk';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':tk', $taikhoan);
        $statement->bindValue(':mk', $password);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    } 
}
?>