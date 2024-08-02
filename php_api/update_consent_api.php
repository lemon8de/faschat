<?php 
    session_name('faschat');
    session_start();

    echo 'hiya';
    $chat_id = $_POST['chat_id'];

    require 'db_connection.php';
    $sql = "UPDATE connections_solo SET handshake = '1' WHERE id = '$chat_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;


    $_SESSION['chat_started'] = "FasChat is now enabled!";
    $_SESSION['chat_id_afterconsenting'] = $chat_id;
    header('location: load_clicked_connection.php');
?>