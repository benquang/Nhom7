<?php
function get_all_doituong() {
    global $db;
    $query = '
        SELECT * FROM doituong order by doituong';
    
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
function get_one_doituong($doituong)
{
    global $db;
    $query = '
        SELECT * FROM doituong where doituong = :doituong';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':doituong', $doituong);

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
function add_doituong($doituong, $nienkhoa) { //void
    global $db;

    $query = '
        insert into doituong values (:doituong, :nienkhoa)';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':doituong', $doituong);
        $statement->bindValue(':nienkhoa', $nienkhoa);

        $statement->execute();
        $statement->closeCursor();
        //return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        //return false;
    }
}
function update_doituong($doituong, $nienkhoa) {
    global $db;
    
    $query = '
        update doituong set nienkhoa = :nienkhoa where doituong = :doituong';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':doituong', $doituong);
        $statement->bindValue(':nienkhoa', $nienkhoa);

        $statement->execute();
        $statement->closeCursor();
        //return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        //return false;
    }
}
function delete_doituong($doituong)
{
    global $db;
    $query = '
    DELETE FROM doituong WHERE doituong = :doituong';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':doituong', $doituong);
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