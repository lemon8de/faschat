<?php
    $directory = " / Example User Link";
    $bar_whois_active = "exampleuserlink";
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
                        <?php include 'exampleuserlink_content.php'?>
                    </div>
                </div>
            </div>
            <footer class="main-footer">
                <strong>FasChat</strong>
                Trial State.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.0
                </div>
            </footer>
            <?php include '../php_static/scripts-rels.php'?>
        </div>
    </body>
</html>