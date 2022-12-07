<?php
function get_all_ctdt() {
    global $db;
    $query = '
        SELECT * FROM chuongtrinhdaotao';
    
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
function get_one_ctdt($ctdt)
{
    global $db;
    $query = '
        SELECT * FROM chuongtrinhdaotao where ctdt = :ctdt';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':ctdt', $ctdt);

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
function add_ctdt($ctdt, $nganhdaotao) { //void
    global $db;

    $query = '
        insert into chuongtrinhdaotao(ctdt,nganhdaotao) values (:ctdt, :nganhdaotao)';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':ctdt', $ctdt);
        $statement->bindValue(':nganhdaotao', $nganhdaotao);

        $statement->execute();
        $statement->closeCursor();
        //return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        //return false;
    }
}
function update_ctdt($ctdt, $nganhdaotao) {
    global $db;
    
    $query = '
        update chuongtrinhdaotao set nganhdaotao = :nganhdaotao where ctdt = :ctdt';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':ctdt', $ctdt);
        $statement->bindValue(':nganhdaotao', $nganhdaotao);

        $statement->execute();
        $statement->closeCursor();
        //return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        //return false;
    }
}
function delete_ctdt($ctdt)
{
    global $db;
    $query = '
    DELETE FROM chuongtrinhdaotao WHERE ctdt = :ctdt';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':ctdt', $ctdt);
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