<!-- Admin Bar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="#" class="brand-link">
		<img src="../static/img/faschat.png" alt="Logo" class="brand-image elevation-3">
		<span class="brand-text font-weight-light">&nbsp;ADMIN</span>
	</a>
	<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="admin_dashboard.php" class="nav-link">
						<i class="nav-icon fas fa-bus"></i><p>Account Management</p><i class="fas fa-angle-left right"></i>
					</a>
					<ul class="nav nav-treeview" style="display: none;">
						<li class="nav-item">
							<a href="admin_dashboard.php" class="nav-link<?php echo ($bar_whois_active == "admindashboard" ? ' active': '');?>">
								<i class="fas fa-user"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="active_user.php" class="nav-link<?php echo ($bar_whois_active == "activeusers" ? ' active': '');?>">
								<i class="fas fa-user"></i>
								<p>Active Users</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="forapproval_user.php" class="nav-link<?php echo ($bar_whois_active == "forapprovaluser" ? ' active': '');?>">
								<i class="fas fa-user-slash"></i>
								<p>Users For Approval</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="forpasswordreset_user.php" class="nav-link<?php echo ($bar_whois_active == "forpasswordreset" ? ' active': '');?>">
								<i class="fas fa-users"></i>
								<p>Password Reset Requests</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item" style="display:none;">
					<a href="exampleadminlink.php" class="nav-link<?php echo ($bar_whois_active == "exampleadminlink" ? ' active': '');?>">
						<i class="nav-icon fas fa-bus"></i><p>Example Admin Link</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="../php_api/logout_api.php" class="nav-link">
						<i class="nav-icon fas fa-arrow-circle-left"></i><p>Logout</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
<!-- END Admin Bar -->