<?php
function get_sinhvienconlai($detai){
    global $db;
    $query = '
        select * from sinhvienthuchien where detai = :detai' ;

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
function get_all_sinhvienthuchien_by_sinhvien($sinhvien){
    global $db;
    $query = '
        select * from sinhvienthuchien where sinhvien = :sinhvien' ;

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':sinhvien', $sinhvien);
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
function get_all_sinhvienthuchien_by_detai($detai){
    global $db;
    $query = '
        select * from sinhvienthuchien where detai = :detai';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':detai', $detai);
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
function count_svthuchien_by_detai($detai){
    global $db;
    $query = '
        select detai, count(sinhvien) from sinhvienthuchien group by detai having detai = :detai';

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
function count_svthuchien_by_detai_istruongnhom($detai){
    global $db;
    $query = '
        select * from sinhvienthuchien where detai = :detai and is_truongnhom = \'true\'';

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
function delete_sinhvienthuchien_by_sinhvien($sinhvien)
{
    global $db;
    $query = '
        delete from sinhvienthuchien where sinhvien = :sinhvien';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':sinhvien', $sinhvien);
        $statement->execute();
        $statement->closeCursor();
        //return true;

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        //return false;
    }
}
function delete_sinhvienthuchien_by_detai($detai)
{
    global $db;
    $query = '
        delete from sinhvienthuchien where detai = :detai';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':detai', $detai);
        $statement->execute();
        $statement->closeCursor();
        //return true;

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        //return false;
    }
}
function update_sinhvienthuchienconlai($sinhvien)
{
    global $db;
    $query = '
        update sinhvienthuchien set is_truongnhom = \'true\' where sinhvien = :sinhvien';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':sinhvien', $sinhvien);
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