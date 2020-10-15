<?php $__env->startSection('content'); ?>
  <div class="content-area" id="contentArea">
    <div class="mr-breadcrumb">
      <div class="row">
        <div class="col-lg-12">
            <h4 class="heading"><?php echo e($langg->lang144); ?></h4>
            <ul class="links">
              <li>
                <a href="<?php echo e(route('user-dashboard')); ?>"><?php echo e($langg->lang8); ?> </a>
              </li>
              <li>
                <a href="<?php echo e(route('user-package')); ?>"><?php echo e($langg->lang144); ?></a>
              </li>
            </ul>
        </div>
      </div>
    </div>
    <div class="add-product-content py-5">
      <div class="row px-5">
        <div class="col-lg-12">
          <?php if(empty(Auth::user()->current_plan)): ?>
            <div class="alert alert-warning" role="alert">
              <p class="mb-0">You haven't bought any package yet. <strong>To publish your ad</strong> please buy a package from below options.</p>
            </div>
          <?php else: ?>
            <div class="alert alert-warning" role="alert">
              <p class="mb-0"><?php echo e($langg->lang145); ?> <strong><?php echo e($boughtPlan->title); ?></strong>.
                <?php if(!empty($boughtPlan->days)): ?>
                  <?php echo e($langg->lang146); ?> <strong><?php echo e(date('jS M, o', strtotime(Auth::user()->expired_date))); ?></strong>.
                <?php else: ?>
                  The validity of this package is <strong>Lifetime</strong>.
                <?php endif; ?>
              </p>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="row px-5 pt-4">
        <?php if(count($plans) == 0): ?>
          <div class="col-lg-12">
            <h4 class="text-center">NO PACKAGE FOUND</h4>
          </div>
        <?php else: ?>
          <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3">
               <div class="elegant-pricing-tables style-2 text-center px-4 pb-5">
                  <div class="pricing-head">
                     <h3><?php echo e($plan->title); ?></h3>
                     <span class="price">
                     <sup><?php echo e(round($plan->price, 0) == 0 ? '' : $plan->currency_code); ?></sup>
                     <span class="price-digit"><?php echo e(round($plan->price, 0) == 0 ? 'Free' : round($plan->price, 0)); ?></span><br>
                     <span class="price-month"><?php echo e(empty($plan->days) ? 'Lifetime' : $plan->days . ' ' . $langg->lang147); ?></span>
                     </span>
                  </div>
                  <div class="pricing-detail">
                     <span><?php echo e($plan->details); ?></span>
                  </div>
                  <?php if($plan->id == Auth::user()->current_plan): ?>
                    <a href="<?php echo e(route('user-select-payment', $plan->id)); ?>" class="btn btn-default <?php echo e($plan->id == Auth::user()->current_plan ? 'rp' : ''); ?> mb-0"><?php echo e($langg->lang149); ?></a>
                  <?php else: ?>
                    <a href="<?php echo e(route('user-select-payment', $plan->id)); ?>" class="btn btn-default mb-0"><?php echo e($langg->lang148); ?></a>
                  <?php endif; ?>
               </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <div class="col-12">
            <p class="mb-0 mt-4 text-center text-danger"><strong><?php echo e($langg->lang150); ?>: <?php echo e($langg->lang151); ?>.</strong></p>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>