<?php
function get_all_ddk()
{
    global $db;
    $query = '
    SELECT * FROM "dotdangky"';

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

function get_unique_nienkhoa()
{
    global $db;
    $query = '
    SELECT DISTINCT nienkhoa
	FROM dotdangky;';
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
function get_unique_tenchuyennganh(){
    global $db;
    $query = '
    SELECT DISTINCT tenchuyennganh
	FROM chuyennganh;';
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
function get_unique_loaidetai(){
    global $db;
    $query = '
    SELECT DISTINCT loaidetai
	FROM loaidetai;';
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

function count_detaitheonienkhoa($nienkhoa)
{
    global $db;
    $query = '
    select chuyennganh, count(\'tendetai\') from chitietdetai join dotdangky ON dotdangky.id = chitietdetai.dotdangky
    where dotdangky.nienkhoa = :nienkhoa  
    GROUP BY chuyennganh;';
    try {
        $statement = $db->prepare($query);
        $statement -> bindValue(':nienkhoa', $nienkhoa);
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
function count_detaitheotenchuyennganh()
{
    global $db;
    $query = '
    select chuyennganh, count(\'tendetai\') from chitietdetai
    GROUP BY chuyennganh;';
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
function count_detaitheoloaidetai($loaidetai)
{
    global $db;
    $query = '
    select chuyennganh, count(\'tendetai\') from chitietdetai
    where loaidetai = :loaidetai
    GROUP BY chuyennganh;';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':loaidetai',$loaidetai);
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