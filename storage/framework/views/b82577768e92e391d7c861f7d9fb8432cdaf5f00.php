<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<?php if(request()->is('blog/*')): ?>
		<?php echo $__env->yieldContent('meta-infos'); ?>
	<?php else: ?>
		<meta name="keywords" content="<?php echo e($seo->meta_keys); ?>">
	<?php endif; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo e($gs->title); ?></title>
	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo e(asset('assets/front/images/favicon.png')); ?>" type="image/x-icon">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/bootstrap.min.css')); ?>">
	<!-- Plugin css -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/plugin.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/select2.min.css')); ?>">
	<!-- stylesheet -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/style.css')); ?>">
	<!-- responsive -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/responsive.css')); ?>">
	<!-- custom -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/custom.css')); ?>">
	<!-- base color -->
	<link rel="stylesheet" href="<?php echo e(asset('faq/assets/web/assets/mobirise-icons/mobirise-icons.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/styles.php?color='.str_replace('#','',$gs->colors))); ?>">
	<link href="<?php echo e(asset('assets/css/app.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('assets/css/normalize-min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('assets/css/scrollbar-min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/jquery-ui-min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('assets/css/linearicons.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('assets/css/main.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('assets/css/custom.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('assets/css/responsive.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('assets/css/rtl.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('assets/css/color.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('assets/css/component-custom-switch.css')); ?>" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('faq/assets/tether/tether.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('faq/assets/bootstrap/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('faq/assets/bootstrap/css/bootstrap-grid.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('faq/assets/bootstrap/css/bootstrap-reboot.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('faq/assets/shopping-cart/minicart-theme.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('faq/assets/dropdown/css/style.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('faq/assets/theme/css/style.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('faq/assets/mobirise/css/mbr-additional.css" type="text/css')); ?>">
	<?php if(request()->is('*/cars') || request()->is('register')|| request()->is('inspect')): ?>
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
<?php endif; ?>
	<script async src = "https://www.googletagmanager.com/gtag/js?id=<?php echo e($seo->google_analytics); ?>" ></script>
	<script>
	window.dataLayer = window.dataLayer || [];

	function gtag() {
	    dataLayer.push(arguments);
	}
	gtag('js', new Date());

	gtag('config', '<?php echo e($seo->google_analytics); ?>');
	</script>
	<script src="<?php echo e(asset('assets/front/js/jquery.js')); ?>"></script>
</head>

<body>

	<?php if($gs->is_loader == 1): ?>
		<div class="preloader" id="preloader" style="background: url(<?php echo e(asset('assets/front/images/loader.gif')); ?>) no-repeat scroll center center #FFF;"></div>
	<?php endif; ?>


	<!--Main-Menu Area Start-->
	<div class="mainmenu-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="<?php echo e(route('front.index')); ?>">
							<img src="<?php echo e(asset('assets/front/images/logo.png')); ?>" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse fixed-height" id="main_menu">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link <?php if(request()->path() == '/'): ?> active <?php endif; ?>" href="<?php echo e(route('front.index')); ?>"><?php echo e($langg->lang1); ?></a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?php if(request()->path() == 'cars'): ?> active <?php endif; ?>" href="<?php echo e(route('front.cars')); ?>"><?php echo e($langg->lang2); ?></a>
								</li>
								<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle <?php if(request()->is('*/cars')): ?> active	<?php endif; ?>" href="#" role="button" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
											Comparison 
										</a>
										<div class="dropdown-menu">
												<a class="dropdown-item <?php if(request()->is("cars/comparison")): ?> active	<?php endif; ?>" href="<?php echo e(route('front.comparison')); ?>">Cars Comparison</a>
												<a class="dropdown-item <?php if(request()->is("details/comparison")): ?> active	<?php endif; ?>" href="<?php echo e(route('front.comparison.details')); ?>">Comparison Details</a>
										</div>
									</li>
									<li class="nav-item">
										<a class="nav-link <?php if(request()->path() == 'inspect'): ?> active <?php endif; ?>" href="<?php echo e(route('front.inspect')); ?>">Inspect Car</a>
								</li>
								<?php if(!empty($menus)): ?>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle <?php if(request()->is('*/pages')): ?> active	<?php endif; ?>" href="#" role="button" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
											<?php echo e($langg->lang3); ?>

										</a>
										<div class="dropdown-menu">
											<?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<a class="dropdown-item <?php if(request()->is("$menu->slug/pages")): ?> active	<?php endif; ?>" href="<?php echo e(route('front.dynamicPage', $menu->slug)); ?>"><?php echo e($menu->title); ?></a>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
									</li>
								<?php endif; ?>
								<?php if($gs->is_faq == 1): ?>
								<li class="nav-item">
									<a class="nav-link <?php if(request()->path() == 'faq'): ?> active <?php endif; ?>" href="<?php echo e(route('front.faq')); ?>"><?php echo e($langg->lang4); ?></a>
								</li>
								<?php endif; ?>
								<?php if($gs->is_hiw == 1): ?>
								<li class="nav-item">
									<a class="nav-link <?php if(request()->path() == 'hiw'): ?> active <?php endif; ?>" href="<?php echo e(route('front.hiw')); ?>">How it Works</a>
								</li>
								<?php endif; ?>

								<li class="nav-item">
									<a class="nav-link <?php if(request()->path() == 'blog'): ?> active <?php endif; ?>" href="<?php echo e(route('front.blog')); ?>">Expert Reviews</a>
								</li>

								<?php if($ps->is_contact == 1): ?>
									<li class="nav-item">
										<a class="nav-link <?php if(request()->path() == 'contact'): ?> active <?php endif; ?>" href="<?php echo e(route('front.contact')); ?>"><?php echo e($langg->lang6); ?> </a>
									</li>
								<?php endif; ?>
							</ul>
							<a href="<?php echo e(route('user.login-signup')); ?>" class="mybtn1 ml-4">
								<?php if(auth()->guard()->check()): ?>
									<?php echo e($langg->lang8); ?>

								<?php endif; ?>
								<?php if(auth()->guard()->guest()): ?>
									<?php echo e($langg->lang7); ?>

								<?php endif; ?>
							</a>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!--Main-Menu Area Start-->

		<?php echo $__env->yieldContent('content'); ?>

	<!-- Footer Area Start -->
	<footer class="footer" id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget about-widget">
						<div class="footer-logo">
							<a href="<?php echo e(route('front.index')); ?>">
								<img src="<?php echo e(asset('assets/front/images/footer_logo.png')); ?>" alt="">
							</a>
						</div>
						<div class="text">
							<p>
								<?php echo e($gs->footer); ?>

							</p>
						</div>

					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget address-widget">
						<h4 class="title">
							<?php echo e($langg->lang18); ?>

						</h4>
						<ul class="about-info">
							<li>
								<p>
										<i class="fas fa-globe"></i>
									<?php echo e($gs->footer_address); ?>

								</p>
							</li>
							<li>
								<p>
										<i class="fas fa-phone"></i>
										<?php echo e($gs->footer_phone); ?>

								</p>
							</li>
							<li>
								<p>
										<i class="far fa-envelope"></i>
										<?php echo e($gs->footer_email); ?>

								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
						<div class="footer-widget  footer-newsletter-widget">
							<h4 class="title">
								<?php echo e($langg->lang19); ?>

							</h4>
							<?php echo $__env->make('includes.admin.form-both', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<div class="gocover" style="background: url(<?php echo e(asset('assets/front/images/loader.gif')); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
							<div class="newsletter-form-area">
								<form id="geniusform" action="<?php echo e(route('front.subscribe')); ?>" method="post">
									<?php echo e(csrf_field()); ?>

									<input type="email" name="email" placeholder="Your email address..." required>
									<button type="submit">
										<i class="far fa-paper-plane"></i>
									</button>
								</form>
							</div>
							<div class="social-links">
								<h4 class="title">
										<?php echo e($langg->lang20); ?> :
								</h4>
								<div class="fotter-social-links">
									<ul>
										<?php if($gs->f_status == 1): ?>
	                  <li>
	                     <a href="<?php echo e($gs->facebook); ?>" target="_blank">
	                     <i class="fab fa-facebook-f"></i>
	                     </a>
	                  </li>
	                  <?php endif; ?>
	                  <?php if($gs->t_status == 1): ?>
	                  <li>
	                     <a href="<?php echo e($gs->twitter); ?>" target="_blank">
	                     <i class="fab fa-twitter"></i>
	                     </a>
	                  </li>
	                  <?php endif; ?>
	                  <?php if($gs->i_status == 1): ?>
	                  <li>
	                     <a href="<?php echo e($gs->instagram); ?>" target="_blank">
	                     <i class="fab fa-instagram"></i>
	                     </a>
	                  </li>
	                  <?php endif; ?>
	                  <?php if($gs->g_status == 1): ?>
	                  <li>
	                     <a href="<?php echo e($gs->gplus); ?>" target="_blank">
	                     <i class="fab fa-google-plus-g"></i>
	                     </a>
	                  </li>
	                  <?php endif; ?>
	                  <?php if($gs->l_status == 1): ?>
	                  <li>
	                     <a href="<?php echo e($gs->linkedin); ?>" target="_blank">
	                     <i class="fab fa-linkedin-in"></i>
	                     </a>
	                  </li>
	                  <?php endif; ?>
	                  <?php if($gs->d_status == 1): ?>
	                  <li>
	                     <a href="<?php echo e($gs->dribble); ?>" target="_blank">
	                     <i class="fas fa-basketball-ball"></i>
	                     </a>
	                  </li>
	                  <?php endif; ?>
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
									<p><?php echo e($gs->copyright); ?></p>
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
	<script src="<?php echo e(asset('assets/front/js/bootstrap.min.js')); ?>"></script>
	<!-- popper -->
	<script src="<?php echo e(asset('assets/front/js/popper.min.js')); ?>"></script>
	<!-- plugin js-->
	<script src="<?php echo e(asset('assets/front/js/plugin.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/front/js/toltip.js')); ?>"></script>
	<!-- main -->
	<script src="<?php echo e(asset('assets/front/js/main.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/admin/js/select2.min.js')); ?>"></script>
	<script src="<?php echo e(asset('faq/assets/web/assets/jquery/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('faq/assets/popper/popper.min.js')); ?>"></script>
	<script src="<?php echo e(asset('faq/assets/tether/tether.min.js')); ?>"></script>
	<script src="<?php echo e(asset('faq/assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('faq/assets/smooth-scroll/smooth-scroll.js')); ?>"></script>
	<script src="<?php echo e(asset('faq/assets/shopping-cart/minicart.js')); ?>"></script>
	<script src="<?php echo e(asset('faq/assets/shopping-cart/jquery.easing.min.js')); ?>"></script>
	<script src="<?php echo e(asset('faq/assets/shopping-cart/minicart-customizer.js')); ?>"></script>
	<script src="<?php echo e(asset('faq/assets/dropdown/js/script.min.js')); ?>"></script>
	<script src="<?php echo e(asset('faq/assets/touch-swipe/jquery.touch-swipe.min.js')); ?>"></script>
	<script src="<?php echo e(asset('faq/assets/theme/js/script.js')); ?>"></script>
 
	<script>
		var gs = <?php echo json_encode($gs) ?>;
	</script>
	<!-- custom -->
	<script src="<?php echo e(asset('assets/front/js/custom.js')); ?>"></script>
	<script>
	<?php if(Session::has('message')): ?>
		var type="<?php echo e(Session::get('alert-type','info')); ?>"	
			switch(type){
				case 'info':
			         toastr.info("<?php echo e(Session::get('message')); ?>");
			         break;
		        case 'success':
		            toastr.success("<?php echo e(Session::get('message')); ?>");
		            break;
	         	case 'warning':
		            toastr.warning("<?php echo e(Session::get('message')); ?>");
		            break;
		        case 'error':
			        toastr.error("<?php echo e(Session::get('message')); ?>");
			        break;
			}
		<?php endif; ?>
	</script>

	<?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
