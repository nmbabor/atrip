
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> @yield('title') | {{ readConfig('site_name') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="{{ assetImage(readconfig('favicon_icon')) }}" type="image/svg+xml">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('frontend/css/icomoon.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
	<!-- Superfish -->
	<link rel="stylesheet" href="{{asset('frontend/css/superfish.css')}}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datepicker.min.css')}}">
	<!-- CS Select -->
	<link rel="stylesheet" href="{{asset('frontend/css/cs-select.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/cs-skin-border.css')}}">
	
	<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">


	<!-- Modernizr JS -->
	<script src="{{asset('frontend/js/modernizr-2.6.2.min.js')}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="{{asset('frontend/js/respond.min.js')}}"></script>
	<![endif]-->
    @stack('style')

	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
            <section class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <p class="mb-0"> 
                                <b> <i class="icon-phone2"></i> </b> {{readconfig('contact_mobile')}}, 
                                <b> <i class="icon-mail"></i> </b> {{readconfig('contact_email')}}
                            </p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <p class="mb-0 pull-right top-social-links">
                            Social Links: 
                            @if(readconfig('facebook_link') != null)
                            <a title="Facebook" href="{{readconfig('facebook_link')}}" target="_blank"><i class="icon-facebook2"></i></a>
                            @endif

                            @if(readconfig('twitter_link') != null)
                            <a title="Twitter" href="{{readconfig('twitter_link')}}" target="_blank"><i class="icon-twitter2"></i></a>
                            @endif
                            
                            @if(readconfig('linkedin_link') != null)
                            <a title="Linkedin" href="{{readconfig('linkedin_link')}}" target="_blank"><i class="icon-linkedin2"></i></a>
                            @endif
                            @if(readconfig('youtube_link') != null)
                            <a title="Youtube" href="{{readconfig('youtube_link')}}" target="_blank"><i class="icon-youtube"></i></a>
                            @endif
                            @if(readconfig('instagram_link') != null)
                            <a title="Instagram" href="{{readconfig('instagram_link')}}" target="_blank"><i class="icon-instagram"></i></a>
                            @endif
                            
                            @if(readconfig('pinterest_link') != null)
                            <a title="Pinterest" href="{{readconfig('pinterest_link')}}" target="_blank"><i class="icon-pinterest"></i></a>
                            @endif 

                            @if(readconfig('tumblr_link') != null)
                            <a title="Tumblr" href="{{readconfig('tumblr_link')}}" target="_blank"><i class="icon-tumblr2"></i></a>
                            @endif
                            </p>
                        </div>
                    </div>
                    
                </div>
            </section>
		<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href="{{url('/')}}"> 
                        <img src="{{ assetImage(readconfig('site_logo')) }}" alt="{{readconfig('site_name')}}" style="max-width:100px">
                     </a></h1>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							@foreach(menus() as $menu)
							<li class="{{request()->path() == $menu->url ? 'active' : ''}}">
								<a href="{{url($menu->url)}}">{{$menu->name}} </a>
								@if(count($menu->subMenus)>0)
								<ul class="fh5co-sub-menu">
									@foreach($menu->subMenus->sortBy('serial_num') as $subMenu)
									<li><a href="{{url($subMenu->url)}}">{{$subMenu->name}}</a></li>
									@endforeach
								</ul>
								@endif
							</li>
							@endforeach
						</ul>
					</nav>
				</div>
			</div>
		</header>
        @yield('content')
		<footer>
			<div id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-12 fh5co-footer-link">
							<h3>Address</h3>
							<p> <b> <i class="icon-location-pin"></i> </b> {{readconfig('contact_address')}}</p>
							<p> <b> <i class="icon-phone2"></i> </b> {{readconfig('contact_mobile')}}</p>
							<p> <b> <i class="icon-mail"></i> </b> {{readconfig('contact_email')}}</p>
							<p> <b> <i class="icon-info"></i> </b> {{readconfig('working_hour')}}</p>
						</div>
						
						<div class="col-md-1 col-sm-1"></div>
						<div class="col-md-3 col-sm-3 col-xs-12 fh5co-footer-link">
							<h3>Quick Links</h3>
							<ul>
								<li><a href="{{url('/pages/terms-condition')}}">Terms of condition</a></li>
								<li><a href="{{url('/pages/privacy-policy')}}">Privacy Policy</a></li>
								<li><a href="{{url('/pages/refund-policy')}}">Refund Policy</a></li>
                                @if(Auth::check())
								<li><a href="{{route('dashboard.redirect')}}">Dashboard</a></li>
                                @else
                                <li><a href="{{route('login')}}">Login</a></li>
								<li><a href="{{route('signup')}}">Signup</a></li>
                                @endif
							</ul>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12 fh5co-footer-link">
							<h3>Connect with us</h3>
                            <p>Stay in the loop with our latest travel updates, deals, and adventures by following us on social media.
                                 Join our online community and embark on a journey of discovery with us!</p>
							<p class="fh5co-social-icons">
                                @if(readconfig('facebook_link') != null)
								<a title="Facebook" href="{{readconfig('facebook_link')}}" target="_blank"><i class="icon-facebook2"></i></a>
                                @endif

                                @if(readconfig('twitter_link') != null)
								<a title="Twitter" href="{{readconfig('twitter_link')}}" target="_blank"><i class="icon-twitter2"></i></a>
                                @endif
                                
                                @if(readconfig('linkedin_link') != null)
								<a title="Linkedin" href="{{readconfig('linkedin_link')}}" target="_blank"><i class="icon-linkedin2"></i></a>
                                @endif
                                @if(readconfig('youtube_link') != null)
								<a title="Youtube" href="{{readconfig('youtube_link')}}" target="_blank"><i class="icon-youtube"></i></a>
                                @endif
                                @if(readconfig('instagram_link') != null)
								<a title="Instagram" href="{{readconfig('instagram_link')}}" target="_blank"><i class="icon-instagram"></i></a>
                                @endif
                                
                                @if(readconfig('pinterest_link') != null)
								<a title="Pinterest" href="{{readconfig('pinterest_link')}}" target="_blank"><i class="icon-pinterest"></i></a>
                                @endif 

                                @if(readconfig('tumblr_link') != null)
								<a title="Tumblr" href="{{readconfig('tumblr_link')}}" target="_blank"><i class="icon-tumblr2"></i></a>
                                @endif
                                
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p>Copyright &copy; {{date('Y')}} <a href="{{readconfig('site_url')}}"> {{readconfig('site_name')}} </a>. All rights reserved  </p>
						</div>
					</div>
				</div>
			</div>
		</footer>

	

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->


	<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('frontend/js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('frontend/js/sticky.js')}}"></script>

	<!-- Stellar -->
	<script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>
	<!-- Superfish -->
	<script src="{{asset('frontend/js/hoverIntent.js')}}"></script>
	<script src="{{asset('frontend/js/superfish.js')}}"></script>
	<!-- Magnific Popup -->
	<script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('frontend/js/magnific-popup-options.js')}}"></script>
	<!-- Date Picker -->
	<script src="{{asset('frontend/js/bootstrap-datepicker.min.js')}}"></script>
	<!-- CS Select -->
	<script src="{{asset('frontend/js/classie.js')}}"></script>
	<script src="{{asset('frontend/js/selectFx.js')}}"></script>
	
	<!-- Main JS -->
	<script src="{{asset('frontend/js/main.js')}}"></script>

	</body>
</html>

