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
function get_one_nganhdaotao($tennganh)
{
    global $db;
    $query = '
        SELECT * FROM nganhdaotao where tennganh = :tennganh';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':tennganh', $tennganh);

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
function update_nganhdaotao($tennganh, $mota) {
    global $db;
    
    $query = '
        update nganhdaotao set mota = :mota where tennganh = :tennganh';
    
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
function delete_nganhdaotao($tennganh)
{
    global $db;
    $query = '
    DELETE FROM nganhdaotao WHERE tennganh = :tennganh';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':tennganh', $tennganh);
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