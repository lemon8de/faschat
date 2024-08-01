<?php 
    session_name("faschat");
    session_start();
    require 'db_connection.php';
    $username = $_POST['username'];

    if (isset($_POST['EnableConsent'])) {
        $sql = "UPDATE user_accounts SET exposed = '1' WHERE username = '$username'";
    } else if (isset($_POST['DisableConsent'])) {
        $sql = "UPDATE user_accounts SET exposed = '0' WHERE username = '$username'";
    }

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;

    $_SESSION['update_consent_success'] = "User settings changed";
    header('location: ../pages/user_dashboard.php');
?>