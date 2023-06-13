<!DOCTYPE html>
<html lang="en">
<head>
    <title>Presensi Guru</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url(); ?>assets/assetsadmin/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/assetsadmin/css/style.css">
    
    

</head>
<body class="" style="background: #3aaa36;">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="<?= base_url(); ?>assets/img/logo pesantren.png" alt="User-Profile-Image">
						<div class="user-details">
							<div id="more-details"><?= $this->session->userdata('username'); ?> <i class="fa fa-caret-down"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<!-- <li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
							<li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li> -->
							<li class="list-group-item"><a href="<?= base_url('Admin/logout'); ?>"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<!-- <li class="nav-item pcoded-menu-caption">
					    <label>Menu</label>
					</li> -->
					<!-- <li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Data Master</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="<?= base_url('Admin/datauser'); ?>">User</a></li>
					        <li><a href="<?= base_url('Admin/dataregistrasi'); ?>">Registrasi Online</a></li>
					        <li><a href="<?= base_url('Admin/datatentang'); ?>">Tentang</a></li>
					        <li><a href="<?= base_url('Admin/datakontak'); ?>">Kontak</a></li>
					    </ul>
					</li> -->
					<hr>
					<li class="nav-item">
					    <a href="<?= base_url('Admin/beranda'); ?>" class="nav-link" style="background: #3aaa36;color:white;"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Beranda</span></a>
					</li>
					<li class="nav-item">
					    <a href="<?= base_url('Admin/generateqrcode'); ?>" class="nav-link" style="background: #3aaa36;color:white;"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Generate QrCode</span></a>
					</li>
					<li class="nav-item">
					    <a href="<?= base_url('Admin/dataguru'); ?>" class="nav-link" style="background: #3aaa36;color:white;"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Data Guru</span></a>
					</li>
					<li class="nav-item">
					    <a href="<?= base_url('Admin/presensi'); ?>" class="nav-link" style="background: #3aaa36;color:white;"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Data Presensi Guru</span></a>
					</li>
					<li class="nav-item">
					    <a href="<?= base_url('Admin/laporanpresensi'); ?>" class="nav-link" style="background: #3aaa36;color:white;"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Laporan</span></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
						<h4 style="color: white">Presensi Guru</h4>
						<!-- ========   change your logo hear   ============ -->
						<!-- <img src="<?= base_url(); ?>assets/assetsadmin/images/logo.png" alt="" class="logo">
						<img src="<?= base_url(); ?>assets/assetsadmin/images/logo-icon.png" alt="" class="logo-thumb"> -->
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
							<div class="search-bar">
								<input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
								<button type="button" class="close" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav ml-auto">
						
						
					</ul>
				</div>
				
			
	</header>
	<!-- [ Header ] end -->
	