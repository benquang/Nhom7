<?php
    // make sure the user is logged in as a valid administrator
    $detai = get_one_detai_by_sinhvien($_SESSION['user']);
    if ($detai['is_truongnhom'] != '1') {//ko phải là trưởng nhóm
        header('Location: ' . $app_path . 'sinhvien?action=profile' );
    }
?>
