<?php
    session_name('faschat');
    session_start();

    $_SESSION['logout_success'] = "User logged out successfully";
    header('location: ../pages/signin.php');
?>