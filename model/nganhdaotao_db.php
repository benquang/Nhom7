<?php
function get_all_nganhdaotao() {
    global $db;
    $query = '
        SELECT * FROM nganhdaotao';
    
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
function add_nganhdaotao($tennganh, $mota) { //void
    global $db;

    $query = '
        insert into nganhdaotao values (:tennganh, :mota)';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':tennganh', $tennganh);
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