<?php
function get_all_chuyennganh() {
    global $db;
    $query = '
        SELECT * FROM chuyennganh';
    
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        //$error_message = $e->getMessage();
        //display_db_error($error_message);
        return null;
    }
}
function get_one_chuyennganh($tenchuyennnganh)
{
    global $db;
    $query = '
        SELECT * FROM chuyennganh where tenchuyennganh = :tenchuyennganh';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':tenchuyennganh', $tenchuyennnganh);

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
function add_chuyennganh($tenchuyennnganh, $mota) { //void
    global $db;

    $query = '
        insert into chuyennganh values (:tenchuyennnganh, :mota)';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':tenchuyennnganh', $tenchuyennnganh);
        $statement->bindValue(':mota', $mota);

        $statement->execute();
        $statement->closeCursor();
        //return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        //return false;
    }
}
function update_chuyennganh($tenchuyennganh, $mota) {
    global $db;
    
    $query = '
        update chuyennganh set mota = :mota where tenchuyennganh = :tenchuyennganh';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':tenchuyennganh', $tenchuyennganh);
        $statement->bindValue(':mota', $mota);

        $statement->execute();
        $statement->closeCursor();
        //return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        //return false;
    }
}
function delete_chuyennganh($tenchuyennganh)
{
    global $db;
    $query = '
    DELETE FROM chuyennganh WHERE tenchuyennganh = :tenchuyennganh';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':tenchuyennganh', $tenchuyennganh);
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