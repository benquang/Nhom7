<?php
function last_id_detai(){
    global $db;
    $query = '
        select "id" from chitietdetai order by "id" desc limit 1';

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
function get_one_chitietdetai($id) {
    global $db;
    $query = '
        select * from chitietdetai where id = :id';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
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
function get_all_detai_by_danhmuc($loaidetai, $doituong, $hocky, $nienkhoa){
    global $db;
    $query = '
        select chitietdetai.id,tendetai,gvhuongdan from chitietdetai join dotdangky 
        on chitietdetai.dotdangky = dotdangky.id
        join dotdangky_doituong
        on dotdangky.id = dotdangky_doituong.dotdangky
        where loaidetai = :loaidetai and doituong = :doituong and hocky = :hocky and nienkhoa = :nienkhoa';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':loaidetai', $loaidetai);
        $statement->bindValue(':doituong', $doituong);
        $statement->bindValue(':hocky', $hocky);
        $statement->bindValue(':nienkhoa', $nienkhoa);

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
function add_detai($id, $tendetai, $muctieu, $yeucau, $sanpham, $chuthich, $dkkcn, $chuyennganh, $gvhuongdan, $soluongsv, $trangthai, $ddk)
{
    global $db;
    $query = '
    INSERT INTO chitietdetai(id, tendetai, muctieu, yeucau, sanpham, chuthich, dkkhacchuyennganh, chuyennganh, gvhuongdan, soluongsv, trangthai, dotdangky)
    VALUES(:id, :tendetai, :muctieu, :yeucau, :sanpham
    , :chuthich, :dkkcn, :chuyennganh, :gvhuongdan, :slsv, :trangthai, :dotdangky);';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':tendetai', $tendetai);
        $statement->bindValue(':muctieu', $muctieu);
        $statement->bindValue(':yeucau', $yeucau);
        $statement->bindValue(':sanpham', $sanpham);
        $statement->bindValue(':chuthich', $chuthich);
        $statement->bindValue(':dkkcn', $dkkcn);
        $statement->bindValue(':chuyennganh', $chuyennganh);
        $statement->bindValue(':gvhuongdan', $gvhuongdan);
        $statement->bindValue(':slsv', $soluongsv);
        $statement->bindValue(':trangthai', $trangthai);
        $statement->bindValue(':dotdangky', $ddk);

        $statement->execute();
        $statement->closeCursor();
        return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        return false;
    }                
}
function add_sinhvienthuchien($detai, $taikhoan, $is_truongnhom) { //void
    global $db;

    $query = '
        insert into sinhvienthuchien values(:detai, :taikhoan, :is_truongnhom)';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':detai', $detai);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->bindValue(':is_truongnhom', $is_truongnhom);

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