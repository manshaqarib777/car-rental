<?php $__env->startSection('content'); ?>

<div class="content-area">
            <div class="mr-breadcrumb">
              <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading"><?php echo e($langg->lang140); ?></h4>
                    <ul class="links">
                      <li>
                        <a href="<?php echo e(route('user-dashboard')); ?>"><?php echo e($langg->lang8); ?> </a>
                      </li>
                      <li>
                        <a href="<?php echo e(route('user-social-index')); ?>"><?php echo e($langg->lang140); ?></a>
                      </li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="social-links-area">
            <div class="gocover" style="background: url(<?php echo e(asset('assets/images/spinner.gif')); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
              <form id="geniusform" class="form-horizontal" action="<?php echo e(route('user-social-update')); ?>" method="POST">
              <?php echo e(csrf_field()); ?>


              <?php echo $__env->make('includes.admin.form-both', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="row">
                  <label class="control-label col-sm-3" for="facebook"><?php echo e($langg->lang141); ?></label>
                  <div class="col-sm-6">
                    <input class="form-control" name="facebook" id="facebook" placeholder="http://facebook.com/" type="text" value="<?php echo e($data ? $data->facebook : ''); ?>">
                  </div>
                  <div class="col-sm-3">
                    <label class="switch">
                      <input type="checkbox" name="f_status" value="1" <?php echo e($data ? $data->f_status==1?"checked":"" : ""); ?>>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <label class="control-label col-sm-3" for="twitter"><?php echo e($langg->lang142); ?></label>
                  <div class="col-sm-6">
                    <input class="form-control" name="twitter" id="twitter" placeholder="http://twitter.com/" type="text" value="<?php echo e($data ? $data->twitter : ''); ?>">
                  </div>
                  <div class="col-sm-3">
                    <label class="switch">
                      <input type="checkbox" name="t_status" value="1" <?php echo e($data ? $data->t_status==1?"checked":"" : ""); ?>>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <label class="control-label col-sm-3" for="linkedin"><?php echo e($langg->lang143); ?></label>
                  <div class="col-sm-6">
                    <input class="form-control" name="linkedin" id="linkedin" placeholder="http://linkedin.com/" type="text" value="<?php echo e($data ? $data->linkedin : ""); ?>">
                  </div>
                  <div class="col-sm-3">
                    <label class="switch">
                      <input type="checkbox" name="l_status" value="1" <?php echo e($data ? $data->l_status==1?"checked":"" : ""); ?>>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 text-center">
                    <button type="submit" class="submit-btn"><?php echo e($langg->lang134); ?></button>
                  </div>
                </div>
              </form>
            </div>
          </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>