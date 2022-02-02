<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>	
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets')}}/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	{{-- <link rel="stylesheet" href="{{asset('assets')}}/toastr.min.css"> --}}
	<link rel="stylesheet" href="{{asset('toastr')}}/toastr.min.css">

	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/animate.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/flexslider.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/chosen.min.css">
	{{-- select2 cdn --}}
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	{{-- datetimepiker cdn --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
	{{-- noui slider cdn --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css"/>

	{{-- style css --}}
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/style.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/color-01.css">
    @livewireStyles
</head>
<body class="home-page home-01 ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<ul>
								<li class="menu-item" >
									<a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
								</li>
							</ul>
						</div>
						<div class="topbar-menu right-menu">
							<ul>
								
								<li class="menu-item lang-menu menu-item-has-children parent">
									<a title="English" href="#"><span class="img label-before"><img src="{{asset('assets')}}/images/lang-en.png" alt="lang-en"></span>English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu lang" >
										<li class="menu-item" ><a title="hungary" href="#"><span class="img label-before"><img src="{{asset('assets')}}/images/lang-hun.png" alt="lang-hun"></span>Hungary</a></li>
										<li class="menu-item" ><a title="german" href="#"><span class="img label-before"><img src="{{asset('assets')}}/images/lang-ger.png" alt="lang-ger" ></span>German</a></li>
										<li class="menu-item" ><a title="french" href="#"><span class="img label-before"><img src="{{asset('assets')}}/images/lang-fra.png" alt="lang-fre"></span>French</a></li>
										<li class="menu-item" ><a title="canada" href="#"><span class="img label-before"><img src="{{asset('assets')}}/images/lang-can.png" alt="lang-can"></span>Canada</a></li>
									</ul>
								</li>
								<li class="menu-item menu-item-has-children parent" >
									<a title="Dollar (USD)" href="#">Dollar (USD)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu curency" >
										<li class="menu-item" >
											<a title="Pound (GBP)" href="#">Pound (GBP)</a>
										</li>
										<li class="menu-item" >
											<a title="Euro (EUR)" href="#">Euro (EUR)</a>
										</li>
										<li class="menu-item" >
											<a title="Dollar (USD)" href="#">Dollar (USD)</a>
										</li>
									</ul>
								</li>
								@if (Route::has('login'))
									@auth
										@if (Auth::user()->utype === 'ADM')
											<li class="menu-item menu-item-has-children parent" >
												<a title="My account" href="#">My account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{route('admin.dashboard')}}">Dashboard</a>
													</li>
													<li class="menu-item" >
														<a title="Categories" href="{{route('admin.categories')}}">Categories</a>						
													</li>
													<li class="menu-item" >
														<a title="Products" href="{{route('admin.products')}}">Products</a>	
													</li>
													<li class="menu-item" >
														<a title="Products" href="{{route('admin.sale')}}">Sale Setting</a>	
													</li>
													<li class="menu-item" >
														<a title="Products" href="{{route('admin.coupons')}}">All Coupon</a>	
													</li>
													<li class="menu-item" >
														<a title="Manage Home Slider" href="{{route('admin.homeslider')}}">Manage Home Slider</a>						
													</li>
													<li class="menu-item" >
														<a title="Manage Home Categories" href="{{route('admin.homecategories')}}">Manage Home Categories</a>						
													</li>
													<li class="menu-item" >
														<a title="All Orders" href="{{route('admin.orders')}}">All Orders</a>						
													</li>
													<li class="menu-item" >
														<a title="Contact Messages" href="{{route('admin.contact')}}">Contact Messages</a>						
													</li>
													<li class="menu-item" >
														<a title="Settings" href="{{route('admin.settings')}}">Settings</a>						
													</li>
													<form action="{{route('logout')}}" method="POST">
														@csrf
														<li class="menu-item" >
															<a title="Logout" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
														</li>
													</form>
												</ul>
											</li>
										@else
										<li class="menu-item menu-item-has-children parent" >
											<a title="My account" href="#">My account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
											<ul class="submenu curency" >
												<li class="menu-item" >
													<a title="Dashboard" href="{{route('user.dashborad')}}">Dashboard</a>
												</li>
												<li class="menu-item" >
													<a title="My Orders" href="{{route('user.orders')}}">My Orders</a>
												</li>
												<li class="menu-item" >
													<a title="My Orders" href="{{route('user.changepassword')}}">Change Password</a>
												</li>
												<form action="{{route('logout')}}" method="POST">
													@csrf
													<li class="menu-item" >
														<a title="Logout" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
													</li>
												</form>
											</ul>
										</li>
										@endif
									@else
										<li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
										<li class="menu-item" ><a title="Register or Login" href="{{route('register')}}">Register</a></li>
									@endauth
								@endif
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
							<a href="index.html" class="link-to-home"><img src="{{asset('assets')}}/images/logo-top-1.png" alt="mercado"></a>
						</div>

						@livewire('header-seacher-component')

						<div class="wrap-icon right-section">
							
							@livewire('wishlist-count-component')
							@livewire('cart-count-component')
							
							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>

					</div>
				</div>

				<div class="nav-section header-sticky">
					<div class="header-nav-section">
						<div class="container">
							<ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
								<li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
							</ul>
						</div>
					</div>

					<div class="primary-nav-section">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
								<li class="menu-item home-icon">
									<a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
								<li class="menu-item">
									<a href="about-us.html" class="link-term mercado-item-title">About Us</a>
								</li>
								<li class="menu-item">
									<a href="/shop" class="link-term mercado-item-title">Shop</a>
								</li>
								<li class="menu-item">
									<a href="/cart" class="link-term mercado-item-title">Cart</a>
								</li>
								<li class="menu-item">
									<a href="/checkout" class="link-term mercado-item-title">Checkout</a>
								</li>
								<li class="menu-item">
									<a href="/contact-us" class="link-term mercado-item-title">Contact Us</a>
								</li>																	
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	{{$slot}}

	@livewire('footer-component')
	<script src="{{asset('assets')}}/jquery-3.6.0.min.js"></script>
	{{-- <script src="{{asset('assets')}}/toastr.min.js"></script> --}}
	<script src="{{asset('toastr')}}/toastr.min.js"></script>
	
	{{-- <script src="{{asset('assets')}}/js/jquery-1.12.4.minb8ff.js?ver=1.12.4"></script> --}}
	<script src="{{asset('assets')}}/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4"></script>
	<script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
	<script src="{{asset('assets')}}/js/jquery.flexslider.js"></script>
	{{-- <script src="{{asset('assets')}}/js/chosen.jquery.min.js"></script> --}}
	<script src="{{asset('assets')}}/js/owl.carousel.min.js"></script>
	<script src="{{asset('assets')}}/js/jquery.countdown.min.js"></script>
	<script src="{{asset('assets')}}/js/jquery.sticky.js"></script>
	<script src="{{asset('assets')}}/js/functions.js"></script>
	{{-- select2 cdn --}}
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	{{-- moment js cdn --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
	{{-- datetimepiker cdn --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	{{-- noui slider cdn --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js"></script>
	{{-- tiny mce html text editor --}}
	<script src="https://cdn.tiny.cloud/1/97p8olo7z6vie9ir1z2qdhiwsr8xx6tpzw1pmisd2v0e2mmb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    @livewireScripts

	@stack('scripts')


	<script>
		$(document).ready(function () {
			toastr.options = {
						"closeButton": true,
						"progressBar": true,
						"timeOut": "5000",
						"positionClass": "toast-bottom-right",
						}
						
					window.addEventListener('toastr',event => {
						if(event.detail.type == 'Success'){
							toastr.success(event.detail.message, event.detail.type);
						}else if(event.detail.type == 'Error'){
							toastr.error(event.detail.message, event.detail.type);
						}
					})
		});
	</script>
	<script>
		 window.livewire.on('addCoupon',()=>{
            $('.form-horizontal')[0].reset();
        });
		 window.livewire.on('changePassword',()=>{
            $('#changePassword')[0].reset();
        });
	</script>
</body>
</html>