
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>Login User</title>
	
	<link rel="icon" href="<?=base_url()?>assets/front-end/images/logoola.png">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<!-- BEGIN CSS FRAMEWORK -->
	<link rel="stylesheet" href="<?=base_url()?>assets/back-end/assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/back-end/assets/plugins/font-awesome/css/font-awesome.min.css">
	<!-- END CSS FRAMEWORK -->
	
	<!-- BEGIN CSS PLUGIN -->
	<link rel="stylesheet" href="<?=base_url()?>assets/back-end/assets/plugins/pace/pace-theme-minimal.css">
	<!-- END CSS PLUGIN -->
	
	<!-- BEGIN CSS TEMPLATE -->
	<link rel="stylesheet" href="<?=base_url()?>assets/back-end/assets/css/main.css">
	<!-- END CSS TEMPLATE -->
</head>

<body class="login">
	<div class="outer">
		<div class="middle">
			<div class="inner">
				<div class="row">
					<!-- BEGIN LOGIN BOX -->
					<div class="col-lg-12">
						<h3 class="text-center login-title">Login ke aplikasi</h3>
						<div class="account-wall">
							<!-- BEGIN PROFILE IMAGE -->
							<img class="profile-img" src="<?=base_url()?>assets/back-end/assets/img/photo.png" alt="">
							<!-- END PROFILE IMAGE -->
							<!-- BEGIN LOGIN FORM -->
							<form name="login" action="<?=base_url()?>c_loginuser/auth" class="form-login" method="post">
								<input type="text" name="userNama" class="form-control" placeholder="Namauser" autofocus>
								<input type="password" name="userPassword" class="form-control" placeholder="Password">
								<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
								
							</form>
							<!-- END LOGIN FORM -->
						</div>
						
					</div>
					<!-- END LOGIN BOX -->
				</div>
			</div>
		</div>
	</div>

	<!-- BEGIN JS FRAMEWORK -->
	<script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-2.1.0.min.js"></script>
	<script src="<?=base_url()?>assets/back-end/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- END JS FRAMEWORK -->
	
	<!-- BEGIN JS PLUGIN -->
	<script src="<?=base_url()?>assets/back-end/assets/plugins/pace/pace.min.js"></script>
	<!-- END JS PLUGIN -->
</body>
</html>