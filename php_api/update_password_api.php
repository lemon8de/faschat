<?php 
    session_name("faschat");
    session_start();

    //database
    date_default_timezone_set('Asia/Manila');
    $servername = 'localhost'; $username = 'root'; $password = '';
    try {
        $conn = new PDO ("mysql:host=$servername;dbname=faschat_db",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'NO CONNECTION'.$e->getMessage();
    }
    //end database
    if (isset($_POST['UpdatePassword'])) {
        $password = $_POST['password'];
        $passwordconfirm = $_POST['confirmpassword'];

        if ($password <> $passwordconfirm) {
            $_SESSION['update_password_failed'] = "Password do not match";
            header('location: ../pages/actionresetpassword.php');
            exit;
        }

        $username = $_POST['username'];
        $sql = "UPDATE user_accounts SET reset_password = '0', password = '$password', reset_password_approved = '0' WHERE username = '$username'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conn = null;

        $_SESSION['update_password_success'] = "Credentials updated";
        header('location: ../pages/signin.php');
    }
?>