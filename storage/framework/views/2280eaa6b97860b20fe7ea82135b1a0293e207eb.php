<?php $__env->startSection('content'); ?>

						<div class="content-area">
							<div class="mr-breadcrumb">
								<div class="row">
									<div class="col-lg-12">
											<h4 class="heading"><?php echo e($langg->lang77); ?></h4>
											<ul class="links">
												<li>
													<a href="<?php echo e(route('user-dashboard')); ?>"><?php echo e($langg->lang8); ?> </a>
												</li>
												<li>
													<a href="<?php echo e(route('user.password')); ?>"><?php echo e($langg->lang77); ?> </a>
												</li>
											</ul>
									</div>
								</div>
							</div>
							<div class="add-product-content">
								<div class="row">
									<div class="col-lg-12">
										<div class="product-description">
											<div class="body-area">

				                        <div class="gocover" style="background: url(<?php echo e(asset('assets/images/spinner.gif')); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
											<form id="geniusform" action="<?php echo e(route('user.password.update')); ?>" method="POST" enctype="multipart/form-data">
												<?php echo e(csrf_field()); ?>


                        <?php echo $__env->make('includes.admin.form-both', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading"><?php echo e($langg->lang78); ?> *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="password" class="input-field" name="cpass" placeholder="<?php echo e($langg->lang101); ?> <?php echo e($langg->lang78); ?>" required="" value="">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading"><?php echo e($langg->lang79); ?> *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="password" class="input-field" name="newpass" placeholder="<?php echo e($langg->lang101); ?> <?php echo e($langg->lang79); ?>" required="" value="">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading"><?php echo e($langg->lang80); ?> *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="password" class="input-field" name="renewpass" placeholder="<?php echo e($langg->lang80); ?>" required="" value="">
													</div>
												</div>

						                        <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">

						                            </div>
						                          </div>
						                          <div class="col-lg-7">
						                            <button class="addProductSubmit-btn" type="submit"><?php echo e($langg->lang412); ?></button>
						                          </div>
						                        </div>

											</form>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>