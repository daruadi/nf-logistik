<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>NF Admin</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_lte/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_lte/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_lte/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_lte/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_lte/dist/css/skins/skin-blue.min.css">
</head>
<body class="hold-transition skin-blue layout-boxed sidebar-mini">
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
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-male"></i>
								<span class="hidden-xs">Pintoko</span>
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<aside class="main-sidebar">
			<section class="sidebar">
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					<li class="treeview active">
						<a href="#">
							<i class="fa fa-dashboard"></i> <span>Dashboard</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="#"><i class="fa fa-fighter-jet"></i>Hiyaa</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-files-o"></i>
							<span>Layout Options</span>
							<span class="pull-right-container">
								<span class="label label-primary pull-right">4</span>
							</span>
						</a>
					  <ul class="treeview-menu">
						<li><a href="top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
						<li class="active"><a href="boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
						<li><a href="fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
						<li><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
					  </ul>
					</li>
				</ul>
			</section>
		</aside>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Boxed Layout
					<small>Blank example to the boxed layout</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li><a href="#">Layout</a></li>
					<li class="active">Boxed</li>
				</ol>
			</section>
			<section class="content">
				<div class="callout callout-info">
					<h4>Tip!</h4>

					<p>Add the layout-boxed class to the body tag to get this layout. The boxed layout is helpful when working on large screens because it prevents the site from stretching very wide.</p>
				</div>
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Title</h3>
						<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
					</div>
					<div class="box-body">
					  Start creating your amazing application!
					</div>
					<div class="box-footer">
						Footer
					</div>
				</div>
			</section>
		</div>
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.4.18
			</div>
			<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights reserved.
		</footer>
	</div>
	<script src="<?php echo base_url();?>assets/admin_lte/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/admin_lte/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/admin_lte/dist/js/adminlte.min.js"></script>
</body>
</html>