<!-- <form action="../php_api/load_clicked_connection.php">
    <li class="nav-item">
        <button type="submit" class="nav-link">
            <input type="hidden" value="1" readonly>
            <i class="nav-icon fas fa-at"></i><p>example_user</p>
        </button>
    </li>
</form>
<form action="../php_api/load_clicked_connection.php">
    <li class="nav-item">
        <button type="submit" class="nav-link">
            <input type="hidden" value="1" readonly>
            <i class="nav-icon fas fa-at"></i><p>example_user</p><span class="badge badge-danger right"><i class="nav-icon far fa-handshake" style="margin-left:-1px;"></i></span>
        </button>
    </li>
</form> -->
<?php 
    require '../php_api/db_connection.php';
    $username = $_SESSION['username'];

    $stmt = "SELECT * FROM connections_solo WHERE JSON_CONTAINS(connections_solo.users, '\"$username\"')";
    $stmt = $conn->prepare($stmt);
    $stmt->execute();
    foreach($stmt->fetchALL() as $x){
        $handshake_badge = !$x['handshake'] ? '<span class="badge badge-danger right"><i class="nav-icon far fa-handshake" style="margin-left:-1px;"></i></span>': '';
        $user_to_display = $x['to_handshake'] == $username ? $x['initiator'] : $x['to_handshake'];
        echo '
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
    if (!isset($last_chat_id)) {
        $last_chat_id = "";
    }
?>