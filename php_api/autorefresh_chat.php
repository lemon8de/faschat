<?php 
    require 'db_connection.php';
    session_name('faschat');
    session_start();

    $username = $_SESSION['username'];
    $message_id = $_POST['message_id'];
    $chat_id = $_POST['chat_id'];


    $sql = "SELECT * FROM messages_solo WHERE messages_solo.id > '$message_id' AND messages_solo.chat_id = '$chat_id' AND messages_solo.from_user <> '$username'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $inner_html = "";
    if ($stmt->rowCount() > 0) {
        foreach($stmt->fetchALL() as $x){
            $last_chat_id = $x['id'];
            $inner_html .= '
            <div class="direct-chat-msg">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-left">' . $x['from_user'] .'&nbsp;&nbsp;</span>
                </div>
                <img class="direct-chat-img" src="../static/img/user_image.jpeg" alt="message user image">
                <div class="direct-chat-text float-left">
                    ' . $x['message'] .'
                </div>
            </div>
            ';
        }
        $request_body['success'] = true;
        $request_body['last_chat_id'] = $last_chat_id;
        $request_body['inner_html'] = $inner_html;
        echo json_encode($request_body);
        exit;
    }
    $request_body['success'] = false;
    echo json_encode($request_body);
?>