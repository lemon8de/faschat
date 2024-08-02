<?php
    require '../php_api/db_connection.php';

    // MySQL

    $sql = "SELECT id FROM user_accounts WHERE approved = '1'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $_SESSION['user_active'] = $stmt->rowCount();

    $sql = "SELECT id FROM user_accounts WHERE approved = '0'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $_SESSION['user_toapprove'] = $stmt->rowCount();

    $sql = "SELECT id FROM user_accounts WHERE reset_password = '1'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $_SESSION['user_passwordreset'] = $stmt->rowCount();
    $conn = null;
?>