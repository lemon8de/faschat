<form class="form-horizontal" action="../php_api/resetpassword_api.php" method="POST">
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" required autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <button type="submit" class="btn bg-primary btn-block" name="ResetPassword" value="ResetPassword">Reset Password</button>
        </div>
    </div>

</form>