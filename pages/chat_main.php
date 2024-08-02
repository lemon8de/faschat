<?php
    $directory = " / FasChat / Chat";
    $bar_whois_active = "unused_variable";
    session_name('faschat');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FasChat</title>
        <?php include '../php_static/link-rels.php'?>
    </head>
    <body class="sidebar-mini layout-fixed">
        <div class="wrapper">
            <?php include '../php_static/nav-bar.php'?>
            <?php include '../php_static/user-bar.php'?>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <!-- figure out what page to display here -->
                         <?php 
                            if (isset($_SESSION['wait_for_handshake'])) {
                                $_SESSION['wait_for_handshake'] = null;
                                include 'wait_for_handshake.php';
                            } else if (isset($_SESSION['proceed_handshake'])) {
                                $_SESSION['proceed_handshake'] = null;
                                include 'proceed_handshake.php';
                            } else {
                                include 'chat_main_content.php';
                            }
                         ?>
                    </div>
                </div>
            </div>
            <footer class="main-footer">
                <strong>FasChat</strong>
                Development State.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.0
                </div>
            </footer>
            <?php include '../php_static/scripts-rels.php'?>
        </div>

        <!-- modals -->
        <?php require '../modals/adduser_modal.php';?>
    </body>
</html>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        customClass: {
            popup: 'colored-toast',
        },
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
    })
</script>
<?php
//alerting after an api redirect
    if (isset($_SESSION['loaded_chat_connection'])) {
        echo "
        <script>
        Toast.fire({
            icon: 'success',
            title: '" . $_SESSION['loaded_chat_connection'] . "',
        })
        </script>
        ";
        $_SESSION['loaded_chat_connection'] = null;
    }
?>