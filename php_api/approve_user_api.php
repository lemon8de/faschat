<?php 
    session_name("faschat");
    session_start();

    require 'db_connection.php';
    if (isset($_POST['ApproveUser'])) {
        $id = $_POST['id'];

        $sql = "UPDATE user_accounts SET approved = '1' WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conn = null;

        $_SESSION['user_approved'] = "User has been approved";
        header('location: ../pages/forapproval_user.php');
    }
?>