<?php $__env->startSection('content'); ?>
	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="pagetitle">
						<?php echo e($langg->lang310); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e($langg->lang1); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
									<?php echo e($langg->lang310); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb Area End -->


	<!-- Contact Us Area Start -->
	<section class="contact-us">
		<div class="container">
			<div class="row justify-content-between">
					<div class="col-xl-5 col-lg-5">
							<div class="right-area">
								<div class="contact-info">
									<div class="left ">
											<div class="icon">
													<img src="<?php echo e(asset('assets/front/images/matker.png')); ?>" alt="">
													<p class="lable">
														<?php echo e($langg->lang311); ?>

													</p>
											</div>
									</div>
									<div class="content d-flex align-self-center">
										<div class="content">
											<?php echo e($ps->contact_email); ?>

										</div>
									</div>
								</div>
								<div class="contact-info">
										<div class="left">
												<div class="icon">
														<img src="<?php echo e(asset('assets/front/images/envelop.png')); ?>" alt="">
														<p class="lable">
															<?php echo e($langg->lang312); ?>

														</p>
												</div>
										</div>
										<div class="content d-flex align-self-center">
											<div class="content">
													<p>
														<?php echo e($ps->contact_address); ?>

													</p>
											</div>
										</div>
									</div>
									<div class="contact-info">
											<div class="left">
													<div class="icon">
															<img src="<?php echo e(asset('assets/front/images/call.png')); ?>" alt="">
															<p class="lable">
																<?php echo e($langg->lang313); ?>

															</p>
													</div>
											</div>
											<div class="content d-flex align-self-center">
												<?php
													$phones = explode(',', $ps->contact_phone)
												?>
												<div class="content">
													<?php $__currentLoopData = $phones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<a href="#">
																<?php echo e($phone); ?>

														</a>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</div>
											</div>
										</div>
										<div class="social-links">
											<h4 class="title"><?php echo e($langg->lang319); ?> :</h4>
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
				<div class="col-xl-7 col-lg-7">
					<div class="left-area">
						<div class="contact-form">
							<div class="gocover" style="background: url(<?php echo e(asset('assets/front/images/loader.gif')); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
							<?php echo $__env->make('includes.admin.form-both', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<form id="geniusform" action="<?php echo e(route('front.sendmail')); ?>" method="POST">
								
								<?php echo e(csrf_field()); ?>

								<div class="row">
										<div class="col-lg-12">
												<div class="form-input">
														<input type="text" name="name" placeholder="<?php echo e($langg->lang314); ?> *" required>
														<i class="fas fa-user"></i>
													</div>
										</div>
										<div class="col-lg-12">
												<div class="form-input">
														<input type="email" name="email" placeholder="<?php echo e($langg->lang315); ?> *" required>
														<i class="fas fa-envelope"></i>
													</div>
										</div>
										<div class="col-lg-12">
												<div class="form-input">
														<input type="text" name="subject" placeholder="<?php echo e($langg->lang316); ?>" required>
														<i class="fas fa-pen-square"></i>
													</div>
										</div>
										<div class="col-lg-12">
												<div class="form-input">
														<textarea name="message" placeholder="<?php echo e($langg->lang317); ?> *" required></textarea>
												</div>
										</div>
										<div class="col-lg-12">
												<button class="submit-btn mybtn1" type="submit"><?php echo e($langg->lang318); ?></button>
										</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- Contact Us Area End-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>