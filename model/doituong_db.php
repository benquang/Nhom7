<?php
function get_all_doituong()
{
    global $db;
    $query = '
        SELECT * FROM doituong';

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

function add_doituong($id, $doituong)
{
    global $db;
    $query = '
        INSERT INTO dotdangky_doituong VALUES (:id, :doituong)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':doituong', $doituong);
        $statement->execute();
        $statement->closeCursor();
        return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return false;
    }
}

function get_doituong($id)
{
    global $db;
    $query = '
    select * from "dotdangky_doituong" where dotdangky = :id';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
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
