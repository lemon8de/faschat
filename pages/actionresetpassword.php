<?php 
	session_name('faschat');
	session_start();
	
	if (!isset($_SESSION['action_reset_password'])) {
		header('location: ../pages/signin.php');
		exit;
	}
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
					<p class="login-box-msg"><b>Reset Password Approved. Update your credentials</b></p>
					<?php include '../forms/actionresetpassword_form.php';?>
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
    if (isset($_SESSION['update_password_failed'])) {
        echo "
        <script>
        Toast.fire({
            icon: 'error',
            title: '" . $_SESSION['update_password_failed'] . "',
        })
        </script>
        ";
        $_SESSION['update_password_failed'] = null;
    }
?>

