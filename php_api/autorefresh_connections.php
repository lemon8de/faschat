<?php 
    require 'db_connection.php';
    session_name('faschat');
    session_start();

    $username = $_SESSION['username'];
    $id = $_POST['last_connection'];


    $sql = "SELECT * FROM connections_solo WHERE id > '$id' AND JSON_CONTAINS(connections_solo.users, '\"$username\"')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $inner_html = "";
    if ($stmt->rowCount() > 0) {
        foreach($stmt->fetchALL() as $x){
            $handshake_badge = !$x['handshake'] ? '<span class="badge badge-danger right"><i class="nav-icon far fa-handshake" style="margin-left:-1px;"></i></span>': '';
            $user_to_display = $x['to_handshake'] == $username ? $x['initiator'] : $x['to_handshake'];
            $inner_html .= '
                <form action="../php_api/load_clicked_connection.php" method="POST">
                    <li class="nav-item">
                        <button type="submit" class="nav-link">
                            <input type="hidden" value="' . $x['id'] . '" name="chat_id" readonly>
                            <input type="hidden" value="' . $x['handshake'] . '" name="handshake_confirm" readonly>
                            <i class="nav-icon fas fa-at"></i><p>' . $user_to_display . '</p>' . $handshake_badge .  '
                        </button>
                    </li>
                </form>
            ';
            $last_chat_id = $x['id'];
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