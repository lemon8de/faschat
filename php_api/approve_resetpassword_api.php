<?php 
    session_name("faschat");
    session_start();

    require 'db_connection.php';
    if (isset($_POST['ResetPassword'])) {
        $id = $_POST['id'];

        $sql = "UPDATE user_accounts SET reset_password_approved = '1' WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conn = null;

        $_SESSION['reset_password_approved'] = "Request to change password approved";
        header('location: ../pages/forpasswordreset_user.php');
    }
?>