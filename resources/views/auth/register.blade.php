<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Bootstrap Gallery - Mars Admin Template</title>

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
        <style>
            .password-error {
                border-color: red !important;
            }
        
            .error-message {
                color: red;
                font-size: 0.875rem;
                margin-top: 0.25rem;
            }
        </style>
	</head>

	<body>
		<!-- Container start -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-5 col-sm-6 col-12">
                    <div class="border rounded-2 p-4 mt-5 mb-5">
                        <div class="login-form">
                            <a href="index.html" class="mb-4 d-flex">
                                <img src="assets/images/logo.svg" class="img-fluid login-logo" alt="Mars Admin Dashboard" />
                            </a>
                            <h5 class="fw-bold mb-3">Create your account.</h5>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif              
                            @if (Session::has('status'))
                            <div class="alert alert-{{ Session::get('status') == 'success' ? 'success' : 'danger' }} alert-dismissible fade show" role="alert" id="flashMessage">
                                {{ Session::get('message') }}
                            </div>
                            @endif
                            <form action="{{ route('registered') }}" class="my-5" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" />
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Enter Username" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter password" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" id="cpassword" class="form-control" placeholder="Re-enter password" />
                                    <div id="passwordError" class="error-message"></div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="termsConditions" onchange="toggleSignupButton()" />
                                        <label class="form-check-label" for="termsConditions">I agree to the terms and conditions</label>
                                    </div>
                                </div>
                                <div class="d-grid py-3">
                                    <button type="submit" class="btn btn-lg btn-primary" id="signupButton" disabled>SIGNUP</button>
                                </div>
                                <div class="text-center pt-4">
                                    <span>Already have an account?</span>
                                    <a href="{{ route('login') }}" class="text-blue text-decoration-underline ms-2">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container end -->
        <script>
            function handleFormValidation() {
                var password = document.getElementsByName("password")[0].value;
                var confirmPassword = document.getElementById("cpassword").value;
                var errorDiv = document.getElementById("passwordError");
                var signupButton = document.getElementById("signupButton");
                var checkbox = document.getElementById("termsConditions");

                if (password !== confirmPassword) {
                    errorDiv.textContent = "Passwords do not match";
                    signupButton.disabled = true;
                } else if(signupButton.disabled = !checkbox.checked) {
                    errorDiv.textContent = "";
                    signupButton.disabled = true;
                }else {
                    errorDiv.textContent = "";
                    signupButton.disabled = false;
                }
            }

            // Event listeners
            document.getElementsByName("password")[0].addEventListener("input", handleFormValidation);
            document.getElementById("cpassword").addEventListener("input", handleFormValidation);
            document.getElementById("termsConditions").addEventListener("change", handleFormValidation);
        </script>
		<script type="text/javascript">window.setTimeout("document.getElementById('flashMessage').style.display='none';", 5000); </script>

    </body>
</html>