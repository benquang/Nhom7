<?php
    // make sure the user is logged in as a valid administrator
    if (!isset($_SESSION['gv'])) {
        header('Location: ' . $app_path . 'account/' );
    }
?>
