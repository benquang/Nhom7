<?php
function get_all_sinhvienthuchien_by_detai($detai){
    global $db;
    $query = '
        select * from sinhvienthuchien where detai = :detai';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':detai', $detai);
        $statement->execute();
        $result = $statement->fetch();
        
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return null;
    }
}

?>