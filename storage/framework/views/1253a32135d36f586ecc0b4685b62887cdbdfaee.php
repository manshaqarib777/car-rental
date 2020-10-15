<?php $__env->startSection('content'); ?>
        <section class="testimonial" style=" background-image: url(<?php echo e(asset('assets/front/images/'.$ps->topbanner_back_image)); ?>);">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-10">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-5">
                        <div class="wt-bannerimages">
                            <figure class="wt-bannermanimg" data-tilt>
                                <img src="<?php echo e(asset('assets/front/images/'.$ps->topbanner_front_image)); ?>" alt="">
                            </figure>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                        <div class="wt-bannercontent">
                            <div class="wt-bannerhead">
                                <div class="wt-title">
                                    <h1><span><?php echo e($ps->topbanner_heading); ?></span><?php echo e($ps->topbanner_small_des); ?></h1>
                                </div>
                                <div class="wt-description">
                                    <p><?php echo e($ps->topbanner_full_des); ?></p>
                                </div>
                            </div>
                            <div class="wt-videoholder">
                                <div class="wt-videoshow">
                                    <a data-rel="prettyPhoto[video]" href="<?php echo e($ps->top_banner_video_link); ?>"><i class="fa fa-play"></i></a>
                                </div>
                                <div class="wt-videocontent">
                                    <span>See For Yourself!<em>How it works & experience the ultimate joy.</em></span>
                                </div>
                            </div>
                        </div>
                    </div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- Hero Area Start -->
	<section class="hero-area">
		<img class="cars" src="<?php echo e(asset('assets/front/images/'.$ps->image)); ?>" alt="">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="content">
						<div class="heading-area">
							<h1 class="title">
									<?php echo e($ps->header_btxt); ?>

							</h1>
							<p class="sub-title">
									<?php echo e($ps->header_stxt); ?>

							</p>
						</div>
						<form id="searchForm" action="<?php echo e(route('front.cars')); ?>" method="get">
							<ul class="select-list">
								<li>
									<div class="car-brand">
										<select class="js-example-basic-single" name="brand_id[]">
											<option value="" selected disabled><?php echo e($langg->lang9); ?></option>
											<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</li>
								<li>
									<div class="car-condition">
										<select class="js-example-basic-single" name="condition_id">
											<option value="" selected disabled><?php echo e($langg->lang10); ?></option>
											<?php $__currentLoopData = $conditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $condition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($condition->id); ?>"><?php echo e($condition->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</li>
								<li>
									<div class="car-price">
										<select class="js-example-basic-single sel-price">
											<option value="" selected disabled><?php echo e($langg->lang11); ?></option>
											<?php $__currentLoopData = $pricings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pricing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($pricing->id); ?>"><?php echo e($pricing->minimum); ?> - <?php echo e($pricing->maximum); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
										<input type="hidden" name="minprice" value="">
										<input type="hidden" name="maxprice" value="">
									</div>
								</li>
								<li>
									<button type="submit" class="mybtn1" style="width: 100%; outline: 0;"><?php echo e($langg->lang12); ?></button>
								</li>
							</ul>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero Area End -->

	<!-- Featured Cars Area Start -->
	<section class="featuredCars">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-10">
					<div class="section-heading">
						<h2 class="title">
							<?php echo e($ps->featured_btxt); ?>

						</h2>
						<p class="text">
							<?php echo e($ps->featured_stxt); ?>

						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<?php $__currentLoopData = $fcars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $fcar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-lg-4 col-md-6">
							<a class="car-info-box" href="<?php echo e(route('front.details', $fcar->id)); ?>">
									<div class="img-area">
											<img class="light-zoom" src="<?php echo e(asset('assets/front/images/cars//featured/'.$fcar->featured_image)); ?>" alt="">
									</div>
									<div class="content">
										<h4 class="title">
											<?php echo e($fcar->title); ?>

										</h4>
										<ul class="top-meta">
											<li>
												<i class="far fa-eye"></i> <?php echo e($fcar->views); ?> <?php echo e($langg->lang13); ?>

											</li>
											<li>
												<i class="far fa-clock"></i> <?php echo e(time_elapsed_string($fcar->created_at)); ?>

											</li>
										</ul>
										<ul class="short-info">
											<li class="north-west" title="Model Year">
												<img src="<?php echo e(asset('assets/front/images/calender-icon.png')); ?>" alt="">
												<p><?php echo e($fcar->year); ?></p>
											</li>
											<li class="north-west" title="Mileage">
												<img src="<?php echo e(asset('assets/front/images/road-icon.png')); ?>" alt="">
												<p><?php echo e($fcar->mileage); ?></p>
											</li>
											<li class="north-west" title="Top Speed (KMH)">
												<img src="<?php echo e(asset('assets/front/images/transformar.png')); ?>" alt="">
												<p><?php echo e($fcar->top_speed); ?></p>
											</li>
										</ul>
										<div class="footer-area">
											<div class="left-area">
												<?php if(empty($fcar->sale_price)): ?>
													<p class="price">
														<?php echo e($fcar->currency_symbol); ?> <?php echo e(number_format($fcar->regular_price, 0, '', ',')); ?>

													</p>
												<?php else: ?>
													<p class="price">
														<?php echo e($fcar->currency_symbol); ?> <?php echo e(number_format($fcar->sale_price, 0, '', ',')); ?> <del><?php echo e($fcar->currency_symbol); ?> <?php echo e(number_format($fcar->regular_price, 0, '', ',')); ?></del>
													</p>
												<?php endif; ?>

											</div>
											<div class="right-area">
												<p class="condition">
													<?php echo e($fcar->condtion->name); ?>

												</p>
											</div>
										</div>
									</div>
							</a>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="row justify-content-center mt-3">
				<?php if(count($fcars) == 6): ?>
					<a href="<?php echo e(route('front.cars') . '?type=featured'); ?>" class="mybtn1">
						<?php echo e($langg->lang15); ?>

					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<!-- Featured Cars Area End -->

	<!-- Featured Cars Area Start -->
	<section class="latestCars">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-10">
					<div class="section-heading">
						<h2 class="title">
							<?php echo e($ps->latest_btxt); ?>

						</h2>
						<p class="text">
							<?php echo e($ps->latest_stxt); ?>

						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<?php $__currentLoopData = $lcars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lcar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-lg-4 col-md-6">
							<a class="car-info-box" href="<?php echo e(route('front.details', $lcar->id)); ?>">
									<div class="img-area">
											<img class="light-zoom" src="<?php echo e(asset('assets/front/images/cars//featured/'.$lcar->featured_image)); ?>" alt="">
									</div>
									<div class="content">
										<h4 class="title">
											<?php echo e($lcar->title); ?>

										</h4>
										<ul class="top-meta">
											<li>
												<i class="far fa-eye"></i> <?php echo e($lcar->views); ?> <?php echo e($langg->lang13); ?>

											</li>
											<li>
												<i class="far fa-clock"></i> <?php echo e(time_elapsed_string($lcar->created_at)); ?>

											</li>
										</ul>
										<ul class="short-info">
											<li class="north-west" title="Model Year">
												<img src="<?php echo e(asset('assets/front/images/calender-icon.png')); ?>" alt="">
												<p><?php echo e($lcar->year); ?></p>
											</li>
											<li class="north-west" title="Mileage">
												<img src="<?php echo e(asset('assets/front/images/road-icon.png')); ?>" alt="">
												<p><?php echo e($lcar->mileage); ?></p>
											</li>
											<li class="north-west" title="Top Speed (KMH)">
												<img src="<?php echo e(asset('assets/front/images/transformar.png')); ?>" alt="">
												<p><?php echo e($lcar->top_speed); ?></p>
											</li>
										</ul>
										<div class="footer-area">
											<div class="left-area">
												<?php if(empty($lcar->sale_price)): ?>
													<p class="price">
														<?php echo e($lcar->currency_symbol); ?> <?php echo e(number_format($lcar->regular_price, 0, '', ',')); ?>

													</p>
												<?php else: ?>
													<p class="price">
														<?php echo e($lcar->currency_symbol); ?> <?php echo e(number_format($lcar->sale_price, 0, '', ',')); ?> <del><?php echo e($lcar->currency_symbol); ?> <?php echo e(number_format($lcar->regular_price, 0, '', ',')); ?></del>
													</p>
												<?php endif; ?>

											</div>
											<div class="right-area">
												<p class="condition">
													<?php echo e($lcar->condtion->name); ?>

												</p>
											</div>
										</div>
									</div>
							</a>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="row justify-content-center mt-3">
				<?php if(count($lcars) == 6): ?>
					<a href="<?php echo e(route('front.cars')); ?>" class="mybtn1">
						<?php echo e($langg->lang15); ?>

					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<!-- Featured Cars Area End -->

	<!-- Testimonial Area Start -->
	<section class="testimonial" style=" background-image: url(<?php echo e(asset('assets/front/images/'.$ps->testimonial_bg)); ?>);">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-10">
					<div class="section-heading">
						<h2 class="title">
							<?php echo e($ps->testimonial_title); ?>

						</h2>
						<p class="text">
							<?php echo e($ps->testimonial_subtitle); ?>

						</p>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-10">
					<div class="testimonial-slider">
						<?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="single-testimonial">
									<div class="people">
											<div class="img">
													<img src="<?php echo e(asset('assets/images/testimonials/'.$testimonial->image)); ?>" alt="">
											</div>
											<h4 class="title"><?php echo e($testimonial->name); ?></h4>
											<p class="designation"><?php echo e($testimonial->rank); ?></p>
										</div>
									<div class="review-text">
										<p>
												"<?php echo e($testimonial->comment); ?>"
										</p>
									</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Testimonial Area End -->

	<!-- Blog Area Start -->
	<section class="blog">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-10">
					<div class="section-heading">
						<h2 class="title">
							Latest Reviews
						</h2>
						<p class="text">
							<?php echo e($ps->blog_stxt); ?>

						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="blog-slider">

						<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="single-blog">
								<div class="img">
									<img src="<?php echo e(asset('assets/images/blogs/'.$blog->photo)); ?>" alt="">
								</div>
								<div class="content">
									<a href="<?php echo e(route('front.blogshow', $blog->id)); ?>">
										<h4 class="title">
											<?php echo e(strlen($blog->title) > 60 ? substr($blog->title, 0, 60) . '...' : $blog->title); ?>

										</h4>
									</a>
									<ul class="top-meta">
										<li>
											<a href="#">
													<i class="far fa-user"></i> <?php echo e($langg->lang16); ?>

											</a>
										</li>
										<li>
											<a href="#">
													<i class="far fa-calendar"></i> <?php echo e(date ( 'jS M, Y' , strtotime($blog->created_at) )); ?>

											</a>
										</li>
									</ul>
									<div class="text">
										<p>
												<?php echo e((strlen(strip_tags($blog->details)) > 140) ? substr(strip_tags($blog->details), 0, 140) . '...' : strip_tags($blog->details)); ?>

										</p>
									</div>
									<a href="<?php echo e(route('front.blogshow', $blog->id)); ?>" class="link"><?php echo e($langg->lang17); ?><i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog Area End -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script>
	$(".sel-price").on('change', function() {
		let url = '<?php echo e(url('/')); ?>/prices/' + $(this).val();
		// console.log(url);
		$.get(
			url,
			function(data) {
				console.log(data);
				$("input[name='minprice']").val(data.minimum);
				$("input[name='maxprice']").val(data.maximum);
			}
		)
	});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>