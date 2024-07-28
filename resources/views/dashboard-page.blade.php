<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>GENIEACSBOT</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/assets/homepage/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/assets/homepage/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/homepage/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/assets/homepage/style.css">
    <!-- Colors CSS -->
    <link rel="stylesheet" href="/assets/homepage/css/colors.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="/assets/homepage/css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/assets/homepage/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/homepage/css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="/assets/homepage/js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="/assets/homepage/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="/assets/homepage/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="host_version"> 
{{--     
    <!-- LOADER -->
	<div id="preloader">
		<div class="loading">
			<div class="finger finger-1">
				<div class="finger-item">
				<span></span><i></i>
				</div>
			</div>
  			<div class="finger finger-2">
				<div class="finger-item">
				<span></span><i></i>
				</div>
			</div>
  			<div class="finger finger-3">
				<div class="finger-item">
				  <span></span><i></i>
				</div>
			</div>
  			<div class="finger finger-4">
				<div class="finger-item">
				<span></span><i></i>
				</div>
			</div>
  			<div class="last-finger">
				<div class="last-finger-item"><i></i></div>
			</div>
		</div>
	</div>
	<!-- END LOADER --> --}}

    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    {{-- <a class="navbar-brand" href="/assets/homepage/index.html">
                        <img src="/assets/homepage/images/logos/logo-hosting.png" alt="image">
                    </a> --}}
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#service">Service </a></li>
                        <li><a href="#pricing">Pricing</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#">Documentation</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="btn-light btn-radius btn-brd log" href="{{ route('login') }}"><i class="flaticon-padlock"></i> Login Area</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
	
	<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="false" >
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div id="home" class="first-section" style="background-image:url('assets/homepage/images/home.jpg');">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 text-center">
								<div class="big-tagline">
									{{-- <img src="/assets/homepage/images/logos/logo-hosting.png" alt="image"> --}}
									<h2 data-animation="animated zoomInRight">Services to <strong>Monitor and Manage</strong> Your Network</h2>
									<p class="lead" data-animation="animated fadeInLeft">Serving your network needs with the latest technology.</p>
									 <a data-scroll href="#pricing" class="btn btn-light btn-radius btn-brd effect-1 slide-btn" data-animation="animated fadeInLeft">View Plans</a>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a data-scroll href="#service" class="btn btn-light btn-radius btn-brd effect-1 slide-btn" data-animation="animated fadeInRight">All Services</a>
								</div>
							</div>
						</div><!-- end row -->            
					</div><!-- end container -->
				</div><!-- end section -->
			</div>
		</div>
	</div>
	
    <div id="service" class="section wb" style="background: rgb(248, 248, 248)">
        <div class="container">
            <div class="section-title text-center">
                <h3>Our Services</h3>
                <p class="lead">Geniceacsbot is a bot service that manages your network efficiently and automatically.</p>
            </div><!-- end title -->

            <div class="row dev-list text-center">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="widget clearfix">
                        <img src="/assets/homepage/uploads/wa.jpeg" alt="" class="img-responsive">
                        <div class="widget-title">
                            <h3>Whatsapp BOT</h3>
                        </div>
                        <!-- end title -->
                        <p>WhatsApp Bot service is an automated solution that enables effective interaction with users through the WhatsApp application.</p>
                    </div><!--widget -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                    <div class="widget clearfix">
                        <img src="/assets/homepage/uploads/telegram.jpg" alt="" class="img-responsive">
                        <div class="widget-title">
                            <h3>Telegram BOT</h3>
                        </div>
                        <!-- end title -->
                        <p>Telegram Bot service is an automation tool that facilitates communication and interaction with users through the Telegram platform.</p>
                    </div><!--widget -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                    <div class="widget clearfix">
                        <img src="/assets/homepage/uploads/hosting_03.jpg" alt="" class="img-responsive">
                        <div class="widget-title">
                            <h3>Dedicated Server</h3>
                        </div>
                        <!-- end title -->
                        <p>Predefined internet lorem Ipsum generators on the tend to repeat chunks as necessary, true and more..</p>
                    </div><!--widget -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div id="pricing" class="section lb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Ready to get started?</h3>
            </div><!-- end title -->
            <hr class="invis">
            <div class="row text-center" style="display: flex; justify-content: center;">
                <div class="col-md-6">
                    <div class="pricing-table pricing-table-highlighted">
                        <div class="pricing-table-header grd1">
                            <h2>Premium Features</h2>
                            <h3>IDR 50.0000/month</h3>
                        </div>
                        <div class="pricing-table-space"></div>
                        <div class="pricing-table-features">
                            <p><i class="fa fa-code"></i> <strong>20++</strong>Customize BOT Commands</p>
                            <p><i class="fa fa-usd"></i> <strong>Manage</strong> your Transactions</p>
                            <p><i class="fa fa-server"></i> <strong>99,9%</strong> Server Uptime</p>
                            <p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p>
                        </div>
                        <div class="pricing-table-sign-up">
                            <a href="{{ route('login') }}" data-scroll class="btn btn-light btn-radius btn-brd grd1 effect-1">Order Now</a>
                        </div>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

