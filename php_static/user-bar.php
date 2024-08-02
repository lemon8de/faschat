<!-- User Bar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="#" class="brand-link">
		<img src="../static/img/faschat2.png" alt="Logo" class="brand-image elevation-3">
		<span class="brand-text font-weight-light">&nbsp;USER</span>
		<input type="hidden" readonly id="refresh_id" value="<?php echo $_SESSION['username']?>">
	</a>
	<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="user_dashboard.php" class="nav-link<?php echo ($bar_whois_active == "userdashboard" ? ' active': '');?>">
						<i class="nav-icon fas fa-comments"></i><p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
						<i class="nav-icon fas fa-user"></i><p>Add a FasTag</p>
					</a>
				</li>
				<ul id="FasTagsList" class="nav nav-pills nav-sidebar flex-column" id="FasTagsList" data-widget="treeview" role="menu" data-accordion="false">
					<?php include 'load_connections.php';?>
				</ul>
				<input type="hidden" readonly id="last_loaded_connection_id" value="<?php echo $last_chat_id;?>">
				<li class="nav-item">
					<a href="../php_api/logout_api.php" class="nav-link">
						<i class="nav-icon fas fa-arrow-circle-left"></i><p>Logout</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
<!-- END User Bar -->
 

<script>
	var refresh_id = document.getElementById('refresh_id').value;
	//disgusting autoloading api
	setInterval(refresh_connection, 15000);
	function refresh_connection() {
		var last_connection_id = document.getElementById('last_loaded_connection_id').value;
		$.ajax({
            url: '../php_api/autorefresh_connections.php',
            type: 'POST',
			data: {
				"id" : refresh_id,
				"last_connection" : last_connection_id
			},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
					document.getElementById('FasTagsList').insertAdjacentHTML('beforeend', response.inner_html);
					document.getElementById('last_loaded_connection_id').value = response.last_chat_id;
                } else {
					console.log('none');
                }
            }
        });
	}
</script>