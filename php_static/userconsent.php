<?php 
    require '../php_api/db_connection.php';
    $username = $_SESSION['username'];

    $sql = "SELECT exposed FROM user_accounts WHERE username = '$username'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;

    foreach($stmt->fetchALL() as $x){
        if (!$x['exposed']) {
            echo '
                    <div class="row">
                        <h5>FasTags (usernames) are by default not displayed and can only be shared through word of mouth, but... you can:</h5>
                    </div>
                    <div class="row">
                        <div class="col-6 mx-auto">
                            <form action="../php_api/updateconsent_api.php" method="POST">
                                <input type="hidden" value="' . $username .  '" readonly name="username">
                                <button class="btn btn-success" style="width:100%;" type="submit" name="EnableConsent">I express my consent to make my FasTag (username) searchable within the FasChat database.</button>
                            </form>
                        </div>
                    </div>
            ';

        } else {
            echo '
                    <div class="row">
                        <h5>Had enough of the chat noise and would like to be hidden again?</h5>
                    </div>
                    <div class="row">
                        <div class="col-6 mx-auto">
                            <form action="../php_api/updateconsent_api.php" method="POST">
                                <input type="hidden" value="' . $username . '" readonly name="username">
                                <button class="btn btn-info" style="width:100%;" type="submit" name="DisableConsent">Hide my FasTag (username) from the searchable database</button>
                            </form>
                        </div>
                    </div>
            ';
        }
    }
?>