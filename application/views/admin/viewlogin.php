<!DOCTYPE html>
<html lang="en">

<head>

	<title>Presensi Guru</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
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

<!-- [ auth-signup ] start -->
<div class="auth-wrapper" style="background-color:white">
	<div class="">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<!-- <img src="<?= base_url(); ?>assets/img/logo pesantren.png" alt="" class="img-fluid mb-4" width="30%"> -->
						<h4 class="mb-3 f-w-400">Aplikasi Sistem Absensi SDIT Ruhama Depok</h4>
						<form class="login" action="<?= base_url('Admin/cek_login'); ?>" method="post">
							<div class="form-group mb-3">
								<label class="floating-label" for="Username">Username</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="">
							</div>
							<!-- <div class="form-group mb-3">
								<label class="floating-label" for="Email">Email address</label>
								<input type="text" class="form-control" id="Email" placeholder="">
							</div> -->
							<div class="form-group mb-4">
								<label class="floating-label" for="Password">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="">
							</div>
							<button type="submit" class="btn btn-primary btn-block mb-4">Login</button>
        				</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signup ] end -->

<!-- Required Js -->
<script src="<?= base_url(); ?>assets/assetsadmin/js/vendor-all.min.js"></script>
<script src="<?= base_url(); ?>assets/assetsadmin/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/assetsadmin/js/ripple.js"></script>
<script src="<?= base_url(); ?>assets/assetsadmin/js/pcoded.min.js"></script>



</body>

</html>
