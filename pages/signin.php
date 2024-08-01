<?php 
	session_name('adi-php-systems');
	session_start();
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
				<img src="../static/img/faschat.png" style="height:150px;">
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
    if (isset($_SESSION['registration_failed'])) {
        echo "
        <script>
        Toast.fire({
            icon: 'error',
            title: '" . $_SESSION['registration_failed'] . "',
        })
        </script>
        ";
        $_SESSION['registration_failed'] = null;
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
		session_unset();
		session_destroy();
        $_SESSION['logout_success'] = null;
    }
?>