<div class="row">
    <?php include '../php_static/user_accounts_total_get.php';?>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?php echo $_SESSION['user_active']; $_SESSION['user_active'] = null;?></h3>
                <p>Registered Users</p>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
                <a href="active_user.php" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?php echo $_SESSION['user_toapprove']; $_SESSION['user_toapprove'] = null;?></h3>
                <p>Users For Approval</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-slash"></i>
            </div>
                <a href="forapproval_user.php" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?php echo $_SESSION['user_passwordreset']; $_SESSION['user_passwordreset'] = null;?></h3>
                <p>Requests for Password Reset</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-slash"></i>
            </div>
                <a href="forpasswordreset_user.php" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
        </div>
    </div>
</div>