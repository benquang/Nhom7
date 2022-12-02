<?php
function get_all_detai(){
global $db;
$query = '
    SELECT * FROM "chitietdetai"';

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
