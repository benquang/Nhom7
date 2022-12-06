<?php
    $dsn = 'pgsql:host=ec2-23-20-140-229.compute-1.amazonaws.com;port=5432;dbname=dlmqdche93me';
    $username = 'zjxmscjcwxzjvk';
    $password = '4efd7d4f742edabc1a9a1db78d55610ffe92f40c3cc5d9435ddbdfffb09e40db';
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $db = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('errors/db_error_connect.php');
        exit();
    }
?>