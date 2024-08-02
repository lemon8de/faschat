<?php 
	session_name('faschat');
	session_start();

    $_SESSION['action_reset_password'] = null;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>FasChat Sign-in</title>

		<?php include '../php_static/link-rels.php';?>
	</head>

	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<img src="../static/img/faschat2.png" style="height:150px;">
				<h2><b>FasChat</b></h2>
			</div>
			<!-- /.login-logo -->
			<div class="card">
				<div class="card-body login-card-body">
					<p class="login-box-msg"><b>Sign in to start your session</b></p>
					<?php include '../forms/signin_form.php';?>
					
					<div class="row mb-2">
						<div class="col">
							<a href="register.php">
								<button type="button" class="btn bg-info btn-block">Register</button>
							</a>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col">
							<a href="resetpassword.php">
								<button type="button" class="btn bg-danger btn-block">Reset Password</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include '../php_static/scripts-rels.php';?>
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
    if (isset($_SESSION['login_attempt_failed'])) {
        echo "
        <script>
        Toast.fire({
            icon: 'error',
            title: '" . $_SESSION['login_attempt_failed'] . "',
        })
        </script>
        ";
        $_SESSION['login_attempt_failed'] = null;
    }
    if (isset($_SESSION['registration_success'])) {
        echo "
        <script>
        Toast.fire({
            icon: 'success',
            title: '" . $_SESSION['registration_success'] . "',
        })
        </script>
        ";
        $_SESSION['registration_success'] = null;
    }
	if (isset($_SESSION['logout_success'])) {
        echo "
        <script>
        Toast.fire({
            icon: 'success',
            title: '" . $_SESSION['logout_success'] . "',
        })
        </script>
        ";
        $_SESSION['logout_success'] = null;
        session_unset();
        session_destroy();
    }
    if (isset($_SESSION['reset_password_success'])) {
        echo "
        <script>
        Toast.fire({
            icon: 'success',
            title: '" . $_SESSION['reset_password_success'] . "',
        })
        </script>
        ";
        $_SESSION['reset_password_success'] = null;
    }
    if (isset($_SESSION['reset_password_failed'])) {
        echo "
        <script>
        Toast.fire({
            icon: 'error',
            title: '" . $_SESSION['reset_password_failed'] . "',
        })
        </script>
        ";
        $_SESSION['reset_password_failed'] = null;
    }
    if (isset($_SESSION['update_password_success'])) {
        echo "
        <script>
        Toast.fire({
            icon: 'info',
            title: '" . $_SESSION['update_password_success'] . "',
        })
        </script>
        ";
        $_SESSION['update_password_success'] = null;
    }
    if (isset($_SESSION['reset_password_not_approved'])) {
        echo "
        <script>
        Toast.fire({
            icon: 'info',
            title: '" . $_SESSION['reset_password_not_approved'] . "',
        })
        </script>
        ";
        $_SESSION['reset_password_not_approved'] = null;
    }
?>