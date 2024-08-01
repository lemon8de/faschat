<?php
    session_name("faschat");
    session_start();

    require 'db_connection.php';
    $username = $_GET['username'];
    $exclude_self = $_SESSION['username'];
    $request_body = [];

    $comment = "";
    $inner_html = "";

    $sql_exposed = "SELECT username, exposed, approved FROM user_accounts WHERE approved = '1' AND username LIKE '$username%' AND exposed = '1' AND username <> '$exclude_self'";
    $stmt_exposed = $conn->prepare($sql_exposed);
    $stmt_exposed->execute();
    // if its only one, log it for lock on check
    //if not just add them to inner_html
    foreach($stmt_exposed->fetchALL() as $x){
        $inner_html .= "<p>" . $x['username'] . "</p>";
    }
    if ($stmt_exposed->rowCount() == 1) {
        $comment = "<p class='text-muted'>Lock-On Initiated!! Press Enter to FasChat!</p>";
    } else {
        $comment = "<p class='text-muted'>Refine your search and lock-on to one FasTag!</p>";
    }

    $sql_unique = "SELECT username, exposed, approved FROM user_accounts WHERE approved = '1' AND username = '$username' and exposed = '0'";
    $stmt_unique = $conn->prepare($sql_unique);
    $stmt_unique->execute();
    //this unique is designed to only display one, its just what it does
    if ($stmt_unique->rowCount() > 0) {
        $comment = "<p class='text-muted'>You found a HIDDEN FasTag!!!! Press Enter to FasChat!!!!!!</p>";
    } else {
        ;
    }


    $inner_html .= $comment;
    $request_body['success'] = true;
    $request_body['inner_html'] = $inner_html;
    echo json_encode($request_body);
?>