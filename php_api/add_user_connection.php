<?php
    session_name("faschat");
    session_start();

    require 'db_connection.php';
    $username = $_GET['username'];
    $exclude_self = $_SESSION['username'];
    $request_body = [];
    $connection = false;

    //getting the username of the person to faschat
    $sql = "SELECT user_accounts.username, user_accounts.approved 
        FROM user_accounts WHERE approved = '1' AND username = '$username' AND username <> '$exclude_self'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        //this username exists, get the username
        foreach($stmt->fetchALL() as $x){
            $to_handshake = $x["username"];
        }
    } else {
        //this username does not exist, throw the error
        $conn = null;
        $request_body['success'] = $connection;
        echo json_encode($request_body);
        exit;
    }
    
    //need a check code to prevent multiple connections
    $stmt_check = "SELECT * FROM connections_solo WHERE JSON_CONTAINS(connections_solo.users, '\"$to_handshake\"') AND JSON_CONTAINS(connections_solo.users, '\"$exclude_self\"')";
    $stmt_check = $conn->prepare($stmt_check);
    $stmt_check->execute();

    if ($stmt_check->rowCount() == 0) {
        //this connection is unique, create the connection
        $users_toadd = array($exclude_self, $to_handshake);
        $users = json_encode($users_toadd);

        $sql = "INSERT INTO connections_solo (users, to_handshake, initiator) VALUES ('$users','$to_handshake','$exclude_self')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $chat_id = $conn->lastInsertId();
        $connection = true;

        $_SESSION['chat_id'] = $chat_id;
        $_SESSION['connection_made'] = "Locked-ON and ready to FasChat!";
    } else {
        //this connection is a duplicate, do not proceed
    }
    $conn = null;
    $request_body['success'] = $connection;
    echo json_encode($request_body);
?>