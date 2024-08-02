<?php
    session_name('faschat');
    session_start();

    require 'db_connection.php';
    $chat_id = $_POST['chat_id'];
    $message = $_POST['message'];
    $from_user = $_SESSION['username'];
    
    $sql = "INSERT INTO messages_solo (chat_id, message, from_user) VALUES ('$chat_id', '$message', '$from_user')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $html = '
        <div class="direct-chat-msg right">
            <div class="direct-chat-infos clearfix">
                <span class="direct-chat-name float-right">&nbsp;&nbsp;' . $_SESSION['username'] . '</span>
            </div>
            <img class="direct-chat-img" src="../static/img/user_image.jpeg" alt="message user image">
            <div class="direct-chat-text float-right">
                ' . $message . '
            </div>
        </div>
    ';

    $return_body = [];
    $return_body['success'] = true;
    $return_body['blue_box_html'] = $html;
    echo json_encode($return_body);
?>