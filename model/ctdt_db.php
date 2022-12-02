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
?>