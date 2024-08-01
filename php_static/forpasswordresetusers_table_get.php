<?php 
    require '../php_api/db_connection.php';
    echo '
        <table id="ForPasswordResetUserTable">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Site Role</th>
                    <th>Action</th>
                </tr>
            </thead>
        <tbody id="ForPasswordResetUserTable">';
    // MySQL
    $sql = "SELECT id, username, password, reset_password, site_role FROM user_accounts WHERE reset_password = '1'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
    foreach($stmt->fetchALL() as $x){
        echo '
            <tr>
                <td>' . $x['username'] . '</td>
                <td>' . $x['password'] . '</td>
                <td>' . $x['site_role'] . '</td>
                <td>
                    <form action="../php_api/approve_resetpassword_api.php" method="POST">
                        <input type="hidden" value="' . $x['id'] . '" name="id" readonly>
                        <button type="submit" class="btn bg-info btn-block" name="ResetPassword">Approve</button>
                    </form>
                </td>
            </tr>
        ';
    }
    echo '
        </tbody>
    </table>
    </div>
    ';
?>