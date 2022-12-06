<?php
function get_all_doituong() {
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
        //$error_message = $e->getMessage();
        //display_db_error($error_message);
        return null;
    }
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
?>