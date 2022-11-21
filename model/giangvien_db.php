<?php
function add_giangvien($taikhoan, $hovaten, $cdkh, $chuyennganh, $chucvu) { //void
    global $db;

    $query = '
        INSERT INTO giangvien
        VALUES (:taikhoan, :hovaten, :cdkh, :chuyennganh, :chucvu)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':taikhoan', $taikhoan);
        $statement->bindValue(':hovaten', $hovaten);
        $statement->bindValue(':cdkh', $cdkh);
        $statement->bindValue(':chuyennganh', $chuyennganh);
        $statement->bindValue(':chucvu', $chucvu);

        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>