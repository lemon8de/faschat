<?php 
    session_name("faschat");
    session_start();

    require 'db_connection.php';
    if (isset($_POST['ResetPassword'])) {
        $username = $_POST['username'];

        $sql = "SELECT id FROM user_accounts WHERE username = '$username'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            foreach($stmt->fetchALL() as $x){
                $sql = "UPDATE user_accounts SET reset_password = '1' WHERE username = '$username'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $conn = null;

                $_SESSION['reset_password_success'] = "Request for password sent. Wait for approval";
                header('location: ../pages/signin.php');
            }
        } else {
            $_SESSION['reset_password_failed'] = "Username does not exist";
            header('location: ../pages/signin.php');
        }
    }
?>