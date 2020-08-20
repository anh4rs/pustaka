<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= ucfirst($this->router->fetch_class()) ?> | SI Pustaka</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>bower_components/Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/skins/skin-blue.min.css">
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<style>
		.mb-0 {
			margin-bottom: 0 !important;
		}

		.mt-0 {
			margin-top: 0 !important;
		}

		.mb-1 {
			margin-bottom: 5px !important;
		}

		.mt-1 {
			margin-top: 5px !important;
		}

		.alert {
			padding: 8px;
		}
	</style>
	<script src="<?= base_url('assets/adminlte/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
			<!-- DataTables -->
		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/datatables.net/js/dataTables.rowReorder.min.js"></script>
		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/datatables.net/js/dataTables.responsive.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini <?= $this->router->fetch_class() === 'transaksi' ? 'sidebar-collapse' : 'null'  ?>">
	<div class="wrapper">
		<header class="main-header">
			<a href="index2.html" class="logo">
				<span class="logo-mini"><b>A</b>LT</span>
				<span class="logo-lg"><b>Admin</b>LTE</span>
			</a>
			<nav class="navbar navbar-static-top" role="navigation">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?= base_url('assets/adminlte/') ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
								<span class="hidden-xs">Alexander Pierce</span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<img src="<?= base_url('assets/adminlte/') ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

									<p>
										Alexander Pierce - Web Developer
										<small>Member since Nov. 2012</small>
									</p>
								</li>
								<li class="user-body">
									<div class="row">
										<div class="col-xs-4 text-center">
											<a href="#">Followers</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Sales</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Friends</a>
										</div>
									</div>
								</li>
								<li class="user-footer">
									<div class="pull-left">
										<a href="#" class="btn btn-default btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="#" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
						</li>
					</ul>
				</div>
			</nav>
		</header>