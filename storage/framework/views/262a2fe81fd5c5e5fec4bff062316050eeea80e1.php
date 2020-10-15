<?php $__env->startSection('content'); ?>
	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="title">
								<?php echo e($langg->lang410); ?>

						</h1>
						<ul class="pages">
							<li>
								<a href="#">
									<?php echo e($langg->lang1); ?>

								</a>
							</li>
							<li class="active">
								<a href="#">
									<?php echo e($langg->lang410); ?>

								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
	</div>
	<!-- Breadcrumb Area End -->

	<!-- About Area Start -->
		<section class="login-signup">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="log-reg-tab-wrapper">
                <div class="forgot-header">
                  <h3 class="text-white"><?php echo e($langg->lang410); ?></h3>
                </div>
								<div class="login-area signup-area">

										<div class="login-form signup-form">
											<?php echo $__env->make('includes.admin.form-login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
											<form id="forgotform" action="<?php echo e(route('front-forgot-submit')); ?>" method="POST">
												<?php echo e(csrf_field()); ?>

												<div class="row">
													<div class="col-lg-12">
															<div class="form-input">
																	<input name="email" type="email" placeholder="<?php echo e($langg->lang411); ?>">
																	<i class="fas fa-envelope"></i>
																</div>
													</div>
												</div>
												<button class="submit-btn"><?php echo e($langg->lang412); ?></button>
											</form>
										</div>
									</div>
						</div>
				</div>
			</div>
		</section>
	<!-- About Area End -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('.refresh_code').on( "click", function() {
            $.get('<?php echo e(url('refresh_code')); ?>', function(data, status){
                $('#codeimg').attr("src","<?php echo e(url('assets/images')); ?>/capcha_code.png?time="+ Math.random());
            });
        })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>