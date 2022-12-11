<?php

function get_all_loaidetai()
{
    global $db;
    $query = '
        SELECT * FROM "loaidetai"';

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
function get_one_loaidetai($loaidetai)
{
    global $db;
    $query = '
        SELECT * FROM "loaidetai" where loaidetai = :loaidetai';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':loaidetai', $loaidetai);

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
function add_loaidetai($loaidetai, $mota) { //void
    global $db;

    $query = '
        insert into loaidetai values (:loaidetai, :mota)';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':loaidetai', $loaidetai);
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
function update_loaidetai($loaidetai, $ghichu) {
    global $db;
    
    $query = '
        update loaidetai set ghichu = :ghichu where loaidetai = :loaidetai';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':loaidetai', $loaidetai);
        $statement->bindValue(':ghichu', $ghichu);

        $statement->execute();
        $statement->closeCursor();
        //return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        //return false;
    }
}
function delete_loaidetai($loaidetai)
{
    global $db;
    $query = '
    DELETE FROM loaidetai WHERE loaidetai = :loaidetai';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':loaidetai', $loaidetai);
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