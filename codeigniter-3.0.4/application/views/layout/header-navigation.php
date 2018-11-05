<header class="main-header">
	<!-- Logo -->
	<a href="<?= base_url('home/index') ?>" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>A</b>LT</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>Admin</b>LTE</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">

				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?= base_url('assets/img/user.png') ?>" class="user-image" alt="User Image">
						<span class="hidden-xs">Marsel Sampe Asang</span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header" style="height: 80px;">
							<p>
								Marsel Sampe Asang
								<small>Administrator</small>
							</p>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?= base_url('users/profilesetting') ?>" class="btn btn-default btn-flat">Profile Setting</a>
							</div>
							<div class="pull-right">
								<a href="<?= base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>

			</ul>
		</div>
	</nav>
</header>

