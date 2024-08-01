<?php 
    require '../php_api/db_connection.php';
    echo '
        <table id="ForApprovalUserTable">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Site Role</th>
                    <th>Action</th>
                </tr>
            </thead>
        <tbody id="ForApprovalUserTableBody">';
    // MySQL
    $sql = "SELECT id, username, password, approved, site_role FROM user_accounts WHERE approved = '0'";
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
                    <form action="../php_api/approve_user_api.php" method="POST">
                        <input type="hidden" value="' . $x['id'] . '" name="id" readonly>
                        <button type="submit" class="btn bg-info btn-block" name="ApproveUser">Approve</button>
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