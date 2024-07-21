
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Login Area</title>

		<!-- Meta -->
		<meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="canonical" href="https://www.bootstrap.gallery/">
		<meta property="og:url" content="https://www.bootstrap.gallery">
		<meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
		<meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
		<meta property="og:type" content="Website">
		<meta property="og:site_name" content="Bootstrap Gallery">
		<link rel="shortcut icon" href="assets/images/favicon.svg" />

		<!-- *************
			************ CSS Files *************
		************* -->
		<link rel="stylesheet" href="assets/fonts/bootstrap/bootstrap-icons.css" />
		<link rel="stylesheet" href="assets/css/main.min.css" />
	</head>

	<body>
		<!-- Container start -->
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-4 col-lg-5 col-sm-6 col-12">
					<div class="border rounded-2 p-4 mt-5">
						<div class="login-form">
							<a href="index.html" class="mb-4 d-flex">
								<img src="assets/images/logo.svg" class="img-fluid login-logo" alt="Mars Admin Dashboard" />
							</a>
							<h5 class="fw-bold mb-5">Sign in to access dashboard.</h5>			  
							@if (Session::has('status'))
							<div class="alert alert-{{ Session::get('status') == 'success' ? 'success' : 'danger' }} alert-dismissible fade show" role="alert" id="flashMessage">
								{{ Session::get('message') }}
							</div>
							@endif
							<form action="{{ route('authenticate') }}" class="my-5" method="POST">
								@csrf				
								<div class="mb-3">
									<label class="form-label">Username</label>
									<input type="text" name="username" class="form-control" placeholder="Enter username" />
								</div>
								<div class="mb-3">
									<label class="form-label">Your Password</label>
									<input type="password" name="password" class="form-control" placeholder="Enter password" />
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div class="form-check m-0">
										<input class="form-check-input" type="checkbox" value="" id="rememberPassword" />
										{{-- <label class="form-check-label" for="rememberPassword">Remember</label> --}}
									</div>
									<a href="{{ route('lostpassword') }}" class="text-blue text-decoration-underline">Lost password?</a>
								</div>
								<div class="d-grid py-3 mt-4">
									<button type="submit" class="btn btn-lg btn-primary">
										LOGIN
									</button>
								</div>
								<div class="text-center pt-4">
									<span>Not registered?</span>
									<a href="{{ route('register') }}" class="text-blue text-decoration-underline ms-2">
										SignUp</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Container end -->

		<script type="text/javascript">window.setTimeout("document.getElementById('flashMessage').style.display='none';", 5000); </script>
	</body>

</html>