<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>NF Admin</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_lte/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_lte/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_lte/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_lte/dist/css/skins/skin-blue.min.css">
</head>
<body class="hold-transition skin-blue layout-boxed">
	<div class="wrapper">
		<header class="main-header">
			<a href="<?php echo base_url();?>" class="logo">
				<span class="logo-mini"><b>NF</b>L</span>
				<span class="logo-lg"><b>NF</b>Logistik</span>
			</a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<?php if($this->ion_auth->logged_in()): ?>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-male"></i>
								<span class="hidden-xs"><?php echo $this->_user->username; ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-footer">
									<div class="pull-right">
										<a href="<?php echo base_url();?>Auth/logout" class="btn btn-default btn-flat">Logout</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<?php endif; ?>
			</nav>
		</header>
		<?php
			if ($this->ion_auth->logged_in()) {
				include('main_sidebar.php');
			}
		?>
		<div class="content-wrapper">