<div id="contact" class="section wb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Need Help? Sure we are Online!</h3>
        </div><!-- end title -->
    
        <div class="row">
            <div class="col-md-12">
                <div class="contact_form">
                    <div id="message"></div>
                    <form id="contactform" class="row" action="{{ route('contact.send') }}" method="post">
                        @csrf
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="text" name="full_name" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="email" name="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <textarea class="form-control" name="comments" rows="6" placeholder="Give us more details.."></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <button type="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Get a Quote</button>
                        </div>
                    </form>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div>    

    {{-- <div id="contact" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Need Help? Sure we are Online!</h3>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form id="contactform" class="row" action="contact.php" name="contactform" method="post">
                            <fieldset class="row-fluid">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="full_name" id="first_name" class="form-control" placeholder="Name">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Give us more details.."></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Get a Quote</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section --> --}}

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>GENICEACS BOT</h3>
                            {{-- <img src="/assets/homepage/images/logos/logo-hosting-light.png" alt=""> --}}
                        </div>
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Information Link</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="#home">Home</a></li>
                            <li><a href="#service">Service</a></li>
                            <li><a href="#pricing">Pricing</a></li>
							<li><a href="#contact">Contact</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="/assets/homepage/mailto:#">support@genieacsbot.online</a></li>
                            <li><a href="/assets/homepage/#">www.genieacsbot.online</a></li>
                            {{-- <li>PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                            <li>+61 3 8376 6284</li> --}}
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div>
                <!-- end col -->

                <div class="col-md-2 col-sm-2 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Social</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="/assets/homepage/#"><i class="fa fa-facebook"></i> 22.543 Likes</a></li>
                            <li><a href="/assets/homepage/#"><i class="fa fa-github"></i> 128 Projects</a></li>
                            <li><a href="/assets/homepage/#"><i class="fa fa-twitter"></i> 12.860 Followers</a></li>
                            <li><a href="/assets/homepage/#"><i class="fa fa-dribbble"></i> 3312 Shots</a></li>
                            <li><a href="/assets/homepage/#"><i class="fa fa-pinterest"></i>3331 Pins</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->                            
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->
    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="/assets/homepage/js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="/assets/homepage/js/custom.js"></script>

    <script>
        // Fungsi untuk menetapkan kelas 'active' pada link berdasarkan hash
        function setActiveLink() {
            // Ambil hash dari URL saat ini
            var hash = window.location.hash;
        
            // Cari semua elemen <a> di dalam menu
            var links = document.querySelectorAll('a');
        
            // Loop melalui semua link
            links.forEach(function(link) {
                // Hapus kelas 'active' dari semua link terlebih dahulu
                link.classList.remove('active');
        
                // Jika href link sama dengan hash dan tidak kosong
                if (link.getAttribute('href') === hash && hash !== '') {
                    // Tambahkan kembali kelas 'active'
                    link.classList.add('active');
                }
            });
        }
        
        // Panggil fungsi setActiveLink() untuk pertama kali saat halaman dimuat
        setActiveLink();
        
        // Tambahkan event listener untuk mendeteksi perubahan hash URL
        window.addEventListener('hashchange', function() {
            // Panggil kembali setActiveLink() saat hash URL berubah
            setActiveLink();
        });
        </script>            

        {{-- <!-- Include SweetAlert -->
    @include('sweetalert::alert') --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // Check if session has 'status' and 'message' from backend
    @if(session('status') && session('message'))
        Swal.fire({
            icon: '{{ session('status') }}',
            title: '{{ session('message') }}',
            showConfirmButton: false,
            timer: 2000
        });
    @endif
</script>
</body>
</html>