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
        //return false;
    }
    return $valid;
}
function check_taikhoan_pass($taikhoan,$pass) { // return class
    global $db;
    $pass_hash = sha1($taikhoan . $pass);  //ham bam

    $query = '
        SELECT * FROM "user"
        WHERE taikhoan = :taikhoan and pass = :pass';
    try
    {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->bindValue(':pass', $pass_hash);
        $statement->execute();
        $user = $statement->fetch();
        $statement->closeCursor();
        return $user;
    }
    catch (PDOException $e)
    {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return null;
    }
}
function add_user($taikhoan, $pass, $is_admin, $is_gv, $is_sv, $is_truongbomon) { //void
    global $db;
    //$user = new User();
    $pass_hash = sha1($taikhoan . $pass);  //ham bam

    $query = '
        INSERT INTO "user"
        VALUES (:taikhoan, :password, :is_admin, :is_gv, :is_sv, :is_truongbomon)';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->bindValue(':password', $pass_hash);
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
function update_priveledge($taikhoan, $is_admin, $istruongbomon) {
    global $db;
    
    $query = '
    update "user" set is_admin = :is_admin, is_truongbomon = :istruongbomon where taikhoan = :taikhoan';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->bindValue(':is_admin', $is_admin);
        $statement->bindValue(':istruongbomon', $istruongbomon);
        $statement->execute();
        $statement->closeCursor();
        //return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        //return false;
    }
}
function change_password($taikhoan, $pass) {
    global $db;

    $pass_hash = sha1($taikhoan . $pass);  //ham bam

    $query = '
    update "user" set pass = :pass where taikhoan = :taikhoan';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->bindValue(':pass', $pass_hash);
        $statement->execute();
        $statement->closeCursor();
        return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return false;
    }
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
        //return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        //return false;

    } 
}
?>