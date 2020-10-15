<?php $__env->startSection('content'); ?>


  <!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="title">
							Reviews
						</h1>
						<ul class="pages">
							

		          <?php if(isset($bcat)): ?>

		              <li>
		                <a href="<?php echo e(route('front.index')); ?>">
		                  <?php echo e($langg->lang1); ?>

		                </a>
		              </li>
		              <li class="active">
		                <a href="<?php echo e(route('front.blog')); ?>">
		                  Reviews
		                </a>
		              </li>
		              <li>
		                <a href="<?php echo e(route('front.blogcategory',$bcat->slug)); ?>">
		                  <?php echo e($bcat->name); ?>

		                </a>
		              </li>

		          <?php elseif(isset($slug)): ?>

		              <li>
		                <a href="<?php echo e(route('front.index')); ?>">
		                  <?php echo e($langg->lang1); ?>

		                </a>
		              </li>
		              <li class="active">
		                <a href="<?php echo e(route('front.blog')); ?>">
		                  Reviews
		                </a>
		              </li>
		              <li>
		                <a href="<?php echo e(route('front.blogtags',$slug)); ?>">
		                  <?php echo e($langg->lang308); ?>: <?php echo e($slug); ?>

		                </a>
		              </li>

		          <?php elseif(isset($search)): ?>

		              <li>
		                <a href="<?php echo e(route('front.index')); ?>">
		                  <?php echo e($langg->lang1); ?>

		                </a>
		              </li>
		              <li class="active">
		                <a href="<?php echo e(route('front.blog')); ?>">
		                  Reviews
		                </a>
		              </li>
		              <li>
		                <a href="Javascript:;">
		                  <?php echo e($langg->lang12); ?>

		                </a>
		              </li>
		              <li>
		                <a href="Javascript:;">
		                  <?php echo e($search); ?>

		                </a>
		              </li>

		          <?php else: ?>

		              <li>
		                <a href="<?php echo e(route('front.index')); ?>">
		                  <?php echo e($langg->lang1); ?>

		                </a>
		              </li>
		              <li class="active">
		                <a href="<?php echo e(route('front.blog')); ?>">
		                  Reviews
		                </a>
		              </li>
		          <?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<!-- Breadcrumb Area Start -->

	<!-- Blog Area Start -->
	<section class="blog blog-page" id="blog">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">

          <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="blog-box">
								<div class="blog-images">
										<div class="img">
											<img src="<?php echo e($blogg->photo ? asset('assets/images/blogs/'.$blogg->photo):asset('assets/images/noimage.png')); ?>" class="img-fluid" alt="">
										</div>
										<div class="date d-flex justify-content-center">
											<div class="box align-self-center">
												<p><?php echo e(date('d', strtotime($blogg->created_at))); ?></p>
												<p><?php echo e(date('M', strtotime($blogg->created_at))); ?></p>
											</div>
										</div>
								</div>
								<div class="details">
                    <a href='<?php echo e(route('front.blogshow',$blogg->id)); ?>'>
                      <h4 class="blog-title">
                        <?php echo e(strlen($blogg->title) > 50 ? substr($blogg->title,0,50)."...":$blogg->title); ?>

                      </h4>
                    </a>
										<ul class="post-meta">
											<li>
												<a href="#">
													<i class="fas fa-user"></i>
													<?php echo e($langg->lang16); ?>

												</a>
											</li>
										</ul>
									<p class="blog-text">
										<?php echo e(strlen(strip_tags($blogg->details)) > 248 ? substr(strip_tags($blogg->details),0,248) . '...' : substr(strip_tags($blogg->details),0,248)); ?>

									</p>
								</div>
							</div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<div class="row mt-5 mb-5">
							<div class="col-lg-12 text-center">
								<?php echo e($blogs->appends(['search' => request()->input('search')])->links()); ?>

							</div>
						</div>
				</div>
				<div class="col-lg-4">
					<div class="blog-aside">
						<div class="serch-widget">
							<h4 class="title">
								<?php echo e($langg->lang301); ?>

							</h4>
							<form action="<?php echo e(route('front.blogsearch')); ?>">
								<input type="text" value="<?php echo e(request()->input('search')); ?>" name="search" placeholder="<?php echo e($langg->lang302); ?>" required="">
								<button class="submit" type="submit"><?php echo e($langg->lang301); ?></button>
							</form>
						</div>
						<div class="categori">
							<h4 class="title"><?php echo e($langg->lang303); ?></h4>
							<ul class="categori-list">
                <?php $__currentLoopData = $bcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                  <a href="<?php echo e(route('front.blogcategory',$cat->slug)); ?>" <?php if(!empty($bcat) && $bcat->slug == $cat->slug): ?> class="active"  <?php endif; ?>>
                    <span><?php echo e($cat->name); ?></span>
                    <span>(<?php echo e($cat->blogs()->count()); ?>)</span>
                  </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
						<div class="recent-post-widget">
							<h4 class="title">Latest Reviews</h4>
							<ul class="post-list">
                <?php $__currentLoopData = App\Models\Blog::orderBy('created_at', 'desc')->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                  <div class="post">
                    <div class="post-img">
                      <img src="<?php echo e(asset('assets/images/blogs/'.$blog->photo)); ?>" alt="">
                    </div>
                    <div class="post-details">
                      <a href="<?php echo e(route('front.blogshow',$blog->id)); ?>">
                          <h4 class="post-title">
                              <?php echo e(strlen($blog->title) > 45 ? substr($blog->title,0,45)." .." : $blog->title); ?>

                          </h4>
                      </a>
                      <p class="date">
                          <?php echo e(date('M d - Y',(strtotime($blog->created_at)))); ?>

                      </p>
                    </div>
                  </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
						<div class="newsletter-widget">
							<h4 class="title">
									<?php echo e($langg->lang305); ?>

							</h4>
							<div class="gocover" style="background: url(<?php echo e(asset('assets/front/images/loader.gif')); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
							<form id="geniusform" action="<?php echo e(route('front.subscribe')); ?>" method="POST">
								<?php echo e(csrf_field()); ?>

								<?php echo $__env->make('includes.admin.form-both', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								<input type="text" name="email" placeholder="<?php echo e($langg->lang306); ?>" required>
								<button class="submit" type="submit"><?php echo e($langg->lang307); ?></button>
							</form>
						</div>
						<div class="tags">
							<h4 class="title"><?php echo e($langg->lang308); ?></h4>
							<span class="separator"></span>
							<ul class="tags-list">
                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(!empty($tag)): ?>
                  <li>
                    <a href="<?php echo e(route('front.blogtags',$tag)); ?>"><?php echo e($tag); ?> </a>
                  </li>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>


		</div>
	</section>
	<!-- Blog Area End-->




<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script>

setTimeout(function() {
	$(".commentCount").each(function(i) {
		// console.log($(this).html());
		if ($(this).html() == 'Comments') {
			$(this).html('0 Comments');
		}
	});
}, 2000);



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>