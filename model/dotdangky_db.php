<?php
function last_id_ddk(){
    global $db;
    $query = '
        select "id" from dotdangky order by "id" desc limit 1';

    try {
        $statement = $db->prepare($query);
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
function get_all_ddk()
{
    global $db;
    $query = '
    SELECT * FROM "dotdangky" ORDER BY id ASC';

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

function get_one_ddk($id){
    global $db;
    $query = '
    SELECT * FROM dotdangky where id = :id';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':id',$id);
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

function add_ddk($id, $batdau, $ketthuc, $hocky, $nienkhoa, $loaidetai, $file, $title, $status, $hinhthuc)
{
    global $db;
    $query = '
        INSERT INTO dotdangky(id,batdau,ketthuc,hocky,nienkhoa,loaidetai,file,title,status,hinhthuc) 
        VALUES (:id, :batdau, :ketthuc, :hocky, :nienkhoa, :loaidetai, :file, :title, :status, :hinhthuc)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':batdau', $batdau);
        $statement->bindValue(':ketthuc', $ketthuc);
        $statement->bindValue(':hocky', $hocky);
        $statement->bindValue(':nienkhoa', $nienkhoa);
        $statement->bindValue(':loaidetai', $loaidetai);
        $statement->bindValue(':file', $file);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':status', $status);
        $statement->bindValue(':hinhthuc', $hinhthuc);


        $statement->execute();
        $statement->closeCursor();
        return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return false;
    }
}

function update_ddk($id, $batdau, $ketthuc, $hocky, $nienkhoa, $hinhthuc, $loaidetai){
    global $db;
    $query = '
    UPDATE dotdangky SET batdau=:batdau, ketthuc=:ketthuc, hocky=:hocky,
    nienkhoa=:nienkhoa, hinhthuc=:hinhthuc, loaidetai=:loaidetai WHERE id = :id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':batdau', $batdau);
        $statement->bindValue(':ketthuc', $ketthuc);
        $statement->bindValue(':hocky', $hocky);
        $statement->bindValue(':nienkhoa', $nienkhoa);
        $statement->bindValue(':hinhthuc', $hinhthuc);
        $statement->bindValue(':loaidetai', $loaidetai);

        $statement->execute();
        $statement->closeCursor();
        return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return false;
    }
}
function add_ddk_doituong($id, $doituong)
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

function get_ddk_doituong($id)
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

function delete_ddk_doituong($id){
    global $db;
    $query = '
        DELETE FROM dotdangky_doituong WHERE dotdangky = :id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);

        $statement->execute();
        $statement->closeCursor();
        return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return false;
    }
}
?>