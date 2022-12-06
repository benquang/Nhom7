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
?>