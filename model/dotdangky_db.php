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
    SELECT * FROM "dotdangky" ORDER BY id DESC';

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
function get_all_ddk_hieuluc_gv()
{
    global $db;
    $query = '
        select * from dotdangky  
        where batdau <= current_date and ketthuc >= current_date and hinhthuc = \'true\' and status = \'true\' ';

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
function get_all_ddk_hieuluc_sv($doituong)
{
    global $db;
    $query = '
        select * from dotdangky join dotdangky_doituong on dotdangky.id = dotdangky_doituong.dotdangky
        where batdau <= current_date and ketthuc >= current_date and hinhthuc = \'true\' and status = \'true\'
        and doituong = :doituong ';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':doituong',$doituong);
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
function get_all_phanloaidetai()
{
    global $db;
    $query = '
        select DISTINCT loaidetai,doituong,hocky,nienkhoa from dotdangky join dotdangky_doituong 
        on dotdangky.id = dotdangky_doituong.dotdangky
        where hinhthuc = \'true\'';

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
    SELECT * FROM dotdangky join dotdangky_doituong on dotdangky.id = dotdangky_doituong.dotdangky
    where id = :id';

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
function get_one_ddk_doituong($dotdangky){
    global $db;
    $query = '
        select * from dotdangky_doituong where dotdangky = :dotdangky';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':dotdangky',$dotdangky);
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

function update_ddk($id, $batdau, $ketthuc, $hocky, $nienkhoa, $loaidetai, $file, $title, $status, $hinhthuc){
    global $db;
    $query = '
    UPDATE dotdangky SET batdau=:batdau, ketthuc=:ketthuc, hocky=:hocky,
    nienkhoa=:nienkhoa, loaidetai=:loaidetai, file=:file, title=:title, status=:status,
    hinhthuc=:hinhthuc WHERE id = :id';
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
function update_ddk_doituong($dotdangky, $doituong){
    global $db;
    $query = '
        update dotdangky_doituong set doituong = :doituong where dotdangky = :dotdangky';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':dotdangky', $dotdangky);
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
function delete_ddk($id){
    global $db;
    $query = '
        delete from dotdangky where id = :id';
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


//thong ke
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
    join dotdangky on chitietdetai.dotdangky = dotdangky.id
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
?>