<?php 
    session_name("faschat");
    session_start();

    require 'db_connection.php';

    if (isset($_POST['Login'])) {
        $username = $_POST['username'];
        $_SESSION['username'] = $username;
        $password = $_POST['password'];

        // MySQL
        $sql = "SELECT username, password, approved, site_role, reset_password FROM user_accounts 
                WHERE username = ? AND password = ?";

        $stmt = $conn->prepare($sql);
        $params = array($username, $password);
        $stmt->execute($params);
        if ($stmt->rowCount() > 0) {
            foreach($stmt->fetchALL() as $x){
                $_SESSION['site_role'] = $x['site_role'];
                $_SESSION['username'] = $x['username'];

                if ($x['approved'] == '0') {
                    $_SESSION['login_attempt_failed'] = "Sign in Failed. Registered Account still not approved";
                    header('location: ../pages/signin.php');
                } else {
                    $_SESSION['login_attempt_success'] = "Sign in Successful. Signed in as " . $_SESSION['username'] . "-" . $_SESSION['site_role'];
                    if ($x['site_role'] == "ADMIN") {
                        header('location: ../pages/admin_dashboard.php');
                    } else {
                        header('location: ../pages/user_dashboard.php');
                    }
                }
            }
        } else {
            $sql = "SELECT reset_password, reset_password_approved FROM user_accounts WHERE username = '$username'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $conn = null;
            foreach($stmt->fetchALL() as $x){
                if ($x['reset_password'] && $x['reset_password_approved']) {
                    $_SESSION['action_reset_password'] = true;
                    header('location: ../pages/actionresetpassword.php');
                    exit;
                } else {
                    $_SESSION['reset_password_not_approved'] = "You have a pending reset password request. Wait for admin confirmation";
                    header('location: ../pages/signin.php');
                    exit;
                }
            }
            $_SESSION['login_attempt_failed'] = "Sign in Failed. Verify your credentials";
            header('location: ../pages/signin.php');
        }
        $conn = null; //needed because a successful signin does not close the conn
    }
?>