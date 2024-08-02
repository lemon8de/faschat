<!-- <div class="direct-chat-msg">
    <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-left">lemon8de&nbsp;&nbsp;</span>
        <span class="direct-chat-timestamp float-left">Now</span>
    </div>
    <img class="direct-chat-img" src="../static/img/user_image.jpeg" alt="message user image">
    <div class="direct-chat-text float-left">
        Please be civilized dito HAHA, FasChat is developed for fun; for training; and testing.
    </div>
</div>

<div class="direct-chat-msg right">
    <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-right">&nbsp;&nbsp;You</span>
        <span class="direct-chat-timestamp float-right">Now</span>
    </div>
    <img class="direct-chat-img" src="../static/img/user_image.jpeg" alt="message user image">
    <div class="direct-chat-text float-right">
        Yes I abide by the rules and regulations of this website. May copy ka ng rules?
    </div>
</div> -->
<?php 
    require '../php_api/db_connection.php';

    $chat_id = $_SESSION['main_chat_id'];

    $sql = "SELECT id, chat_id, message, from_user FROM messages_solo WHERE chat_id = '$chat_id' ORDER BY id DESC LIMIT 15";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    foreach(array_reverse($stmt->fetchALL()) as $x){
        if ($x['from_user'] <> $_SESSION['username']) {
            //white
            echo '
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">' . $x['from_user'] . '&nbsp;&nbsp;</span>
                    </div>
                    <img class="direct-chat-img" src="../static/img/user_image.jpeg" alt="message user image">
                    <div class="direct-chat-text float-left">
                       ' . $x['message'] . ' 
                    </div>
                </div>
            ';
        } else {
            //blue
            echo '
                <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">&nbsp;&nbsp;' . $_SESSION['username'] . '</span>
                    </div>
                    <img class="direct-chat-img" src="../static/img/user_image.jpeg" alt="message user image">
                    <div class="direct-chat-text float-right">
                       ' . $x['message'] . ' 
                    </div>
                </div>
            ';
        }
    }

    echo "
    <script>
        document.getElementById('DirectChatBox').scrollTop = document.getElementById('DirectChatBox').scrollHeight;
    </script>
    ";
?>