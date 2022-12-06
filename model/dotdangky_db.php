<?php
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

function add_ddk($id, $batdau, $ketthuc, $hocky, $nienkhoa, $hinhthuc, $loaidetai)
{
    global $db;
    $query = '
    INSERT INTO dotdangky(id, batdau, ketthuc, hocky, nienkhoa, hinhthuc, loaidetai) 
    VALUES (:id, :batdau, :ketthuc, :hocky, :nienkhoa, :hinhthuc, :loaidetai)';
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
?>