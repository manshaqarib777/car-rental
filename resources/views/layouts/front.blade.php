<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@if (request()->is('blog/*'))
		@yield('meta-infos')
	@else
		<meta name="keywords" content="{{ $seo->meta_keys }}">
	@endif
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $gs->title }}</title>
	<!-- favicon -->
	<link rel="shortcut icon" href="{{asset('assets/front/images/favicon.png')}}" type="image/x-icon">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
	<!-- Plugin css -->
	<link rel="stylesheet" href="{{asset('assets/front/css/plugin.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/admin/css/select2.min.css') }}">
	<!-- stylesheet -->
	<link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/front/css/responsive.css')}}">
	<!-- custom -->
	<link rel="stylesheet" href="{{asset('assets/front/css/custom.css')}}">
	<!-- base color -->
	<link rel="stylesheet" href="{{ asset('faq/assets/web/assets/mobirise-icons/mobirise-icons.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/front/css/styles.php?color='.str_replace('#','',$gs->colors)) }}">
	<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/normalize-min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/scrollbar-min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery-ui-min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/linearicons.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/color.css') }}" rel="stylesheet">
	<link href="{{asset('assets/css/component-custom-switch.css')}}" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('faq/assets/tether/tether.min.css')}}">
	<link rel="stylesheet" href="{{ asset('faq/assets/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('faq/assets/bootstrap/css/bootstrap-grid.min.css')}}">
	<link rel="stylesheet" href="{{ asset('faq/assets/bootstrap/css/bootstrap-reboot.min.css')}}">
	<link rel="stylesheet" href="{{ asset('faq/assets/shopping-cart/minicart-theme.css')}}">
	<link rel="stylesheet" href="{{ asset('faq/assets/dropdown/css/style.css')}}">
	<link rel="stylesheet" href="{{ asset('faq/assets/theme/css/style.css')}}">
	<link rel="stylesheet" href="{{ asset('faq/assets/mobirise/css/mbr-additional.css" type="text/css')}}">
	@if(request()->is('*/cars') || request()->is('register')|| request()->is('inspect'))
	<style type="text/css">
	.select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 28px;
    user-select: none;
    -webkit-user-select: none;
    width: 100%;
    height: 60px;
    padding: 0px 30px 0px 47px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    font-size: 14px;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 4px;
    width: 100%;
    height: 60px;
    padding: 0px 30px 0px 47px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    font-size: 14px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 28px;
    margin-top: 14px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 26px;
    position: absolute;
    top: 1px;
    right: 1px;
    width: 20px;
    margin-top: 14px;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    border-bottom: 1px solid #dee2e6;
}
/** rating **/
div.stars {
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 20px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: 'f005';
  color: #e74c3c;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #e74c3c;
  text-shadow: 0 0 5px #7f8c8d;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: 'f006';
  font-family: FontAwesome;
}


.horline > li:not(:last-child):after {
    content: " |";
}
.horline > li {
  font-weight: bold;
  color: #ff7e1a;

}
/** end rating **/
</style>
@endif
	<script async src = "https://www.googletagmanager.com/gtag/js?id={{ $seo->google_analytics }}" ></script>
	<script>
	window.dataLayer = window.dataLayer || [];

	function gtag() {
	    dataLayer.push(arguments);
	}
	gtag('js', new Date());

	gtag('config', '{{ $seo->google_analytics }}');
	</script>
	<script src="{{asset('assets/front/js/jquery.js')}}"></script>
</head>

