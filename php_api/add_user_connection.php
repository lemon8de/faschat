<?php
    session_name("faschat");
    session_start();

    require 'db_connection.php';
    $username = $_GET['username'];
    $exclude_self = $_SESSION['username'];
    $request_body = [];

    $sql_unique = "SELECT username, approved FROM user_accounts WHERE approved = '1' AND username = '$username' AND username <> '$exclude_self'";
    
    $request_body['success'] = true;
    echo json_encode($request_body);
?>