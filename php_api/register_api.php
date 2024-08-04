<?php 
    session_name("faschat");
    session_start();

    require 'db_connection.php';

    if (isset($_POST['Register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        // MySQL
        $sql = "SELECT id FROM user_accounts WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $params = array($username);
        $stmt->execute($params);

        if ($stmt->rowCount() > 0) {
            $_SESSION['registration_failed'] = "Username already taken";
            header('location: ../pages/register.php');
            exit;
        }
        if ($password <> $confirmpassword) {
            $_SESSION['registration_failed'] = "Password do not match";
            header('location: ../pages/register.php');
            exit;
        }

        // MySQL
        $sql = "INSERT INTO user_accounts (username, password) VALUES ('$username','$password')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conn = null;

        $_SESSION['registration_success'] = "Registration Complete. Await confirmation from admin";
        header('location: ../pages/signin.php');
    }
?>