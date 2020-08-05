<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Sistem Kepegawain | <?= $title ?></title>

	<!-- Jquery UI -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.css">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
	<!-- Toastr -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/toastr/toastr.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Sweet Alert2 -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/sweetalert2/sweetalert2.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown mr-3">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<?php 
							$arr_nama = explode(" ", $this->session->userdata('nama'));
						?>
						Welcome, <span class="text-bold text-primary"><?= $arr_nama[0] ?></span>
						<span class="text-bold"><i class="fa fa-caret-down"></i></span>   
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('auth/change-password') ?>" class="dropdown-item">
							<i class="fas fa-lock mr-2"></i> Ganti Password
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">
							<i class="fas fa-power-off mr-2"></i> Logout
						</a>
					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?= base_url(); ?>" class="brand-link">
				<img src="<?= base_url('assets/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">Kepegawaian</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<?php if($this->session->userdata('status_access') != "admin") : ?>
							<img src="<?= base_url('assets/dist/img/profile/' . $this->session->userdata('image')); ?>" class="img-circle elevation-2" alt="User Image">
						<?php else : ?>
							<img src="<?= base_url('assets/dist/img/user1-128x128.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
						<?php endif; ?>
					</div>
					<div class="info">
						<a href="#" class="d-block"><?= $this->session->userdata('nama'); ?></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
						<?php if($this->session->userdata('status_access') == 'admin') :  ?>
							<li class="nav-item">
								<a href="<?= base_url('home'); ?>" class="nav-link <?= $title == 'Home' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>Dashboard</p>
								</a>
							</li> 
							<li class="nav-item has-treeview <?= $title == 'Pegawai' ? 'menu-open' : '' ?>">
								<a href="#" class="nav-link <?= $title == 'Pegawai' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-users"></i>
									<p>
										Data Pegawai
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url('pegawai'); ?>" class="nav-link <?= $subtitle == 'List Data Pegawai' ? 'active' : '' ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>List Data Pegawai</p>
										</a>
									</li>
									<!-- <li class="nav-item">
										<a href="<?= base_url('pegawai/add'); ?>" class="nav-link <?= $subtitle == 'Tambah Data Pegawai' ? 'active' : '' ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Tambah Data Pegawai</p>
										</a>
									</li> -->
									<li class="nav-item">
										<a href="<?= base_url('pegawai/salary'); ?>" class="nav-link <?= $subtitle == 'Data Gaji Pegawai' ? 'active' : '' ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Data Gaji Pegawai</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url('pegawai/penilaian'); ?>" class="nav-link <?= $subtitle == 'Penilaian Pegawai' ? 'active' : '' ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Data Penilaian Pegawai</p>
										</a>
									</li>
								</ul>
							</li>   
							<li class="nav-item">
								<a href="<?= base_url('jabatan'); ?>" class="nav-link <?= $title == 'Jabatan' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-archive"></i>
									<p>Jabatan</p>
								</a>
							</li>  
							<li class="nav-item has-treeview <?= $title == 'Users' ? 'menu-open' : '' ?>">
								<a href="#" class="nav-link <?= $title == 'Users' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-users-cog"></i>
									<p>
										Master Setup
										<i class="right fas fa-angle-left"></i>
										<span class="badge badge-warning right">2</span>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url('users'); ?>" class="nav-link <?= $subtitle == 'List Users' ? 'active' : '' ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Users</p>
										</a>
									</li> 
									<li class="nav-item">
										<a href="<?= base_url('users/users-pegawai') ?>" class="nav-link <?= $subtitle == 'List Users Pegawai' ? 'active' : '' ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Users Pegawai</p>
										</a>
									</li> 
								</ul>
							</li>                      
							<li class="nav-item">
								<a href="<?= base_url('absensi'); ?>" class="nav-link <?= $title == 'Absensi' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-address-book"></i>
									<p>Rekap Absensi</p>
								</a>
							</li> 
						<?php else : ?> 
							<li class="nav-item">
								<a href="<?= base_url('home/user'); ?>" class="nav-link <?= $title == 'Home' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>Dashboard</p>
								</a>
							</li>                    
							<li class="nav-item">
								<a href="<?= base_url('users/data-diri'); ?>" class="nav-link <?= $title == 'Users' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-user"></i>
									<p>Profile Saya</p>
								</a>
							</li>                    
							<li class="nav-item">
								<a href="<?= base_url('users/absensi'); ?>" class="nav-link <?= $title == 'Absensi' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-edit"></i>
									<p>Absensi</p>
								</a>
							</li>                    
							<li class="nav-item">
								<a href="<?= base_url('users/upload-dokumen'); ?>" class="nav-link <?= $title == 'Upload' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-file-upload"></i>
									<p>Upload Dokumen</p>
								</a>
							</li>                    
						<?php endif; ?>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>	