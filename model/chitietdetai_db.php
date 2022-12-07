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
function add_detai($id, $tendetai, $muctieu, $yeucau, $sanpham, $chuthich, $dkkcn, $chuyennganh, $soluongsv, $trangthai)
{
    global $db;
    $query = '
    INSERT INTO chitietdetai(id, tendetai, muctieu, yeucau, sanpham, chuthich, dkkhacchuyennganh, chuyennganh, soluongsv, trangthai)
    VALUES(:id, :tendetai, :muctieu, :yeucau, :sanpham
    , :chuthich, :dkkcn, :chuyennganh, :slsv, :trangthai);';
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
        $statement->bindValue(':slsv', $soluongsv);
        $statement->bindValue(':trangthai', $trangthai);

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