<body>

	@if($gs->is_loader == 1)
		<div class="preloader" id="preloader" style="background: url({{asset('assets/front/images/loader.gif')}}) no-repeat scroll center center #FFF;"></div>
	@endif


	<!--Main-Menu Area Start-->
	<div class="mainmenu-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="{{ route('front.index') }}">
							<img src="{{asset('assets/front/images/logo.png')}}" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse fixed-height" id="main_menu">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link @if(request()->path() == '/') active @endif" href="{{ route('front.index') }}">{{ $langg->lang1 }}</a>
								</li>
								<li class="nav-item">
									<a class="nav-link @if(request()->path() == 'cars') active @endif" href="{{ route('front.cars') }}">{{ $langg->lang2 }}</a>
								</li>
								<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle @if (request()->is('*/cars')) active	@endif" href="#" role="button" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
											Comparison 
										</a>
										<div class="dropdown-menu">
												<a class="dropdown-item @if (request()->is("cars/comparison")) active	@endif" href="{{route('front.comparison')}}">Cars Comparison</a>
												<a class="dropdown-item @if (request()->is("details/comparison")) active	@endif" href="{{route('front.comparison.details')}}">Comparison Details</a>
										</div>
									</li>
									<li class="nav-item">
										<a class="nav-link @if(request()->path() == 'inspect') active @endif" href="{{ route('front.inspect') }}">Inspect Car</a>
								</li>
								@if (!empty($menus))
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle @if (request()->is('*/pages')) active	@endif" href="#" role="button" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
											{{ $langg->lang3 }}
										</a>
										<div class="dropdown-menu">
											@foreach ($menus as $key => $menu)
												<a class="dropdown-item @if (request()->is("$menu->slug/pages")) active	@endif" href="{{route('front.dynamicPage', $menu->slug)}}">{{$menu->title}}</a>
											@endforeach
										</div>
									</li>
								@endif
								@if ($gs->is_faq == 1)
								<li class="nav-item">
									<a class="nav-link @if(request()->path() == 'faq') active @endif" href="{{ route('front.faq') }}">{{ $langg->lang4 }}</a>
								</li>
								@endif
								@if ($gs->is_hiw == 1)
								<li class="nav-item">
									<a class="nav-link @if(request()->path() == 'hiw') active @endif" href="{{ route('front.hiw') }}">How it Works</a>
								</li>
								@endif

								<li class="nav-item">
									<a class="nav-link @if(request()->path() == 'blog') active @endif" href="{{ route('front.blog') }}">Expert Reviews</a>
								</li>

								@if ($ps->is_contact == 1)
									<li class="nav-item">
										<a class="nav-link @if(request()->path() == 'contact') active @endif" href="{{ route('front.contact') }}">{{ $langg->lang6 }} </a>
									</li>
								@endif
							</ul>
							<a href="{{ route('user.login-signup') }}" class="mybtn1 ml-4">
								@auth
									{{ $langg->lang8 }}
								@endauth
								@guest
									{{ $langg->lang7 }}
								@endguest
							</a>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!--Main-Menu Area Start-->

		@yield('content')

	<!-- Footer Area Start -->
	<footer class="footer" id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget about-widget">
						<div class="footer-logo">
							<a href="{{ route('front.index') }}">
								<img src="{{ asset('assets/front/images/footer_logo.png')}}" alt="">
							</a>
						</div>
						<div class="text">
							<p>
								{{ $gs->footer }}
							</p>
						</div>

					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget address-widget">
						<h4 class="title">
							{{ $langg->lang18 }}
						</h4>
						<ul class="about-info">
							<li>
								<p>
										<i class="fas fa-globe"></i>
									{{ $gs->footer_address }}
								</p>
							</li>
							<li>
								<p>
										<i class="fas fa-phone"></i>
										{{ $gs->footer_phone }}
								</p>
							</li>
							<li>
								<p>
										<i class="far fa-envelope"></i>
										{{ $gs->footer_email }}
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
						<div class="footer-widget  footer-newsletter-widget">
							<h4 class="title">
								{{ $langg->lang19 }}
							</h4>
							@include('includes.admin.form-both')
							<div class="gocover" style="background: url({{ asset('assets/front/images/loader.gif') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
							<div class="newsletter-form-area">
								<form id="geniusform" action="{{ route('front.subscribe') }}" method="post">
									{{ csrf_field() }}
									<input type="email" name="email" placeholder="Your email address..." required>
									<button type="submit">
										<i class="far fa-paper-plane"></i>
									</button>
								</form>
							</div>
							<div class="social-links">
								<h4 class="title">
										{{ $langg->lang20 }} :
								</h4>
								<div class="fotter-social-links">
									<ul>
										@if ($gs->f_status == 1)
	                  <li>
	                     <a href="{{$gs->facebook}}" target="_blank">
	                     <i class="fab fa-facebook-f"></i>
	                     </a>
	                  </li>
	                  @endif
	                  @if ($gs->t_status == 1)
	                  <li>
	                     <a href="{{$gs->twitter}}" target="_blank">
	                     <i class="fab fa-twitter"></i>
	                     </a>
	                  </li>
	                  @endif
	                  @if ($gs->i_status == 1)
	                  <li>
	                     <a href="{{$gs->instagram}}" target="_blank">
	                     <i class="fab fa-instagram"></i>
	                     </a>
	                  </li>
	                  @endif
	                  @if ($gs->g_status == 1)
	                  <li>
	                     <a href="{{$gs->gplus}}" target="_blank">
	                     <i class="fab fa-google-plus-g"></i>
	                     </a>
	                  </li>
	                  @endif
	                  @if ($gs->l_status == 1)
	                  <li>
	                     <a href="{{$gs->linkedin}}" target="_blank">
	                     <i class="fab fa-linkedin-in"></i>
	                     </a>
	                  </li>
	                  @endif
	                  @if ($gs->d_status == 1)
	                  <li>
	                     <a href="{{$gs->dribble}}" target="_blank">
	                     <i class="fas fa-basketball-ball"></i>
	                     </a>
	                  </li>
	                  @endif
									</ul>
								</div>
							</div>

						</div>
				</div>
			</div>
		</div>
		<div class="copy-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
							<div class="content">
								<div class="content">
									<p>{{$gs->copyright }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer Area End -->

	<!-- Back to Top Start -->
	<div class="bottomtotop">
		<i class="fas fa-chevron-right"></i>
	</div>
	<!-- Back to Top End -->

	<!-- jquery -->
	
	<!-- bootstrap -->
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
	<!-- popper -->
	<script src="{{asset('assets/front/js/popper.min.js')}}"></script>
	<!-- plugin js-->
	<script src="{{asset('assets/front/js/plugin.js')}}"></script>
	<script src="{{asset('assets/front/js/toltip.js')}}"></script>
	<!-- main -->
	<script src="{{asset('assets/front/js/main.js')}}"></script>
	<script src="{{asset('assets/admin/js/select2.min.js')}}"></script>
	<script src="{{asset('faq/assets/web/assets/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('faq/assets/popper/popper.min.js')}}"></script>
	<script src="{{asset('faq/assets/tether/tether.min.js')}}"></script>
	<script src="{{asset('faq/assets/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('faq/assets/smooth-scroll/smooth-scroll.js')}}"></script>
	<script src="{{asset('faq/assets/shopping-cart/minicart.js')}}"></script>
	<script src="{{asset('faq/assets/shopping-cart/jquery.easing.min.js')}}"></script>
	<script src="{{asset('faq/assets/shopping-cart/minicart-customizer.js')}}"></script>
	<script src="{{asset('faq/assets/dropdown/js/script.min.js')}}"></script>
	<script src="{{asset('faq/assets/touch-swipe/jquery.touch-swipe.min.js')}}"></script>
	<script src="{{asset('faq/assets/theme/js/script.js')}}"></script>
 
	<script>
		var gs = @php echo json_encode($gs) @endphp;
	</script>
	<!-- custom -->
	<script src="{{asset('assets/front/js/custom.js')}}"></script>
	<script>
	@if(Session::has('message'))
		var type="{{Session::get('alert-type','info')}}"	
			switch(type){
				case 'info':
			         toastr.info("{{ Session::get('message') }}");
			         break;
		        case 'success':
		            toastr.success("{{ Session::get('message') }}");
		            break;
	         	case 'warning':
		            toastr.warning("{{ Session::get('message') }}");
		            break;
		        case 'error':
			        toastr.error("{{ Session::get('message') }}");
			        break;
			}
		@endif
	</script>

	@yield('scripts')
</body>

</html>
