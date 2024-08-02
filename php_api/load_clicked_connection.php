<?php 
    require 'db_connection.php';
    session_name('faschat');
    session_start();

    $chat_id = $_POST['chat_id'];
    //here the user clicked the chat head or is redirected after pressing enter on the fas chat modal
    // if (isset($_SESSION['chat_creation_lastid'])) {
    //     //api was called when you clicked enter
    //     $chat_id = $_SESSION['$chat_creation_lastid'] = null;
    //     $_SESSION['$chat_creation_lastid'] = null;
    // } else {
    //     //you clicked the button on the sidebar
    //     $chat_id = $_POST['chat_id'];
    // }
    //get the handshake status so we can know if we have to display a disabled chat screen or chat screen.
    $stmt = "SELECT id, handshake, to_handshake, initiator FROM connections_solo WHERE id = '$chat_id'";
    $stmt = $conn->prepare($stmt);
    $stmt->execute();
    $person = "";
    foreach($stmt->fetchALL() as $x){
        if ($x['handshake'] == '0') {
            //figure out if this current user needs to handshake or the other user on the other end of the connection
            if ($x['initiator'] == $_SESSION['username']) {
                // display the wait for handshake screen
                $_SESSION['wait_for_handshake'] = true;
                $person = $x['to_handshake'];
            } else {
                // have to display a click to consent and handshake
                $_SESSION['proceed_handshake'] = true;
                $person = $x['initiator'];
            }
        }
        $_SESSION['loaded_chat_connection'] = "Successfully loaded chat connection with " . $person;
    }
    header('location: ../pages/chat_main.php');
?>