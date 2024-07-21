<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8" />
		<title>@yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Meta -->
		<meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="canonical" href="https://www.bootstrap.gallery/">
		<meta property="og:url" content="https://www.bootstrap.gallery">
		<meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
		<meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
		<meta property="og:type" content="Website">
		<meta property="og:site_name" content="Bootstrap Gallery">
		<link rel="shortcut icon" href="/assets/images/favicon.svg" />

		<!-- *************
			************ CSS Files *************
		************* -->
		<link rel="stylesheet" href="/assets/fonts/bootstrap/bootstrap-icons.css" />
		<link rel="stylesheet" href="/assets/css/main.min.css" />

		<!-- *************
			************ Vendor Css Files *************
		************ -->

		<!-- Scrollbar CSS -->
		<link rel="stylesheet" href="/assets/vendor/overlay-scroll/OverlayScrollbars.min.css" />
	</head>

	<body>
		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- Main container start -->
			<div class="main-container">

				<!-- Sidebar wrapper start -->
				<nav id="sidebar" class="sidebar-wrapper">

					<!-- App brand starts -->
					<div class="app-brand px-3 py-2 d-flex align-items-center">
						<a href="/index.html">
							<img src="/assets/images/logo.svg" class="logo" alt="Bootstrap Gallery" />
						</a>
					</div>
					<!-- App brand ends -->

					<!-- Sidebar menu starts -->
					<div class="sidebarMenuScroll">
						<ul class="sidebar-menu">
							<li @if (request()->route()->uri == 'dashboard') class='active' @endif>
								<a href="{{ route('dashboard') }}">
									<i class="bi bi-house-fill"></i>
									<span class="menu-text">Dashboard</span>
								</a>
							</li>
							@if (Auth::user()->role_id == 1)
							<li @if (request()->route()->uri == 'users') class='active' @endif>
								<a href="{{ route('users') }}">
									<i class="bi bi-person-fill"></i>
									<span class="menu-text">Users</span>
								</a>
							</li>								
							@endif
						{{--	<li>
								<a href="/contacts.html">
									<i class="bi bi-telephone"></i>
									<span class="menu-text">Contacts</span>
								</a>
							</li>
							<li>
								<a href="/faq.html">
									<i class="bi bi-box"></i>
									<span class="menu-text">FAQ's</span>
									<span class="badge border border-success text-success rounded-5 ms-2">New</span>
								</a>
							</li> --}}
							<li @if (request()->route()->uri == 'whatsapp_bot' || request()->route()->uri == 'telegram_bot') class='treeview active' @else class="treeview" @endif >
								<a href="/#!">
									<i class="bi bi-code-square"></i>
									<span class="menu-text">BOT</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="{{ route('bot_wa') }}">Whatsapp BOT</a>
									</li>
									<li>
										<a href="{{ route('bot_telegram') }}">Telegram BOT</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#">
									<i class="bi bi-currency-dollar"></i>
									<span class="menu-text">Transactions</span>
								</a>
							 </li>							
							<li>
								<a href="{{ route('logout') }}">
									<i class="bi bi-power"></i>
									<span class="menu-text">Logout</span>
								</a>
							</li>
						</ul>
					</div>
					<!-- Sidebar menu ends -->

				</nav>
				<!-- Sidebar wrapper end -->

				<!-- App container starts -->
				<div class="app-container">

					<!-- App header starts -->
					<div class="app-header d-flex align-items-center">

						<!-- Toggle buttons start -->
						<div class="d-flex">
							<button class="btn btn-outline-primary me-2 toggle-sidebar" id="toggle-sidebar">
								<i class="bi bi-text-indent-left fs-5"></i>
							</button>
							<button class="btn btn-outline-primary me-2 pin-sidebar" id="pin-sidebar">
								<i class="bi bi-text-indent-left fs-5"></i>
							</button>
						</div>
						<!-- Toggle buttons end -->

						<!-- App brand sm start -->
						<div class="app-brand-sm d-md-none d-sm-block">
							<a href="/index.html">
								<img src="/assets/images/logo-sm.svg" class="logo" alt="Bootstrap Gallery">
							</a>
						</div>
						<!-- App brand sm end -->

						<!-- Breadcrumb start -->
						<ol class="breadcrumb d-none d-lg-flex ms-3">
							<li class="breadcrumb-item">
								<i class="bi bi-house lh-1"></i>
								<a href="/index.html" class="text-decoration-none">Home</a>
							</li>
							<li class="breadcrumb-item text-secondary">
								@if (request()->route()->uri == 'dashboard')
								Dashboard
								@elseif(request()->route()->uri == 'users')
								Users
								@elseif(request()->route()->uri == 'whatsapp_bot')
								BOT
								<li class="breadcrumb-item text-secondary">Whatsapp BOT</li>
								@elseif(request()->route()->uri == 'telegram_bot')
								BOT
								<li class="breadcrumb-item text-secondary">Telegram BOT</li>
								@elseif(request()->route()->uri == 'account/{id}')
								Account Settings
								@else
								Change Password
								@endif
							</li>
						</ol>
						<!-- Breadcrumb end -->

						<!-- App header actions start -->
						<div class="header-actions">
							<div class="dropdown ms-2">
								<a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center text-decoration-none"
									href="/#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<img src="{{ asset('/storage/images/'.Auth::user()->image) }}" class="rounded-2 img-3x" alt="Bootstrap Gallery" />
								</a>
								<div class="dropdown-menu dropdown-menu-end shadow-sm">							
									<div class="p-3 border-bottom mb-2">
										<h6 class="mb-1">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</h6>
									</div>
									<a class="dropdown-item d-flex align-items-center" href="{{ route('account', Auth::user()->id) }}"><i
											class="bi bi-person fs-4 me-2"></i>Profile</a>
									<a class="dropdown-item d-flex align-items-center" href="{{ route('change-password', Auth::user()->id) }}"><i
											class="bi bi-gear fs-4 me-2"></i>Change Password</a>
									<div class="d-grid p-3 py-2">
										<a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
									</div>
								</div>
							</div>
						</div>
						<!-- App header actions end -->

					</div>
					<!-- App header ends -->

					<!-- App body starts -->
					<div class="app-body">

						<!-- Container starts -->
						<div class="container-fluid">
							<div class="row">
								<div class="col-xxl-6">

									<!-- Start content -->
									@yield('users')
									@yield('edit-user')
									@yield('change-password')
									@yield('bot_wa')
									@yield('bot_telegram')
									<!-- End content -->									
								</div>
							</div>
						</div>
					</div>
					<!-- App body ends -->
				</div>
				<!-- App container ends -->

			</div>
			<!-- Main container end -->
		</div>
		<!-- Page wrapper end -->

		<!-- *************
			************ JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/bootstrap.bundle.min.js"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Overlay Scroll JS -->
		<script src="/assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
		<script src="/assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

		<script type="text/javascript">window.setTimeout("document.getElementById('flashMessage').style.display='none';", 5000); </script>

		<!-- Custom JS files -->
		<script src="/assets/js/custom.js"></script>
	</body>

</html>