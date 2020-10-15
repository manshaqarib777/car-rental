<?php $__env->startSection('content'); ?>

  <!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="pagetitle">
							<?php echo e($langg->lang301); ?>

						</h1>
						<ul class="pages">
							<li>
								<a href="<?php echo e(route('front.index')); ?>">
									<?php echo e($langg->lang1); ?>

								</a>
							</li>
							<li class="active">
								<a href="#">
									<?php echo e($langg->lang301); ?>

								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Breadcrumb Area End -->

	<!-- sub-categori Area Start -->
    <section class="sub-categori">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="left-area">
							<div class="filter-result-area">
							<div class="header-area">
								<h4 class="title">
									<?php echo e($langg->lang22); ?>

								</h4>
							</div>
							<div class="body-area">
								<form action="#">
									<div class="price-range-block">
											<div id="slider-range" class="price-filter-range" name="rangeInput"></div>
											<div class="livecount">
												<input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />
												<span>To</span>
												<input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field" />
											</div>
										</div>

										<button class="filter-btn price-btn apply-btn" type="button"><?php echo e($langg->lang34); ?></button>
								</form>
							</div>
							</div>
							<div class="all-categories-area">
								<div class="header-area">
									<h4 class="title">
										<?php echo e($langg->lang35); ?>

									</h4>
								</div>
								<div class="body-area">
									<div class="accordion" id="accordionExample">
										<div class="card">
											<div class="card-header">
												<a class="button d-inline-block pb-2 cat-anchor" href="#" data-cat_id="" <?php if(empty(request()->input('category_id'))): ?> style="color: #0056b3;" <?php endif; ?>>
														<i class="icofont-thin-double-right"></i> <?php echo e($langg->lang35); ?>

												</a>
											</div>
										</div>
                    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="card">
  											<div class="card-header" id="headingOne">
													<a class="button d-inline-block pb-2 cat-anchor" href="#" data-cat_id="<?php echo e($cat->id); ?>" <?php if($cat->id == request()->input('category_id')): ?> style="color: #0056b3;" <?php endif; ?>>
  														<i class="icofont-thin-double-right"></i><?php echo e($cat->name); ?>

  												</a>
  											</div>
  										</div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


									</div>
								</div>
							</div>
							<div class="design-area">
									<div class="header-area">
											<h4 class="title">
													<?php echo e($langg->lang36); ?>

											</h4>
										</div>
										<div class="body-area">
												<ul class="filter-list brand-list">
                          <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
  														<div class="content">
  																<div class="check-box">
  																		<div class="form-check form-check-inline">
  																			<input class="form-check-input brand-check" type="checkbox" id="b<?php echo e($brand->id); ?>" value="<?php echo e($brand->id); ?>" <?php echo e(is_array(request()->input('brand_id')) && in_array($brand->id, request()->input('brand_id')) ? 'checked' : ''); ?>>
  																			<span class="checkmark"></span>
  																			<label class="form-check-label brand-label" for="b<?php echo e($brand->id); ?>">
  																					<?php echo e($brand->name); ?>

  																			</label>
  																		</div>
  																</div>
  														</div>
  													</li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<div class="row">
														<div class="col-lg-6">
															<button class="apply-btn filter-btn" type="button" style="width:100%;"><?php echo e($langg->lang37); ?></button>
														</div>
														<div class="col-lg-6">
															<a href="#" id="showMore" class="d-inline-block mt-2">show more</a>
														</div>
													</div>
												</ul>
										</div>
							</div>
							<div class="categori-select-area">
								<div class="header-area">
									<h4 class="title">
										<?php echo e($langg->lang40); ?>

									</h4>
								</div>
								<div class="body-area">
									<select name="fuel_type_id" id="selFuel">
										<option selected disabled value=""><?php echo e($langg->lang41); ?></option>
                    <?php $__currentLoopData = $ftypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ftype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($ftype->id); ?>" <?php echo e(request()->input('fuel_type_id') == $ftype->id ? 'selected' : ''); ?>><?php echo e($ftype->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
							<div class="categori-select-area">
								<div class="header-area">
									<h4 class="title">
										<?php echo e($langg->lang42); ?>

									</h4>
								</div>
								<div class="body-area">
                  <select name="transmission_type_id" id="selTransmission">
										<option selected disabled value=""><?php echo e($langg->lang43); ?></option>
                    <?php $__currentLoopData = $ttypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ttype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($ttype->id); ?>" <?php echo e(request()->input('transmission_type_id') == $ttype->id ? 'selected' : ''); ?>><?php echo e($ttype->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
							<div class="categori-select-area">
								<div class="header-area">
									<h4 class="title">
										<?php echo e($langg->lang44); ?>

									</h4>
								</div>
								<div class="body-area">
									<select id="selCondition" name="condition_id">
                    <option value="" selected disabled><?php echo e($langg->lang45); ?></option>
                    <?php $__currentLoopData = $conditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $condition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($condition->id); ?>" <?php echo e(request()->input('condition_id') == $condition->id ? 'selected' : ''); ?>><?php echo e($condition->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9 order-first order-lg-last">
						<div class="right-area">
							<div class="item-filter">
								<ul class="filter-list">
									<li class="item-short-area">
										<p><?php echo e($langg->lang23); ?> :</p>
										<select class="short-item sel-sort" name="sort">
											<option value="desc" <?php echo e(request()->input('sort') == 'desc' ? 'selected' : ''); ?>><?php echo e($langg->lang24); ?></option>
											<option value="asc" <?php echo e(request()->input('sort') == 'asc' ? 'selected' : ''); ?>><?php echo e($langg->lang25); ?></option>
											<option value="price_desc" <?php echo e(request()->input('sort') == 'price_desc' ? 'selected' : ''); ?>><?php echo e($langg->lang26); ?></option>
											<option value="price_asc" <?php echo e(request()->input('sort') == 'price_asc' ? 'selected' : ''); ?>><?php echo e($langg->lang27); ?></option>
										</select>
									</li>
									<li class="viewitem-no-area">
										<p><?php echo e($langg->lang28); ?> :</p>
										<select class="short-itemby-no sel-view">
											<option value="10" <?php echo e(request()->input('view') == 10 ? 'selected' : ''); ?>><?php echo e($langg->lang29); ?></option>
											<option value="20" <?php echo e(request()->input('view') == 20 ? 'selected' : ''); ?>><?php echo e($langg->lang30); ?></option>
											<option value="30" <?php echo e(request()->input('view') == 30 ? 'selected' : ''); ?>><?php echo e($langg->lang31); ?></option>
											<option value="40" <?php echo e(request()->input('view') == 40 ? 'selected' : ''); ?>><?php echo e($langg->lang32); ?></option>
											<option value="50" <?php echo e(request()->input('view') == 50 ? 'selected' : ''); ?>><?php echo e($langg->lang33); ?></option>
										</select>
									</li>
								</ul>
							</div>
							<div class="categori-item-area">
								<div class="row">
									<?php if(count($cars) == 0): ?>
										<div class="col-lg-12 text-center">
											<h2>NO CAR FOUND</h2>
										</div>
									<?php else: ?>
										<?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="col-lg-6 col-md-6">
												<a class="car-info-box" href="<?php echo e(route('front.details', $car->id)); ?>">
														<div class="img-area">
																<img class="light-zoom" src="<?php echo e(asset('assets/front/images/cars//featured/'.$car->featured_image)); ?>" alt="">
														</div>
														<div class="content">
															<h4 class="title">
																<?php echo e($car->title); ?>

															</h4>
															<ul class="top-meta">
																<li>
																	<i class="far fa-eye"></i> <?php echo e($car->views); ?> <?php echo e($langg->lang66); ?>

																</li>
																<li>
																	<i class="far fa-clock"></i> <?php echo e(time_elapsed_string($car->created_at)); ?>

																</li>
															</ul>
															<ul class="short-info">
																<li class="north-west" title="Model Year">
																	<img src="<?php echo e(asset('assets/front/images/calender-icon.png')); ?>" alt="">
																	<p><?php echo e($car->year); ?></p>
																</li>
																<li class="north-west" title="Mileage">
																	<img src="<?php echo e(asset('assets/front/images/road-icon.png')); ?>" alt="">
																	<p><?php echo e($car->mileage); ?></p>
																</li>
																<li class="north-west" title="Top Speed (KMH)">
																	<img src="<?php echo e(asset('assets/front/images/transformar.png')); ?>" alt="">
																	<p><?php echo e($car->top_speed); ?></p>
																</li>
															</ul>
															<div class="footer-area">
																<div class="left-area">
																	<?php if(empty($car->sale_price)): ?>
																		<p class="price">
																			<?php echo e($car->currency_symbol); ?> <?php echo e(number_format($car->regular_price, 0, '', ',')); ?>

																		</p>
																	<?php else: ?>
																		<p class="price">
																			<?php echo e($car->currency_symbol); ?> <?php echo e(number_format($car->sale_price, 0, '', ',')); ?> <del><?php echo e($car->currency_symbol); ?> <?php echo e(number_format($car->regular_price, 0, '', ',')); ?></del>
																		</p>
																	<?php endif; ?>
																</div>
																<div class="right-area">
																	<p class="condition">
																		<?php echo e($car->condtion->name); ?>

																	</p>
																</div>
															</div>
														</div>
												</a>
											</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>

                  <div class="col-12 text-center">
                    <?php echo e($cars->appends(['minprice' => request()->input('minprice'), 'maxprice' => request()->input('maxprice'), 'category_id' => request()->input('category_id'), 'fuel_type_id' => request()->input('fuel_type_id'), 'transmission_type_id' => request()->input('transmission_type_id'), 'condition_id' => request()->input('condition_id'), 'brand_id' => request()->input('brand_id'), 'type' => request()->input('type'), 'sort' => request()->input('sort'), 'view' => request()->input('view')])->links()); ?>

                  </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<!-- sub-categori Area End -->

	<form id="searchForm" class="d-none" action="<?php echo e(route('front.cars')); ?>" method="get">
		<input type="text" name="minprice" value="<?php echo e(!empty(request()->input('minprice')) ? request()->input('minprice') : $minprice); ?>">
		<input type="hidden" name="maxprice" value="<?php echo e(!empty(request()->input('maxprice')) ? request()->input('maxprice') : $maxprice); ?>">
		<input type="hidden" name="category_id" value="<?php echo e(!empty(request()->input('category_id')) ? request()->input('category_id') : null); ?>">
		<?php if(!empty(request()->input('brand_id'))): ?>
			<?php
				$brands = request()->input('brand_id');
			?>
			<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<input type="hidden" name="brand_id[]" value="<?php echo e($brand); ?>">
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
		<input type="hidden" name="fuel_type_id" value="<?php echo e(!empty(request()->input('fuel_type_id')) ? request()->input('fuel_type_id') : null); ?>">
		<input type="hidden" name="transmission_type_id" value="<?php echo e(!empty(request()->input('transmission_type_id')) ? request()->input('transmission_type_id') : null); ?>">
		<input type="hidden" name="condition_id" value="<?php echo e(!empty(request()->input('condition_id')) ? request()->input('condition_id') : null); ?>">
		<input type="hidden" name="type" value="<?php echo e(!empty(request()->input('type')) ? request()->input('type') : 'all'); ?>">
		<input type="hidden" name="sort" value="<?php echo e(!empty(request()->input('sort')) ? request()->input('sort') : 'desc'); ?>">
		<input type="hidden" name="view" value="<?php echo e(!empty(request()->input('view')) ? request()->input('view') : 10); ?>">
		<button type="submit"></button>
	</form>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script>
  var minprice = <?php echo e($minprice); ?>;
  var maxprice = <?php echo e($maxprice); ?>;

  // pricing range
  $(document).ready(function() {
      $("#price-range-submit").hide(), $("#min_price,#max_price").on("change", function() {
          $("#price-range-submit").show();
          var e = parseInt($("#min_price").val()),
              i = parseInt($("#max_price").val());
          e > i && $("#max_price").val(e), $("#slider-range").slider({
              values: [e, i]
          })
      }), $("#min_price,#max_price").on("paste keyup", function() {
          $("#price-range-submit").show();
          var e = parseInt($("#min_price").val()),
              i = parseInt($("#max_price").val());
          e == i && (i = e + 100, $("#min_price").val(e), $("#max_price").val(i)), $("#slider-range").slider({
              values: [e, i]
          })
      }), $(function() {
          $("#slider-range").slider({
              range: !0,
              orientation: "horizontal",
              min: minprice,
              max: maxprice,
              values: [<?php echo e(!empty(request()->input('minprice')) ? request()->input('minprice') : $minprice); ?>, <?php echo e(!empty(request()->input('maxprice')) ? request()->input('maxprice') : $maxprice); ?>],
              step: 50,
              slide: function(e, i) {
                  if (i.values[0] == i.values[1]) return !1;
                  $("#min_price").val(i.values[0]), $("#max_price").val(i.values[1])
              }
          }), $("#min_price").val($("#slider-range").slider("values", 0)), $("#max_price").val($("#slider-range").slider("values", 1))
      }), $("#slider-range,#price-range-submit").click(function() {
          var e = $("#min_price").val(),
              i = $("#max_price").val();
          $("#searchResults").text("Here List of products will be shown which are cost between " + e + " and " + i + ".")
      })
  });
  </script>


  <script>
    $(document).ready(function() {
      $(".brand-list li").each(function(i) {
        if (i < 6) {
          $(this).addClass('d-block');
        } else {
          $(this).addClass('d-none addbrand');
        }
      });

      $("#showMore").on('click', function(e) {
        e.preventDefault();

        let btntxt = $(e.target).html();

        if (btntxt == 'show more') {
          $(e.target).html('show less');
        } else {
          $(e.target).html('show more');
        }

        $(".brand-list li").each(function() {
          if($(this).hasClass('addbrand')) {
            $(this).toggleClass('d-none');
          }
        });
      })
    })
  </script>



	
	<script>
		$(document).ready(function() {

			$(".price-btn").click(function() {
				$("input[name='minprice']").val($("#min_price").val());
				$("input[name='maxprice']").val($("#max_price").val());
			});

			$(".cat-anchor").click(function(e) {
				e.preventDefault();
				$("input[name='category_id']").val($(this).data('cat_id'));
				$("#searchForm").trigger('submit');
			});

			$(".brand-check").on("click", function() {
				if ($("input[name='brand_id[]']").length > 0) {
					$("input[name='brand_id[]']").remove();
				}
				$(".brand-check").each(function() {
					if ($(this).prop("checked")) {
						// console.log($(this).prop("checked"));
						$("#searchForm").append(`<input type="hidden" name="brand_id[]" value="${$(this).val()}">`);
					}
				});
			});

			$("#selFuel").on('change', function() {
				$("input[name='fuel_type_id']").val($(this).val());
				$("#searchForm").trigger('submit');
			});

			$("#selTransmission").on('change', function() {
				$("input[name='transmission_type_id']").val($(this).val());
				$("#searchForm").trigger('submit');
			});

			$("#selCondition").on('change', function() {
				$("input[name='condition_id']").val($(this).val());
				$("#searchForm").trigger('submit');
			});

			$(".apply-btn").on('click', function() {
				$("#searchForm").trigger('submit');
			});

			$(".sel-sort").on('change', function() {
				$("input[name='sort']").val($(this).val());
				$("#searchForm").trigger('submit');
			});

			$(".sel-view").on('change', function() {
				$("input[name='view']").val($(this).val());
				$("#searchForm").trigger('submit');
			});
		})
	</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>