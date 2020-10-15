<?php $__env->startSection('styles'); ?>
  <style media="screen">
    .content {
      padding: 80px 0px 100px;
    }
  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <ul class="pages">
            <li>
              <a href="<?php echo e(route('front.index')); ?>">
                Home
              </a>
            </li>
            <li>
              <a href="javascript:;">
                404
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->

  <section class="fourzerofour py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="content text-center">
              <h2 class="heading">
                Oops! You're lost...
              </h2>
              <p class="text">
                The page you are looking for might have been moved,
                renamed, or might never existed.
              </p>
              <a class="mybtn1" href="<?php echo e(route('front.index')); ?>">Back Home</a>
            </div>
          </div>
        </div>
      </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>