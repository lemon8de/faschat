<?php 
    require '../php_api/db_connection.php';
    echo '
        <table id="ActiveUserTable">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Site Role</th>
                </tr>
            </thead>
        <tbody id="ActiveUserTableBody">';
    // MySQL
    $sql = "SELECT username, password, site_role FROM user_accounts";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
    foreach($stmt->fetchALL() as $x){
        echo '
            <tr id="" onclick="">
                <td>' . $x['username'] . '</td>
                <td>' . $x['password'] . '</td>
                <td>' . $x['site_role'] . '</td>
            </tr>
        ';
    }
    echo '
        </tbody>
    </table>
    </div>
    ';
?>